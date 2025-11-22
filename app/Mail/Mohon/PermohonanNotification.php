<?php

namespace App\Mail\Mohon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PermohonanNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $permohonan;
    public $role;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->permohonan = $permohonan;
        $this->role = ucfirst($role);
    }

    public function build()
    {
        return $this->subject("Notifikasi Permohonan Projek untuk {$this->role}")
            ->view('emails.permohonan_notification');
    }
}
