<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $emailContent;
    public $email_activation_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailContent,$email_activation_token)
    {
        $this->emailContent = $emailContent;
        $this->email_activation_token = $email_activation_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registration.confirmation')
                    ->with(['content' => $this->emailContent, 'email_activation_token' => $this->email_activation_token]);
    }
}
