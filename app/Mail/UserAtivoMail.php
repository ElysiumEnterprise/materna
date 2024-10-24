<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserAtivoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuario;
    /**
     * Create a new message instance.
     * @param string $nomeUsuario;
     */
    public function __construct($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Conta ativada!!!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            //view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build message
     * @return $this;
     */
    public function build(){
        return $this->view('emails.mail-user-ativo')->with(['nomeUsuario' => $this->nomeUsuario])->attach(public_path('assets\img\logo\Logo-Materna.png'),[
            'as' => 'Logo-Materna.png',
            'mime' => 'image/png'
        ]);
    }
}
