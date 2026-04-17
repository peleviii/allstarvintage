<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
public function __construct(
    public string $teamName,
    public string $responsible,
    public string $email,
    public string $phone,
    public string $note = ''
) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🏐 Νέα Δήλωση Συμμετοχής — ' . $this->teamName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }
}
