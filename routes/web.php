<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route est une classe venant du dossier Illuminate\Support\Facades\ qui est son namespace
/*
 *pour la definir on commence par Route::
 *ensuite on definit l'action à utiliser. ici on veut juste recuperer le chemin donc Route::get
 *dans le get nous devons definir deux parametres:
    -le nom de la route
    -une function anonyme appelé callback function qui ne prend aucun paramètre et retourne ici notre vue
        mais la fonction peut retourner ce que l'on veut, on a donc ca

        Route::get('/' , function(){return view('welcome');})

    -notez bien que la vue prend en paramètre une chaine de caractère correspondant au chemin + nom du fichier .blade.php
    auquel on veut acceder ici c'est welcome.blade.php donc on ecrit juste view('welcome') qui se trouve a la racine
    de notre dossier views d'où le slash (/) 
    
    **********************AJOUT*********************************
    comme deuxième parametre du get on peut passer un controller sa syntaxe est la suivante
    Route::get('/',[NomDuController::class,'methodeAprendreEnCompte'])
    Route::get('/inscription', [InscriptionController::class, 'formulaire']);
    la route va faire appel au controller InscriptionController pour verifier si il peut
    afficher le formulaire qui se trouve dans la methode formulaire et l'afficher si oui
 */

/*
    Route::get('/', function () {
    return view('welcome');
});

la route peut etre ecrite de facon simplifier comme suite: Route::view('/','welcome');
*/

Route::view('/', 'welcome');


/*-----------------------------------------------------------
Travaillons avec les controlleurs pour un code plus securisé
------------------------------------------------------------- */

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

//redirection
Route::view('/mon-compte', 'mon-compte');
/* --------------------------------------------------------------------------*/

//route pour afficher la liste des utilisateurs 
Route::get('/afficher', [UtilisateurController::class, 'liste']);
