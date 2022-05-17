<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeeStructure extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;
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
        $subject = "Fee Structure";

        $mail = $this->from('codicttechnologies@gmail.com', 'K Points')
            ->markdown('emails.fee_structure', ['data' => $this->mailData])
            ->subject($subject);
        return $mail;
    }
}
