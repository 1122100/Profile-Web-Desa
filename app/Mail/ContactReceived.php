<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageContent;

    public function __construct($name, $email, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Received',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.received',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'messageContent' => $this->messageContent,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}