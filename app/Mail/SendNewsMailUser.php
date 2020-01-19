<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsMailUser extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $newNewsletter;

    /**
     * Create a new message instance.
     *
     * @param $newNewsletter
     */
    public function __construct($newNewsletter)
    {
        $this->newNewsletter =$newNewsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('خبرنامه' . ' ' .config('app.name'))->markdown('emails.new-mail-user', ['newNewsletter' => $this->newNewsletter]);
    }
}
