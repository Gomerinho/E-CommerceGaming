<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Vente extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $product;
    public $vente;

    public function __construct($user, $product, $vente)
    {
        $this->user = $user;
        $this->product = $product;
        $this->vente = $vente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Facture d'achat du jeu " . $this->product->name)
            ->view('Mail/vente');
    }
}
