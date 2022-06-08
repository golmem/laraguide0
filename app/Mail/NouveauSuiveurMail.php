<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauSuiveurMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $suiveur;
    public function __construct($suiveur)
    {
        //
        $this->suiveur = $suiveur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau Suiveur')->view('mails.nouveau_suiveur')
            ->text('mails.nouveau_suiveur_text'); //->markdown('mails.nouveau_suiveur')
    }
}
