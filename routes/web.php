<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/gl', function () {
    return view('welcome');
});

Route::get('/listEvenements', [EvenementController::class, 'index'])->name('listEvenements');
Route::get('/createEvenement', [EvenementController::class, 'create'])->name('createEvenement');
Route::post('/storeEvenement', [EvenementController::class, 'store'])->name('storeEvenement');
Route::get('editEvenement/{id}', [EvenementController::class, 'edit'])->name('editEvenement');
Route::put('updateEvenement', [EvenementController::class, 'update'])->name('updateEvenement');
Route::delete('supprimerEvenement/{id}', [EvenementController::class, 'destroy'])->name('supprimerEvenement');


//Route::get('/listReservations', [ReservationController::class, 'index'])->name('listReservations');
//Route::get('/createReservation', [ReservationController::class, 'create'])->name('createReservation');
//Route::post('/storeReservation', [ReservationController::class, 'store'])->name('storeReservation');
//Route::get('/editReservation/{id}', [ReservationController::class, 'edit'])->name('editReservation');
//Route::put('/updateReservation', [ReservationController::class, 'update'])->name('updateReservation');
//Route::delete('supprimerReservation/{id}', [ReservationController::class, 'destroy'])->name('supprimerReservation');
//Reservation
Route::resource('reservation', ReservationController::class);
