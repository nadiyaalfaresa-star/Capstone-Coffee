<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    public function create()
    {
        $success = session('success');
        return view('book', compact('success'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'date' => 'required|date',
                'time' => 'required|string',
                'people' => 'required|integer|min:1',
                'message' => 'nullable|string|max:500',
            ]);

            \App\Models\Reservation::create([
                'full_name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'reservation_date' => $validatedData['date'],
                'reservation_time' => $validatedData['time'],
                'number_of_people' => $validatedData['people'],
                'special_request' => $validatedData['message'],
                'status' => 'pending',
            ]);
            
            return redirect()->route('book')->with('success', 'Reservasi Anda berhasil disimpan!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
