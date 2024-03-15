<?php

//Include pour pouvoir l'appeler (utiliser) le controller

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\InscriptionCoursController;
use App\Http\Controllers\AbscenceController;
use App\Http\Controllers\AdminControlleur;
use App\Http\Controllers\EnseignantControlleur;
use App\Http\Controllers\EtudiantChefControlleur;
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

//Premier paramètre url de la route , et 2ème paramètre le controller Correspondant
//3ème nom de la fonction (Vue)

Route::get('/acc',[AdminControlleur::class, 'page_choix']);
Route::get('/premier',[AdminControlleur::class, 'page_accueil']);
Route::post('/LoginA',[AdminControlleur::class, 'log_admin']);//OUVRIR PAGE LOGIN ADMIN
Route::post('/LoginP',[EnseignantControlleur::class, 'log_enseignant']);//OUVRIR PAGE LOGIN PROF
Route::post('/LoginC',[EtudiantChefControlleur::class, 'log_etudiant']);//OUVRIR PAGE LOGIN chef de classe

Route::get('/LoginA',[AdminControlleur::class, 'page_login_Admin']);
Route::get('/ajouterUser',[AdminControlleur::class, 'ajouter_admin']);
Route::post('/ajouterUser/traite',[AdminControlleur::class, 'ajouter_admin_traitement']);
Route::post('/verifierUser/traite', [AdminControlleur::class, 'verifier_admin_traitement']);

Route::get('/LoginP',[EnseignantControlleur::class, 'page_login_prof']);
Route::get('/ajouterUserProf',[EnseignantControlleur::class, 'ajouter_prof']);
Route::post('/ajouterUserProf/traite',[EnseignantControlleur::class, 'ajouter_enseignant_traitement']);
Route::post('/verifierUserProf/traite', [EnseignantControlleur::class, 'verifier_enseignant_traitement']);

Route::get('/LoginC',[EtudiantChefControlleur::class, 'page_login_chef_de_classe']);
Route::get('/ajouterUserChef',[EtudiantChefControlleur::class, 'ajouter_chef']);
Route::post('/ajouterUserChef/traite', [EtudiantChefControlleur::class, 'ajouter_chefDeClasse_traitement']);
Route::post('/verifierUserChef/traite', [EtudiantChefControlleur::class, 'verifier_chefDeClasse_traitement']);

Route::get('/delete-etudiant/{id}',[EtudiantController::class, 'delete_etudiant']);
Route::get('/update-etudiant/{id}',[EtudiantController::class, 'update_etudiant']);
Route::post('/update/traitement',[EtudiantController::class, 'update_etudiant_traitement']);

Route::get('/etudiant',[EtudiantController::class, 'liste_etudiant']);
Route::get('/ajouter',[EtudiantController::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement',[EtudiantController::class, 'ajouter_etudiant_traitement']);

Route::get('/cour',[CoursController::class, 'liste_cour']);
Route::get('/ajoutCours',[CoursController::class, 'ajouter_cour']);
Route::post('/ajoutCours/traitement',[CoursController::class, 'ajouter_cours_traitement']);

Route::get('/delete-cours/{id}',[CoursController::class, 'delete_cours']);
Route::get('/update-cours/{id}',[CoursController::class, 'update_cours']);
Route::post('/updateCours/traitement',[CoursController::class, 'update_cours_traitement']);


Route::get('/inscription_cours/{etudiant_id}', [InscriptionCoursController::class, 'liste_cours_a_inscrire']);
Route::post('/enregistrer-inscription', [InscriptionCoursController::class, 'enregistrerInscription']);
Route::get('/listeEtudiantAvecCours',[InscriptionCoursController::class, 'liste_etudiant_avec_cours']);

Route::get('/gestion',[AbscenceController::class, 'presence_etudiant']);
Route::get('/gestion-abscence/{id}', [AbscenceController::class, 'recuperer_donnee_etudiant']);
Route::get('/presence-etudiant', [AbscenceController::class, 'presence_etudiant']);
Route::post('/ajouter-info-etudiant', [AbscenceController::class, 'ajouter_etudiant_present_traitement']);
Route::get('/gestion-abscenc/{id}', [AbscenceController::class, 'afficherHistorique'])->name('afficherHistorique');




// Route::get('/gestion-abscence/{id}', 'EtudiantController@details');
//Vue par défaut 
// Route::get('/', function () {
//     return view('welcome');
// });
