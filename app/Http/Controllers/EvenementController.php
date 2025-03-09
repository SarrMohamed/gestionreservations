<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
   public function index(){
       $evenements = Evenement::all();
       return view('evenement', compact('evenements'));
   }
  public function create(){
       $evenement = new Evenement();
       return view('addEvenement', compact('evenement'));
  }
   public function store(Request $request){
     dd($request);
       $evenement = new Evenement();
       $evenement->libelle = $request['libelle'];
       $evenement->prix = $request['prix'];
       $evenement->lieu = $request['lieu'];
       $evenement->date = $request['dateEvenement'];
       $evenement->description = $request['description'];
       $evenement->save();
       return redirect('listEvenements')->with('message','Evenement ajoute avec succes');
   }

  public function edit($id){
       $evenement = Evenement::find($id);
       return view('addEvenement', compact('evenement'));
  }
  public function update(Request $request){
       $evenement = Evenement::find($request['id']);
       $evenement->libelle = $request['libelle'];
       $evenement->prix = $request['prix'];
       $evenement->lieu = $request['lieu'];
       $evenement->date = $request['dateEvenement'];
       $evenement->description = $request['description'];
       $evenement->save();
       return redirect()->route('listEvenements')->with('success', 'Evenement modifier avec succes')   ;
  }

  public function destroy($id){
       $evenement = Evenement::find($id);
       $evenement->delete();
       return to_route('listEvenements')->with('success', 'Evenement supprimer avec succes')   ;
  }
}
