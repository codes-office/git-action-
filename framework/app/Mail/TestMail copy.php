<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $testMessage;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($testMessage, $subject)
    {
        $this->testMessage = $testMessage;
        $this->subject = $subject;
    } 

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.testMail',  // Specify your view file here
            with: [
                'testMessage' => $this->testMessage,  // Pass the testMessage to the view
            ]
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
