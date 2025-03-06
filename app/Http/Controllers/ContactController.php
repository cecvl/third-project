<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
        Mail::to('your_email@example.com')->send(new ContactMail($details));
        return back()->with('message', 'Your message has been sent successfully!');
    }
}
