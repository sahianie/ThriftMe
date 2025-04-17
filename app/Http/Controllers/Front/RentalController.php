<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotification;
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
    // Check if user is logged in
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to log in to place a rental order.');
    }

    // Fetch rental post by ID
    $rental = Rental::where('id', $rental_id)->first();

    // Pass data to the view
    return view('Front.Content.Rental.RentalOrder', compact('rental'));
}


public function storeRentalOrder(Request $request)
{
    // 📋 Step 1: Validate the incoming request
    $validatedData = $request->validate([
        'username'   => 'required|string|max:255',
        'address'    => 'required|string|max:500',
        'start_date' => 'required|date',
        'end_date'   => 'required|date|after_or_equal:start_date',
        'total_days' => 'required|integer|min:1',
        'contact'    => 'required|string|max:20',
    ]);

    // 🏠 Step 2: Fetch the rental
    $rental = Rental::find($request->rental_id);
    if (!$rental) {
        return redirect()->back()->with('error', 'Rental item not found.');
    }

    // 💰 Step 3: Calculate total amount
    $total_amount = $validatedData['total_days'] * $rental->rent_per_day;

    // 🗂️ Step 4: Store booking and send mail
    try {
        Book::create([
            'user_id'      => auth()->id(),
            'rental_id'    => $rental->id,
            'username'     => $validatedData['username'],
            'address'      => $validatedData['address'],
            'start_date'   => $validatedData['start_date'],
            'end_date'     => $validatedData['end_date'],
            'total_days'   => $validatedData['total_days'],
            'total_amount' => $total_amount,
            'contact'      => $validatedData['contact'],
        ]);

        // 📩 Step 5: Send email to admin
        $adminEmail = config('mail.admin_email'); // ✅ Recommended way
        Mail::to($adminEmail)->send(new AdminNotification($rental));

        return redirect()->back()->with('success', 'Your rental order has been placed successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}
}
