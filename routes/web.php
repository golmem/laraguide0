<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\Auth;

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


Route::get('/mon-compte', [CompteController::class, 'accueil'])->middleware(Auth::class);
Route::get('/deconnexion', [CompteController::class, 'deconnexion'])->middleware(Auth::class);
Route::post('/modification-mdp', [CompteController::class, 'mofificationMdp'])->middleware(Auth::class);
/* --------------------------------------------------------------------------*/

//route pour afficher la liste des utilisateurs c'est notre page d'accueil
Route::get('/', [UtilisateurController::class, 'liste']);


/* --------------------------------------------------------------------------*/

/*************************************************************
 * message pour l'utilisateur connecté
 ************************************************************* */

Route::post('/messages', [MessageController::class, 'nouveau'])->middleware(Auth::class);

/* --------------------------------------------------------------------------*/
/*************************************************************
 * RECUPERATION D'UN UTILISATEUR EN GET
 ************************************************************* */

//notez que la route est mise en fin pour eviter qu'elle prenne la priorité sur les autres routes qui vont la suivre
Route::get('/{email}', [UtilisateurController::class, 'voir']);
/* --------------------------------------------------------------------------*/