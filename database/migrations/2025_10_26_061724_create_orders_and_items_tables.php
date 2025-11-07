<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 100);
            $table->string('table_number', 20);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->enum('status', ['new', 'preparing', 'ready', 'paid', 'cancelled'])->default('new');
            $table->timestamps();
        });


        Schema::create('order_items', function (Blueprint $table) {
            $table->id();


            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade');

            $table->string('item_name', 100);
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->decimal('unit_price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
