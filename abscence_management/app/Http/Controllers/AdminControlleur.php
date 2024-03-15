<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminControlleur extends Controller
{
    public function page_choix()
    {  
        return view('acc.choixUser');
    }
    
    public function log_admin()
    {  
        return view('LoginA.loginAdmin');
    }
   
    public function page_accueil()
    {  
        return view('premier.pageAcc');
    }

    public function page_login_Admin()
    {
        $admins = ModelAdmin::all();
        return view('LoginA.loginAdmin', compact('admins'));
    }

    public function ajouter_admin()
    {
        return view('LoginA.ajouterUser');
    }

    public function ajouter_admin_traitement(Request $request)
    {
        $request->validate([
            'nom_admin' => 'required',
            'mot_de_passe_admin' => 'required',
            'type' => 'required',
        ]);

        $val = new ModelAdmin();
        $val->nom_admin = $request->nom_admin;

        // Utilisation de la fonction password_hash() pour crypter le mot de passe
        $hashedPassword = Hash::make($request->mot_de_passe_admin);
        $val->mot_de_passe_admin = $hashedPassword;

        $val->type = $request->type;

        $val->save();
        
        return redirect('/LoginA')->with('status','Admins réussi');
    }

    public function verifier_admin_traitement(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'nom_admin' => 'required',
            'password_tow' => 'required',
        ]);
    
        // Récupérer le mot de passe haché de l'administrateur à partir de la base de données
        $admin = ModelAdmin::where('nom_admin', $credentials['nom_admin'])->first();
    
        // Vérifier si un administrateur avec ce nom existe
        if (!$admin) {
            // Administrateur introuvable, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    
        // Vérifier si le mot de passe fourni correspond au mot de passe haché enregistré
        if (Hash::check($credentials['password_tow'], $admin->mot_de_passe_admin)) {
            // Authentification réussie, rediriger l'utilisateur vers la page '/etudiant'
            return redirect('/premier');
        } else {
            // Authentification échouée, afficher un message d'erreur
            return back()->withErrors(['auth' => 'Nom d\'utilisateur ou mot de passe incorrect.']);
        }
    }

    public function verification_admin(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom_admin' => 'required',
            'mot_de_passe_admin' => 'required|min:6',
            'type' => 'required',
        ]);

        // Crypter le mot de passe
        $validatedData['mot_de_passe_admin'] = Hash::make($validatedData['mot_de_passe_admin']);

        // Ajouter l'utilisateur à la base de données
        ModelAdmin::create($validatedData);

        // Rediriger l'utilisateur après l'ajout
        return redirect()->route('Login')->with('success', 'User added successfully.');
        // return redirect('/Login')->with('status','User added successfully.');
    }

}
