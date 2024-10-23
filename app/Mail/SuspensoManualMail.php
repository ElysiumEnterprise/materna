<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuspensoManualMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuario;
    public $motivo;
    /**
     * Create a new message instance.
     * @param string $nomeUsuario;
     * @param string $motivo;
     */
    public function __construct($nomeUsuario, $motivo)
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->motivo = $motivo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Você foi suspenso!!!',
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
     * Build Message
     * @return $this;
     */
    public function build(){

        $nomeUsuario = $this->nomeUsuario;

        $motivo = $this->motivo;

        return $this->view('emails.mail-suspenso-manual')->with(['nomeUsuario' => $nomeUsuario, 'motivo' => $motivo])->attach(public_path('assets\img\logo\Logo-Materna.png'), [
            'as' => 'Logo-Materna.png',
            'mime' => 'image/png'
        ]);
    }
}
