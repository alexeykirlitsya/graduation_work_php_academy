<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $topic;
    protected $message;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($topic, $message, $email)
    {
        $this->topic = $topic;
        $this->message = $message;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_contact')->with([
            'topic' => $this->topic,
            'text' => $this->message,
            'email' => $this->email
        ])->subject('Письмо из блога Вкуснятинка');
    }
}
