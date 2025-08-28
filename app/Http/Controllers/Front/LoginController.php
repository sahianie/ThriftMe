<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginpage()
    {
        return view('Front.User.Login');
    }

    public function ShowRegistration()
    {
        return view('Front.User.Signup');
    }

    public function  store(Request $request)
    {
        $request->validate([
    'name' => 'required|string|min:3|max:50|regex:/^(?!\s)[a-zA-Z]+(?:\s[a-zA-Z]+)*(?<!\s)$/u',
    'email' => 'required|string|unique:users|max:255|email|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
    'password' => 'required|string|min:4|max:10|confirmed|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/',
    'password_confirmation' => 'required|string|min:4|max:10',
], [
    // Name field errors
    'name.required' => 'Name is required.',
    'name.string' => 'Name must be text only.',
    'name.min' => 'Name must be at least 3 characters.',
    'name.max' => 'Name must not be more than 50 characters.',
    'name.regex' => 'Name only contain letters and spaces.',

    // Email field errors
    'email.required' => 'Email is required.',
    'email.string' => 'Email must be valid text.',
    'email.unique' => 'This email is already registered.',
    'email.max' => 'Email must not be more than 255 characters.',
    'email.email' => 'Please enter a valid email format.',
    'email.regex' => 'Email format is invalid.',

    // Password field errors
    'password.required' => 'Password is required.',
    'password.string' => 'Password must be valid text.',
    'password.min' => 'Password must be at least 4 characters.',
    'password.max' => 'Password must not be more than 10 characters.',
    'password.confirmed' => 'Password confirmation does not match.',
    'password.regex' => 'Password format not correct.',

    // Password confirmation errors
    'password_confirmation.required' => 'Please confirm your password.',
    'password_confirmation.string' => 'Password confirmation must be valid text.',
    'password_confirmation.min' => 'Password confirmation must be at least 4 characters.',
    'password_confirmation.max' => 'Password confirmation must not be more than 10 characters.',
]);

        $dataEntered = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        
        if ($dataEntered == null) {
            return redirect()->back();
        } else {
            return view('Front.User.Login');
        }
    }

    public function login(Request $request)
    {

        $credentials = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ]
        );
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', "Invalid Credentials");
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('Front.User.Login');
    }
}
