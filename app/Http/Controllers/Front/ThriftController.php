<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Thrift;
use App\Models\Sold;
use App\Models\User;
use App\Notifications\NewSoldNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThriftController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'thrifted')->get();
        $products = Thrift::all();
        return view('Front.Content.Thrifted.ThriftPost', compact('categories', 'products'));
    }

    public function FilterByCategory($category_id)
    {
        $categories = Category::where('category_type', 'thrift')->get();
        $products = Thrift::where('category_id', $category_id)->get();
        return view('Front.Content.Thrifted.ThriftByCategory', compact('categories', 'products'));
    }

    public function ThriftDetail($thrift_id)
    {
        $thrift = Thrift::find($thrift_id);

        if (!$thrift) {
            return redirect()->back()->with('error', 'Thrift item not found.');
        }

        return view('Front.Content.Thrifted.DetailPage', compact('thrift'));
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

        return view('Front.Content.Thrifted.ThriftOrder', compact('thrift'));
    }

    public function storeThriftOrder(Request $request)
    {
        // ✅ Validate fields
        $validatedData = $request->validate([
            'username' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'address'  => 'required|string|min:10|max:255',
            'contact' => 'required|string|regex:/^\+?[0-9\s\-]+$/|min:7|max:20',

        ]);

        $thrift = Thrift::find($request->thrift_id);

        if (!$thrift) {
            return redirect()->back()->with('error', 'Thrift item not found.');
        }

        // 💾 Step 3: Save sold record
        $sold = Sold::create([
            'user_id'      => auth()->id(),
            'thrift_id'    => $thrift->id,
            'username'     => $validatedData['username'],
            'address'      => $validatedData['address'],
            'contact'      => $validatedData['contact'],
            'total_amount' => $thrift->price ?? 0, // Ya kisi aur amount logic se
        ]);

        // 🔔 Step 4: Notify admin
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewSoldNotification($sold));
        }

        // ✅ Step 5: Return with success
        return redirect()->back()->with('success', 'Thrift order placed successfully!');
    }
}
