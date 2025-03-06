<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    //Display all feedback
    public function index()
    {
        $feedback = Feedback::latest()->get();

        return view('feedback.index', compact('feedback'));
}
}
