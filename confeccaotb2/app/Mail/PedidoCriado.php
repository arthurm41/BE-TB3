<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PedidoCriado extends Mailable
{
    public $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido realizado com sucesso',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pedido-criado',
        );
    }
}