<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Front.User.Login');
    }

    public function ShowRegistration()
    {
        return view('Front.User.Signup');
    }
}
