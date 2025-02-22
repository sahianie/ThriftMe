<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'rental')->get();
        // dd($categories);
        return view('Front.Content.Rental', compact('categories'));
    }
}
