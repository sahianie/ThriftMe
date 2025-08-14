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
    // Get the latest 10 rentals ordered by creation date descending (newest first)
    $rentals = Rental::orderBy('created_at', 'desc')->take(10)->get();

    // Get the latest 10 thrifts ordered by creation date descending (newest first)
    $thrifts = Thrift::orderBy('created_at', 'desc')->take(10)->get();

    // Combine both collections into one
    $products = $rentals->concat($thrifts);

    // Sort the combined collection by creation date descending (newest first)
    $sortedProducts = $products->sortByDesc('created_at');

    // Take only the latest 10 products from the combined sorted list
    $finalProducts = $sortedProducts->take(10);

    // Pass the final products collection to the view
    return view('Front.Content.content', ['products' => $finalProducts]);
}

    
}
