<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets/{id}/download', [TicketController::class, 'downloadQrCode'])->name('tickets.downloadQrCode');