<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DenunciaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $motivoDenuncia;
    public $nomeUsuario;
    public $qtddDenuncia;
    /**
     * Create a new message instance.
     * @param string $motivoDenuncia
     * @param string $nomeUsuario
     * @param int $qtddDenuncia
     * @return void
     */
    public function __construct($motivoDenuncia, $nomeUsuario, $qtddDenuncia)
    {
        $this->motivoDenuncia = $motivoDenuncia;
        $this->nomeUsuario = $nomeUsuario;
        $this->qtddDenuncia = $qtddDenuncia;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Denuncia Mail',
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

        $denuncia = $this->motivoDenuncia;
        $usuario = $this->nomeUsuario;
        $qtddDenuncia = $this->qtddDenuncia;
        
        return $this->view('emails.mail-denuncia')->with(['denuncia' => $denuncia, 'usuario' => $usuario, 'qtddDenuncia' => $qtddDenuncia]);
    }
}   

