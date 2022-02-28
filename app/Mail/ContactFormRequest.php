<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $help;
    public $how;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactForm)
    {
        $this->firstname = $contactForm->input('first-name');
        $this->lastname = $contactForm->input('last-name');
        $this->email = $contactForm->input('email');
        $this->phone = $contactForm->input('phone');
        $this->help = $contactForm->input('how-can-we-help');
        $this->how = $contactForm->input('how-did-you-hear-about-us');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactform')
            ->with([
                $this->firstname,
                $this->lastname,
                $this->email,
                $this->phone,
                $this->help,
                $this->how
            ]);
    }
}
