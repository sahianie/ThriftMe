<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Rental;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'rental')->get();
        // dd($categories);
        $products = Rental::all();
        return view('Front.Content.Rental.RentalPosts', compact('categories', 'products'));
    }

    public function Filterbycategory($category_id)
    {
        $categories = Category::where('category_type', 'rental')->get();
        $products = Rental::where('category_id', $category_id)->get();
        return view('Front.Content.Rental.RentalByCategory', compact('categories', 'products'));
    }

    public function Rentaldetail($rental_id)
 {
    // Fetch rental post by ID
    $rental = Rental::find($rental_id);

    // Check if rental exists
    if (!$rental) {
        return redirect()->back()->with('error', 'Rental not found.');
    }

    // Pass data to the view
    return view('Front.Content.Rental.DetailPage', compact('rental'));
 }

 public function Rentalorder($rental_id)
 {
    $rental = Rental::all();
    return view('Front.Content.Rental.RentalOrder',compact('rental'));
 }

}
