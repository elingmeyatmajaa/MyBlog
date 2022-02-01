<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
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

        $data = array();
        $data['name'] = "Eling";
        return response()->json($data);

        $attributes = request()->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required',
            "subject" => 'nullable|min:5|max:50',
            "message" => 'required|min:5|max:500',
        ]);

        Contact::create($attributes);

        Mail::to("eling.atma@gmail.com")->send(new ContactMail(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['email'],
            $attributes['subject'],
            $attributes['message'],
        ));

        return redirect()->route('contact.create')->with('success', 'Your Message has been sent');
    }
}