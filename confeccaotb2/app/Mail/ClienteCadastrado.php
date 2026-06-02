<?php

namespace App\Mail;

use App\Models\Cliente;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;

class ClienteCadastrado extends Mailable
{
    public $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cliente cadastrado com sucesso',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.cliente-cadastrado',
        );
    }
}   