<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactForm as validation;
use App\Mail\ContactFormRequest;
use Illuminate\Http\Request;
use Mail;

class Contact extends Controller
{
    public function SendContactForm(validation $contactForm) {
        Mail::to('willthedeveloper13@gmail.com')
            ->send(new ContactFormRequest($contactForm));

        return view('contact');
    }
}
