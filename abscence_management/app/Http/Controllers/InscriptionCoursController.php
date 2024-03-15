<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCours;
use App\Models\ModelEtudiant;
use App\Models\ModelInscriptionCours;

class InscriptionCoursController extends Controller
{
    public function liste_cours_a_inscrire($etudiant_id)
    {
        // Supposons que vous ayez un modèle pour les étudiants appelé ModelEtudiant
        $etudiant = ModelEtudiant::find($etudiant_id);
        
        // Vérifiez si l'étudiant existe
        if (!$etudiant) {
            return redirect()->back()->with('error', 'Étudiant non trouvé');
        }

        // Maintenant, vous pouvez obtenir le nom de l'étudiant
        $nom_etudiant = $etudiant->nom;
    
        // Ensuite, vous pouvez récupérer la liste des cours
        $cours = ModelCours::all();

        // Passer les données à la vue
        return view('inscription_cours.donnerCours', compact('cours', 'nom_etudiant', 'etudiant'));
    }

    public function enregistrerInscription(Request $request)
    {
        // Récupérer les données du formulaire
        $etudiant_id = $request->input('etudiant_id');
        $cours_ids = $request->input('cours_ids');

        // Enregistrer les cours sélectionnés pour l'étudiant dans la base de données
        foreach ($cours_ids as $cour_id) {
            ModelInscriptionCours::create([
                'idEtudiant' => $etudiant_id,
                'idCours' => $cour_id
            ]);
        }

        return redirect('/cour')->with('status','le cours de l\'étudiant a bien été ajouté avec succés');
    }


    public function liste_etudiant_avec_cours()
    {
        // Récupérer tous les étudiants avec leurs cours
        $etudiantsAvecCours = ModelInscriptionCours::with('etudiant', 'cours')->get();

        // Passer les données à la vue
        return view('inscription_cours.listeEtudiantAvecCours', ['etudiantsAvecCours' => $etudiantsAvecCours]);
    }
    
}
