<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactRequest extends Mailable
{

    use Queueable, SerializesModels;

    public $message;
    public $name;
    public $phone;
    public $adminname;
    public $mailfrom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $message,
        $name,
        $phone,
        $adminname,
        $mailfrom
    ) {
        $this->message = $message;
        $this->name = $name;
        $this->phone = $phone;
        $this->adminname = $adminname;
        $this->mailfrom = $mailfrom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailfrom)->markdown('emails.contact-request');
    }
}
