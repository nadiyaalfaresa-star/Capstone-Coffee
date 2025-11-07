<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    // Nama tabel, kalau default Laravel "orders" sudah sesuai
    protected $table = 'orders';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'customer_name',
        'table_number',
        'total_amount',
        'status'
    ];

    // Relasi ke OrderItem
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
