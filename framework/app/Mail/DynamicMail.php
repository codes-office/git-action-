<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DynamicMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $subjectLine;
    public $bodyContent;
    public $footerContent;

    /**
     * Create a new message instance.
     */
    public function __construct($title, $subjectLine, $bodyContent, $footerContent)
    {
        $this->title = $title;
        $this->subjectLine = $subjectLine;
        $this->bodyContent = $bodyContent;
        $this->footerContent = $footerContent;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.dynamicMail')
                    ->subject($this->subjectLine)
                    ->with([
                        'title' => $this->title,
                        'bodyContent' => $this->bodyContent,
                        'footerContent' => $this->footerContent,
                    ]);
    }
}