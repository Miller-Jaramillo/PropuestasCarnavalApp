<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionPropuestaAprobada extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $nombre_propuesta;
    public $observacion;


    /**
     * Create a new message instance.
     */
    public function __construct($user, $nombre_propuesta, $observacion )
    {
        //
        $this->user = $user;
        $this->nombre_propuesta = $nombre_propuesta;
        $this->observacion = $observacion;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tu propuesta ha sido publicada!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notificacion-propuesta-aprobada',
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
}
