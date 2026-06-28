<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public ?string $phone,
        public string $email,
        public string $messageBody,
    ) {}

    public function build()
    {
        return $this->subject('YQL DNA Portal — New Contact Inquiry')
            ->replyTo($this->email, $this->name)
            ->view('emails.contact-inquiry');
    }
}
