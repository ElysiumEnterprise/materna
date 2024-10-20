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

    public $denuncia;
    public $usuario;
    /**
     * Create a new message instance.
     * @param object $denuncia
     * @param object $usuario
     * @return void
     */
    public function __construct($denuncia, $usuario)
    {
        $this->denuncia = $denuncia;
        $this->usuario = $usuario;
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
            view: 'view.name',
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

        $denuncia = $this->denuncia;
        $usuario = $this->usuario;
        return $this->view('emails.mail-denuncia')->with(['denuncia' => $denuncia, 'usuario' => $usuario]);
    }
}   

