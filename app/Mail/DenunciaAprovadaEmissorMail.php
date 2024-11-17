<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DenunciaAprovadaEmissorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuario;
    public $decisaoDenuncia;
    public $usuarioDenunciado;
    public $motivoDenuncia;
    public $txtEsclarecimento;

    /**
     * Create a new message instance.
     * @param string $nomeUsuario;
     * @param string $decisaoDenuncia;
     * @param string $usuarioDenunciado;
     * @param string $motivoDenuncia;
     * @param string $txtEsclarecimento;
     */

    /**
     * Create a new message instance.
     */
    public function __construct($nomeUsuario, $decisaoDenuncia, $usuarioDenunciado, $motivoDenuncia, $txtEsclarecimento)
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->decisaoDenuncia = $decisaoDenuncia;
        $this->usuarioDenunciado = $usuarioDenunciado;
        $this->motivoDenuncia = $motivoDenuncia;
        $this->txtEsclarecimento = $txtEsclarecimento;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Resultado de Sua Denúncia',
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

        return $this->view('emails.mail-decisao-denuncia')->with(['motivoDenuncia'=> $this->motivoDenuncia, 'nomeUsuario'=> $this->nomeUsuario, 'decisaoDenuncia'=> $this->decisaoDenuncia, 'denunciado'=> $this->usuarioDenunciado, 'esclarecimento' => $this->txtEsclarecimento])->subject('Resultado da Denúncia - Materna')->attach(public_path('assets\img\logo\Logo-Materna.png'), [
            'as' => 'Logo-Materna.png',
            'mime' => 'image/png',
        ]);

     }
}
