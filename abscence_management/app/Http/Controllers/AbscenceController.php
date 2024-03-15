<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEtudiant;
use App\Models\abscence;
use App\Models\ModelCours;
use App\Models\ModelInscriptionCours;

class AbscenceController extends Controller
{

    // public function presence_etudiant(Request $request)
    // {
    //     $cours = ModelCours::all(); // Récupère tous les cours depuis la base de données
    //     $etudiants = array();
    //     $coursSelectionne = false;
    //     $dateActuelle = date('Y-m-d');

    //     $coursId = $request->input('cours_id');
        
    //     if ($coursId) {
    //         $etudiants = ModelEtudiant::join('model_inscription_cours', 'model_etudiants.id', '=', 'model_inscription_cours.idEtudiant')
    //             ->where('model_inscription_cours.idCours', $coursId)
    //             ->get(['model_etudiants.id', 'model_etudiants.nom', 'model_etudiants.prenom', 'model_etudiants.classe']);
    //         $coursSelectionne = true; 
    //     }

    //     $absences = abscence::all();

    //     return view('gestion.gererAbscence', compact('cours', 'etudiants', 'coursSelectionne','dateActuelle','coursId','absences'));
    // }

    public function presence_etudiant(Request $request)
    {
        $cours = ModelCours::all(); // Récupère tous les cours depuis la base de données
        $etudiants = array();
        $coursSelectionne = false;
        $dateActuelle = date('Y-m-d');

        // Récupère l'ID du cours depuis la requête ou la variable de session
        $coursId = $request->input('cours_id') ?? session('cours_id');
        
        if ($coursId) {
            // Stocke l'ID du cours dans la variable de session
            session(['cours_id' => $coursId]);
            $etudiants = ModelEtudiant::join('model_inscription_cours', 'model_etudiants.id', '=', 'model_inscription_cours.idEtudiant')
                ->where('model_inscription_cours.idCours', $coursId)
                ->get(['model_etudiants.id', 'model_etudiants.nom', 'model_etudiants.prenom', 'model_etudiants.classe']);
            $coursSelectionne = true; 
        }

        $absences = abscence::all();

        return view('gestion.gererAbscence', compact('cours', 'etudiants', 'coursSelectionne','dateActuelle','coursId','absences'));
    }

    
    public function recuperer_donnee_etudiant($id, Request $request)
    {
        $etudiant = ModelEtudiant::find($id);
        $cours = ModelCours::all();
        $coursSelectionne = false;
        $dateActuelle = date('Y-m-d');
        $coursId = $request->input('cours_id');
        $absences = abscence::all();
        return view('gestion.gererAbscence', compact('cours', 'etudiant', 'coursSelectionne', 'dateActuelle', 'coursId', 'absences'));
    }

    public function ajouter_etudiant_present_traitement(Request $request)
    {
        $request->validate([
            'idEtudiant' => 'required',
            'idCours' => 'required',
            'etat' => 'required',
            'date_abscence' => 'required',
        ]);
    
        $info = new abscence();
        $info->idEtudiant = $request->idEtudiant;
        $info->idCours = $request->idCours;
        $info->etat = $request->etat;
        $info->date_abscence = $request->date_abscence;
        $info->heure_abscence = now(); // Enregistre l'heure actuelle
    
        $info->save();
        
        return redirect('/gestion')->with('status', 'Information sur la présence de l\'étudiant a été enregistrée avec succès');
    }

        public function gererAbscences()
        {
            $absences = Abscences::with(['etudiantt', 'courss'])->get();
                
            return view('gestion.gererAbscence', compact('absences'));
        }

        public function afficherHistorique($id)
        {
            $etudiant = ModelEtudiant::findOrFail($id);
            $absences = $etudiant->abscences;
            $cours = ModelCours::all();
            $coursSelectionne = false;
            $dateActuelle = date('Y-m-d');
            return view('gestion.gererAbscence', compact('cours','coursSelectionne','dateActuelle','absences'));
        }
    
}
