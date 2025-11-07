<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    // Nama tabel, kalau default Laravel "order_items" sudah sesuai
    protected $table = 'order_items';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'order_id',
        'item_name',
        'quantity',
        'unit_price',
        'subtotal'
    ];

    // Relasi ke Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
