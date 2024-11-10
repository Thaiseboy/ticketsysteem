<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Homepagina verwijst naar het tickets overzicht
Route::get('/', [TicketController::class, 'index']);

// Resource routes voor de tickets
Route::resource('tickets', TicketController::class);

Route::patch('tickets/{ticket}/complete', [TicketController::class, 'complete'])->name('tickets.complete');