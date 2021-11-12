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
    private $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remainder, $template)
    {
        $this->remainder = $remainder;
        $this->template = $template;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('webtech.Expirymail',['remainder'=>$this->remainder,'template'=>$this->template]);
        

      
    }
}
