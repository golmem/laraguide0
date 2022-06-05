<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

        //creation du message et insertion dans la bd
        Message::create([
            "utilisateur_id" => auth()->id(),
            "contenu" => request('message')
        ]);

        flash('votre message a bien été publié');
        return back();
    }
}
