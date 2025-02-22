<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'thrifted')->get();
        return view('Front.Content.Buy', compact('categories'));
    }
}
