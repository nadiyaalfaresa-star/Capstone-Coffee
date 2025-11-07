<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function create()
    {
        // Pastikan file ini sesuai: resources/views/order.blade.php
        return view('order');
    }

    public function store(Request $request)
    {
        try {
            // Ambil data dari fetch() JSON
            $data = $request->json()->all();

            // 🔍 Validasi data
            $validated = validator($data, [
                'customer_name' => 'required|string|max:100',
                'table_number'  => 'required|string|max:20',
                'total_amount'  => 'required|numeric|min:0',
                'items'         => 'required|array|min:1',
                'items.*.item_name'  => 'required|string|max:100',
                'items.*.quantity'   => 'required|integer|min:1',
                'items.*.unit_price' => 'nullable|numeric|min:0',
                'items.*.subtotal'   => 'nullable|numeric|min:0',
            ])->validate();

            DB::beginTransaction();

            // 💾 Simpan ke tabel orders
            $orderId = DB::table('orders')->insertGetId([
                'customer_name' => $validated['customer_name'],
                'table_number'  => $validated['table_number'],
                'total_amount'  => $validated['total_amount'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            // 💾 Simpan ke tabel order_items
            foreach ($validated['items'] as $item) {
                DB::table('order_items')->insert([
                    'order_id'   => $orderId,
                    'item_name'  => $item['item_name'],
                    'quantity'   => $item['quantity'],
                    'unit_price' => $item['unit_price'] ?? 0,
                    'subtotal'   => $item['subtotal'] ?? (($item['unit_price'] ?? 0) * $item['quantity']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();

            // ✅ Berhasil
            return response()->json([
                'message'  => 'Pesanan berhasil disimpan.',
                'order_id' => $orderId,
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors'  => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan pesanan.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function success($orderId)
    {
        return view('order-success', compact('orderId'));
    }
}
