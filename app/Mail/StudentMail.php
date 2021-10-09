<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail=$detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('UGD 190710181')->view('mail');
    }
}
