<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
   public function index(){
       $reservations = Reservation::all();
       return view('reservation', compact('reservations'));
   }
   public function create(){
       $evenements = Evenement::all();
       $reservation = new Reservation();
       return view('addReservation', compact('reservation', 'evenements'));
   }

   public function store(Request $request){
       $reservation = new Reservation();
         $request->validate([
           'prix' => 'required|numeric|max:600000',
           'evenement_id' => 'required',
           'date' => 'required',
           'nombrePlace' => 'required',
       ]);
       $reservation->prix = $request['prix'];
       $reservation->evenement_id = $request['evenement_id'];
       $reservation->date = $request['date'];


       return redirect('/listReservation')->with('success', 'Reservation added!');
   }

   public function edit($id){
       $reservation = Reservation::find($id);
       return view('addReservation', compact('reservation'));
   }

   public function update(Request $request){
       $reservation = Reservation::find($request['id']);
       $reservation->nombrePlace = $request['nombrePlace'];
       $reservation->prix = $request['prix'];
       $reservation->date = $request['dateReservation'];
       $reservation->save();
       return redirect('/listReservation')->with('success', 'Reservation modifier avec succes!');
   }

   public function destroy($id){
       $reservation = Reservation::find($id);
       $reservation->delete();
       return redirect('/listReservation')->with('success', 'Reservation supprimer avec succes!');
   }
}
