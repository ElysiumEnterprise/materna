<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuspensoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuario;
    public $qtddDenuncias;
    /**
     * Create a new message instance.
     * @param string $nomeUsuario;
     * @param int $qtddDenuncias;
     */
    public function __construct($nomeUsuario, $qtddDenuncias)
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->qtddDenuncias = $qtddDenuncias;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Você está Suspenso!!!',
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
     * @return $this
     */
    public function build(){

        $nomeUsuario = $this->nomeUsuario;

        return $this->view('emails.mail-suspenso')->with(['nomeUsuario' => $nomeUsuario])->attach(public_path('assets\img\logo\Logo-Materna.png'),[
            'as' => 'Logo-Materna.png',
            'mime' => 'image/png'
        ]);
    }
}
