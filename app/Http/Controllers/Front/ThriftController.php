<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Thrift;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThriftController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'thrift')->get();
        $products = Thrift::all();
        return view('Front.Content.Thrifted.ThriftPost', compact('categories', 'products'));
    }

    public function FilterByCategory($category_id)
    {
        $categories = Category::where('category_type', 'thrift')->get();
        $products = Thrift::where('category_id', $category_id)->get();
        return view('Front.Content.Thrift.ThriftByCategory', compact('categories', 'products'));
    }

    public function ThriftDetail($thrift_id)
    {
        $thrift = Thrift::find($thrift_id);

        if (!$thrift) {
            return redirect()->back()->with('error', 'Thrift item not found.');
        }

        return view('Front.Content.Thrift.DetailPage', compact('thrift'));
    }

    public function ThriftOrder($thrift_id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in to place a thrift order.');
        }

        $thrift = Thrift::find($thrift_id);

        if (!$thrift) {
            return redirect()->back()->with('error', 'Thrift item not found.');
        }

        return view('Front.Content.Thrift.ThriftOrder', compact('thrift'));
    }

    public function storeThriftOrder(Request $request)
    {
        // ✅ Validate fields
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'address'  => 'required|string|max:500',
            'contact'  => 'required|string|max:20',
        ]);

        $thrift = Thrift::find($request->thrift_id);

        if (!$thrift) {
            return redirect()->back()->with('error', 'Thrift item not found.');
        }

        // 💾 Store booking
        Book::create([
            'user_id'   => auth()->id(),
            'thrift_id' => $thrift->id,
            'username'  => $validatedData['username'],
            'address'   => $validatedData['address'],
            'contact'   => $validatedData['contact'],
        ]);

        return redirect()->route('thrift.index')->with('success', 'Your order has been placed successfully.');
    }
}
