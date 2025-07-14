<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Projek\ProjekTukar;
use App\Models\Projek\Projek;

class MaklumanTukarTajuk extends Mailable
{
    use Queueable, SerializesModels;
    public $projTitleAsal;
    public $projTitleBaru;
    public $projPemilik;
    /**
     * Create a new message instance.
     */
    public function __construct($projekID)
    {
        $projekEdit = Projek::find($projekID);
        $projekPrevious = ProjekTukar::where('projt_projek_id', $projekID)->first();
        $this->projTitleAsal = $projekPrevious->projt_nama;
        $this->projPemilik = $projekEdit->program->prog_name;
        $this->projTitleBaru = $projekEdit->proj_nama;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PEMAKLUMAN AKTIVITI TUKAR TAJUK PROJEK',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'app.guna-baki.emel.makluman-tukar-tajuk',
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
