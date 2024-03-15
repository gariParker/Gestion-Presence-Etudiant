<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEtudiant;


class EtudiantController extends Controller
{
    
    public function liste_etudiant()
    {
        $etudiants = ModelEtudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = new ModelEtudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;

        $etudiant->save();
        
        return redirect('/ajouter')->with('status','L\'étudiant a bien été ajouté avec succés');
    }

    public function update_etudiant($id){
        $etudiants = ModelEtudiant::find($id);

        return view('etudiant.update', compact('etudiants'));
    }

    public function update_etudiant_traitement(Request $request){

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = ModelEtudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;

        $etudiant->update();

        return redirect('/etudiant')->with('status','L\'étudiant a bien été modifié avec succés');
    }

    public function delete_etudiant($id){
        $etudiant = ModelEtudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiant')->with('status','L\'étudiant a bien été supprimé avec succés');
    }

}
