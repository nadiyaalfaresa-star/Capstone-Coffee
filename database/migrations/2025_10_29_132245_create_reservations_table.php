<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Kunci utama (ID)


            $table->string('full_name', 100);
            $table->string('email', 100)->unique();
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->unsignedSmallInteger('number_of_people');
            $table->text('special_request')->nullable(); 

      
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');

            $table->timestamps(); // created_at dan updated_at
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
