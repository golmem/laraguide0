<?php

use Illuminate\Support\Facades\Route;

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
 *ensuite on definit l'action a utiliser. ici on veut juste recuperer le chemin donc Route::get
 *dans le get nous devons definr deux parametres:
    -le nom de la route
    -une function anonyme appelé callback function qui ne prend aucun paramètre et retourne ici notre vue
        mais la fonction peut retourner ce que l'on veut, on a donc ca

        Route::get('/' , function(){return view('welcome');})

    -notez bien que la vue prend en paramètre une chaine de caractère correspondant au nom du fichier .blade.php
    auquel on veut acceder ici c'est welcome.blade.php donc on ecrit juste view('welcome') qui se trouve a la racine
    de notre dossier views d'où le slash (/)  
 */

Route::get('/', function () {
    return view('welcome');
});

//ajout d'une route menant vers la vue route1.blade.php avec la première syntaxe
Route::get('/road', function () {
    return view('route1');
});
