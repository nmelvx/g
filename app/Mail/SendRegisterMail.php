<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'support@gardinero.ro';
        $name = 'Echipa Gardinero.ro';
        $subject = 'Inregistrare gardinero.ro';

        return $this->view('emails.register')->with(['email' => $this->user->email, 'password' => $this->user->visible_password])
            ->from($address, $name)
            ->subject($subject);
    }
}
