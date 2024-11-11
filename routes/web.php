<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

/*
| Hier registreren we de routes voor de webinterface van de applicatie.
| Deze routes worden geladen door de RouteServiceProvider binnen een groep
| die het "web" middleware group bevat.
*/

/**
 * Route voor de homepagina van de applicatie.
 * Deze verwijst naar de index-methode van de TicketController,
 * waar een lijst van onvoltooide tickets wordt weergegeven.
 */
Route::get('/', [TicketController::class, 'index']);

/**
 * Resource routes voor de TicketController.
 * Dit genereert automatisch de standaard CRUD-routes:
 * - index: GET /tickets
 * - create: GET /tickets/create
 * - store: POST /tickets
 * - show: GET /tickets/{ticket}
 * - edit: GET /tickets/{ticket}/edit
 * - update: PUT/PATCH /tickets/{ticket}
 * - destroy: DELETE /tickets/{ticket}
 */
Route::resource('tickets', TicketController::class);

/**
 * Extra route voor het markeren van een ticket als voltooid.
 * De PATCH-methode wordt gebruikt omdat het een gedeeltelijke update betreft.
 * De naam van de route is 'tickets.complete' voor eenvoudige referentie in views.
 */
Route::patch('tickets/{ticket}/complete', [TicketController::class, 'complete'])->name('tickets.complete');