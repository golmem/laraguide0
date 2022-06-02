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

//ajout d'une route affichant un message avec un parametre en plus 
//pour passer un paramètre dans l'url on fait un slash et on le met entre accolade comme ceci : /{nomDuParametre}
//request('parametre passé dans l'url') cette fonction recupère les parametre passé dans l'url et les affiches
Route::get('/road/{numero}', function () {
    return 'route' . request('numero');
});

//route renvoyant sur une vue avec recuperation des parametres get
/*Route::get('/bonjour/{nom}', function () {
    return view('bonjour');
});*/

//route renvoyant sur une vue avec recuperation des parametres get defini au sein de la fonction dans une variable 
/*
    n'oubliez pas de definir comme il faut la variable dans la vue 
    sinon la vue ne transporte pas directement le contenu des variables
    on aura un tableau comme second paramètre de la vue pour prendre les variables en compte
    le tableau fonctionne avec la logique clé => valeur
    la valeur peut etre une variable ou une chaine directement défini
    view('nomDeLaRoute',['clé'=>$valeur])
    view('bonjour',['nom'=>$nom])
*/
Route::get('/{nom}', function () {
    $nom = request('nom');
    return view('bonjour', ['nom' => $nom]);
});
