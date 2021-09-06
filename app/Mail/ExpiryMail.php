<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ExpiryMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $remainder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remainder)
    {
        $this->remainder = $remainder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('webtech.Expirymail')->with('remainder', $this->remainder);

      
    }
}
