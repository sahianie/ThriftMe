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

    public function  store (Request $request)
    {
        $request->validate(
            [
                "name"=> 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
                'email' => 'required|string|unique:users|max:255|email|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
                'password' => 'required|min:6|confirmed|string',
                'password_confirmation' =>'required|string|min:6'
                ]
            );
       $dataEntered= User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password" => Hash::make($request->password)
        ]);
       // dd( $dataEntered);
        if($dataEntered==null)
        {
           return redirect()->back();
        }
        else
        {
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
            if(Auth::attempt($credentials))
            {
                if ( Auth::user()->role=='admin')
                {

                        return redirect()->route('admin.dashboard');
                }

              else
                {
                    return redirect()->route('home');
                }

            }
            else
            {
                return redirect()->back()->with('error', "Invalid Credentials");
            }

    }

    public function logout()
    {
        Auth::logout();
        return view('Front.User.Login');
    }
}
