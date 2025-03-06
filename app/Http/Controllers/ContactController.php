<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Feedback;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }
    public function sendMail(Request $request)
    {
        //validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        //Store the feedback in db
        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
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
