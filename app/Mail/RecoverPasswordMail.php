<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $new_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $new_password)
    {
        $this->subject = $subject;
        $this->new_password = $new_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.recover_password', [
            'subject' => $this->subject,
            'new_password' => $this->new_password,
        ]);
    }
}
