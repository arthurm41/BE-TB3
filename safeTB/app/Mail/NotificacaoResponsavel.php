<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacaoResponsavel extends Mailable
{
    use Queueable, SerializesModels;

    public $mensagem;

    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function build()
    {
        return $this
            ->subject('SAFE - Notificação Escolar')
            ->view('emails.notificacao');
    }
}