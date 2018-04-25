<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    private $description;
    private $userEmail;
    private $username;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($description,$userEmail,$username)
    {
        $this->description = $description;
        $this->userEmail = $userEmail;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.mail',['description'=>$this->description,
    'userEmail'=>$this->userEmail,
  'username'=>$this->username]);
    }
}
