<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCours;

class CoursController extends Controller
{
    //Fonction pour voir la liste des cours
    public function liste_cour()
    {
        $cours = ModelCours::all();
        return view('cour.listeCours', compact('cours'));
    }

    //Fonction pour pouvoir relier la pagination entre liste des cours et l'ajout du cours
    public function ajouter_cour()
    {
        return view('cour.ajoutCours');
    }

    //Fonction  pour ajouter un nouveau cours
    public function ajouter_cours_traitement(Request $request)
    {
        $request->validate([
            'nom_cours' => 'required',
            'sigle_cours' => 'required',
            'nbr_credit' => 'required',
        ]);

        $cour = new ModelCours();
        $cour->nom_cours = $request->nom_cours;
        $cour->sigle_cours = $request->sigle_cours;
        $cour->nbr_credit = $request->nbr_credit;

        $cour->save();
        
        return redirect('/ajoutCours')->with('status','Le cours a bien été ajouté avec succés');
    }

    //Fonction pour supprimer le cours
    public function delete_cours($id){
        $cour = ModelCours::find($id);
        $cour->delete();
        return redirect('/cour')->with('status','Le cours a bien été supprimé avec succés');
    }

    //Fonction pour la pagination entre la page modifier et la liste des cours
    public function update_cours($id){
        $cours = ModelCours::find($id);

        return view('cour.updateCours', compact('cours'));
    }

    //Fonction pour faire la modification dans la base de donnée
    public function update_cours_traitement(Request $request){

        $request->validate([
            'nom_cours' => 'required',
            'sigle_cours' => 'required',
            'nbr_credit' => 'required',
        ]);

        $cour = ModelCours::find($request->id);
        $cour->nom_cours = $request->nom_cours;
        $cour->sigle_cours = $request->sigle_cours;
        $cour->nbr_credit = $request->nbr_credit;

        $cour->update();

        return redirect('/cour')->with('status','Le cours a bien été modifié avec succés');
    }


}
