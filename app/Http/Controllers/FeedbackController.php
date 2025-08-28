<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->take(10)->get();
        return view('Front.Content.Feedback', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'last_name'  => 'nullable|string|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'subject'    => 'nullable|string|min:3|max:50|regex:/^[A-Za-z\s]+$/',
            'message'    => 'required|string|min:5|max:255',
        ]);

        Feedback::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('feedback')->with('success', 'Feedback submitted successfully!');
    }
}
