<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CompteController;


Route::view('/', 'welcome');
/*************************************************************
 * INSCRIPTION
 ************************************************************* */
//route d'affichage du formulaire
Route::get('/inscription', [InscriptionController::class, 'formulaire']);

//route de traitement du formulaire
Route::post('/inscription', [InscriptionController::class, 'traitement']);

/*************************************************************
 * CONNEXION
 ************************************************************* */
//affichage
Route::get('/connexion', [ConnexionController::class, 'formulaire']);

//traitement
Route::post('/connexion', [ConnexionController::class, 'traitement']);


Route::get('/mon-compte', [CompteController::class, 'accueil']);
Route::get('/deconnexion', [CompteController::class, 'deconnexion']);
Route::post('/modification-mdp', [CompteController::class, 'mofificationMdp']);
/* --------------------------------------------------------------------------*/

//route pour afficher la liste des utilisateurs 
Route::get('/afficher', [UtilisateurController::class, 'liste']);
