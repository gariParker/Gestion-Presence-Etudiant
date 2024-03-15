<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEnseignant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EnseignantControlleur extends Controller
{
    public function log_enseignant()
    {  
        return view('LoginP.loginEnseignant');
    }

    public function page_login_prof()
    {
        $prof = ModelEnseignant::all();
        return view('LoginP.loginEnseignant', compact('prof'));
    }
    
    public function ajouter_prof()
    {
        return view('LoginP.ajouterUserProf');
    }

    public function ajouter_enseignant_traitement(Request $request)
    {
        $request->validate([
            'nom_enseignant' => 'required',
            'mdp_enseignant' => 'required',
            'type_enseignant' => 'required',
        ]);

        $val = new ModelEnseignant();
        $val->nom_enseignant = $request->nom_enseignant;

        // Utilisation de la fonction password_hash() pour crypter le mot de passe
        $hashedPassword = Hash::make($request->mdp_enseignant);
        $val->mdp_enseignant = $hashedPassword;

        $val->type_enseignant = $request->type_enseignant;

        $val->save();
        
        return redirect('/LoginP')->with('status','Ajout enseignant réussi');
    }

    public function verifier_enseignant_traitement(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'nom_enseignant' => 'required',
            'password_prof' => 'required',
        ]);
    
        // Récupérer le mot de passe haché de l'administrateur à partir de la base de données
        $admin = ModelEnseignant::where('nom_enseignant', $credentials['nom_enseignant'])->first();
    
        // Vérifier si un administrateur avec ce nom existe
        if (!$admin) {
            // Administrateur introuvable, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    
        // Vérifier si le mot de passe fourni correspond au mot de passe haché enregistré
        if (Hash::check($credentials['password_prof'], $admin->mdp_enseignant)) {
            // Authentification réussie, rediriger l'utilisateur vers la page '/etudiant'
            return redirect('/premier');
        } else {
            // Authentification échouée, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    }

}
