<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->take(10)->get(); // last 10 feedbacks la rahe hain
        return view('Front.Content.Feedback', compact('feedbacks'));
    }

    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|min:2|max:30|regex:/^[A-Za-z\s]+$/',
        'last_name'  => 'nullable|string|min:2|max:30|regex:/^[A-Za-z\s]+$/',
        'subject'    => 'nullable|string|min:3|max:100',
        'message'    => 'required|string|min:5|max:500',
    ]);

      // Store the feedback data in the database
      Feedback::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

     // Redirect or show success message
     return redirect()->route('feedback')->with('success', 'Feedback submitted successfully!');
    }


}
