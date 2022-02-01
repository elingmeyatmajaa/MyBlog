<?php

namespace App\Http\Controllers;

use App\Mail\Test;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function create()
    {
        return view('contact');
    }

    public function store()
    {
        Contact::create(request()->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required',
            "subject" => 'nullable|min:5|max:50',
            "message" => 'required|min:5|max:500',
        ]));

        Mail::to("eling.atma@gmail.com")->send(new Test("eling"));

        return redirect()->route('contact.create')->with('success', 'Your Message has been sent');
    }
}
