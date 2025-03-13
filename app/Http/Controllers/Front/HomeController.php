<?php

namespace App\Http\Controllers\Front;
use App\Models\Rental;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Rental::orderBy('created_at', 'desc')->take(5)->get(); // Latest 5 posts
        return view('Front.Content.content',compact( 'products'));
    }
}
