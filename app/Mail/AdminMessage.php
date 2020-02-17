<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $body;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $name)
    {
        $this->body = $body;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')->with($this->body, $this->name);
    }
}
