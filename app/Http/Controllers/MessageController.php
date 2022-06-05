<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //nouveau message
    public function nouveau()
    {
        //validation
        request()->validate([
            'message' => ['required']
        ]);

        //recupération de l'id et insertion l'id est directement lié a la clé etrangère utilisateur_id 
        Utilisateur::find(auth()->id())->messages()->create([
            "contenu" => request('message')
        ]);

        //creation du message et insertion dans la bd
        // Message::create([
        //    "utilisateur_id" => auth()->id(),
        //    "contenu" => request('message')
        // ]);
        flash('votre message a bien été publié');
        return back();
    }
}
