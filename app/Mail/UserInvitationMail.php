<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $temporaryPassword,
        public string $loginUrl,
    ) {}

    public function build()
    {
        return $this->subject('Welcome to the YQL DNA Portal — Your Account Details')
            ->view('emails.user-invitation');
    }
}
