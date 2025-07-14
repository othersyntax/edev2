<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Projek\Projek;

class MaklumanKenaikanKos extends Mailable
{
    use Queueable, SerializesModels;
    public $projTitleAsal;
    public $projPemilik;

    /**
     * Create a new message instance.
     */
    public function __construct($projekID)
    {
        $projekEdit = Projek::find($projekID);
        $this->projTitleAsal = $projekEdit->proj_nama;
        $this->projPemilik = $projekEdit->program->prog_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PEMAKLUMAN KENAIKAN KOS PROJEK',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'app.guna-baki.emel.makluman-kenaikan-kos',
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
