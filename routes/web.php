<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;

// Halaman Utama (Homepage)
Route::get('/', function () {
    return view('index');
})->name('home');

// Halaman Order di Tempat (Menu dan Checkout)
Route::controller(OrderController::class)->group(function () {
    Route::get('/order', 'create')->name('order');
    Route::post('/order/submit', 'store')->name('order.submit');
    Route::get('/order/success/{orderId}', 'success')->name('order.success');
});

// Halaman Reservasi Meja (Booking Form)
Route::controller(ReservationController::class)->group(function () {
    Route::get('/book', 'create')->name('book');
    Route::post('/reservations/submit', 'store')->name('reservation.submit');
});

