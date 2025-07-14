<?php

namespace App\Http\Controllers\Front;
use App\Models\Rental;
use App\Models\Thrift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rentals = Rental::orderBy('created_at', 'desc')->take(5)->get();
        $thrifts = Thrift::orderBy('created_at', 'desc')->take(5)->get();
    
        // Rentals aur Thrifts ko merge kar rahe hain
        $products = $rentals->concat($thrifts);
    
        return view('Front.Content.content', compact('products'));
    }
    
}
