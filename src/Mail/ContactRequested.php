<?php

namespace Laraflash\Website\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequested extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;
    public $name;
    public $email;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->withSwiftMessage(function (\Swift_Message $message) {
            $message->getHeaders()->addTextHeader('tag', 'Contact Request');
        });

        [$name, $email, $subject, $message] = [$this->name, $this->email, $this->subject, $this->message];

        return $this->from('system@laraflash.com')
                        ->subject($subject)
                        ->replyTo($email, $name)
                        ->html($message);
    }
}
