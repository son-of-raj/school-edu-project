<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Credential extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $subject = "Admission code & Login Credentials @ Kpoints E-learning ";

        $mail = $this->from('codicttechnologies@gmail.com', 'K Points')
            ->markdown('emails.credential', ['data' => $this->mailData])
            ->subject($subject);
        return $mail;
    }
}
