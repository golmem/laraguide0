<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SuivisController;
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

/*************************************************************
 * GROUPE DE ROUTE POUR MIDDLEWARE
 * 
 * il permet de grouper un ensemble de route ayant en commun des
 * middleware dans notre cas
 ************************************************************* */

Route::middleware([Auth::class])->group(function () {

    Route::get('/mon-compte', [CompteController::class, 'accueil']);
    Route::get('/deconnexion', [CompteController::class, 'deconnexion']);
    Route::post('/modification-mdp', [CompteController::class, 'mofificationMdp']);
    Route::post('/messages', [MessageController::class, 'nouveau']);
    Route::post('/{email}/suivis', [SuivisController::class, 'nouveau']);
});


/* --------------------------------------------------------------------------*/

//route pour afficher la liste des utilisateurs c'est notre page d'accueil
Route::get('/', [UtilisateurController::class, 'liste']);

/* --------------------------------------------------------------------------*/
/*************************************************************
 * RECUPERATION D'UN UTILISATEUR EN GET
 ************************************************************* */

//notez que la route est mise en fin pour eviter qu'elle prenne la priorité sur les autres routes qui vont la suivre
Route::get('/{email}', [UtilisateurController::class, 'voir'])->middleware([Auth::class]);
/* --------------------------------------------------------------------------*/