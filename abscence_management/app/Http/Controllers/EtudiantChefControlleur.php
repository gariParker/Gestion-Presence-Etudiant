<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chef_de_classe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EtudiantChefControlleur extends Controller
{
    public function log_etudiant()
    {  
        return view('LoginC.loginEtudiant');
    }

    
    public function ajouter_chef()
    {
        return view('LoginC.ajouterUserChef');
    }
    //liaison pages ajout s vérification
    public function page_login_chef_de_classe()
    {
        return view('LoginC.loginEtudiant');
    }

    public function ajouter_chefDeClasse_traitement(Request $request)
    {
        $request->validate([
            'nom_etudiant' => 'required',
            'mdp_etudiant' => 'required',
            'type_etudiant' => 'required',
        ]);

        $val = new chef_de_classe();
        $val->nom_etudiant = $request->nom_etudiant;

        // Utilisation de la fonction password_hash() pour crypter le mot de passe
        $hashedPassword = Hash::make($request->mdp_etudiant);
        $val->mdp_etudiant = $hashedPassword;

        $val->type_etudiant = $request->type_etudiant;

        $val->save();
        
        return redirect('/LoginC')->with('status','Ajout Chef de classe réussi');
    }

    public function verifier_chefDeClasse_traitement(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'nom_etudiant' => 'required',
            'password_chef' => 'required',
        ]);
    
        // Récupérer le mot de passe haché de l'administrateur à partir de la base de données
        $admin = chef_de_classe::where('nom_etudiant', $credentials['nom_etudiant'])->first();
    
        // Vérifier si un administrateur avec ce nom existe
        if (!$admin) {
            // Administrateur introuvable, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    
        // Vérifier si le mot de passe fourni correspond au mot de passe haché enregistré
        if (Hash::check($credentials['password_chef'], $admin->mdp_etudiant)) {
            // Authentification réussie, rediriger l'utilisateur vers la page '/etudiant'
            return redirect('/premier');
        } else {
            // Authentification échouée, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    }
}
