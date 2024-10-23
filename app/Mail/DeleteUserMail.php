<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeleteUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuario;
    public $motivoExclusao;

    /**
     * Create a new message instance.
     * @param string $nomeUsuario;
     * @param string $motivoExclusao;
     */
    public function __construct($nomeUsuario, $motivoExclusao)
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->motivoExclusao = $motivoExclusao;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sua conta foi excluída!!!',
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

    /**
     * Build message
     * @return $this;
     */
    public function attachments(): array
    {
        return [];
    }

    public function build(){
        return $this->view('emails.mail-delete')->with(['nomeUsuario' => $this->nomeUsuario , 'motivoExclusao' => $this->motivoExclusao])->attach(public_path('assets\img\logo\Logo-Materna.png'),[
            'as' => 'Logo-Materna.png',
            'mime' => 'image/png'
        ]);
    }
}
