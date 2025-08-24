<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderNotification;
use App\Models\Rental;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 'rental')->get();

        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                $user = Auth::user();
                $rentalFavourites = $user->rentalFavourites; // load kar diya

            }
        }

        // 🔹 Latest rentals first
        $products = Rental::latest()->get(); // equivalent to orderBy('created_at', 'desc')

        return view('Front.Content.Rental.RentalPosts', compact('categories', 'products'));
    }

    public function Filterbycategory($category_id)
    {
        $categories = Category::where('category_type', 'rental')->get();

        // 🔹 Latest rentals first for selected category
        $products = Rental::where('category_id', $category_id)->latest()->get();

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

        // Fetch existing bookings for this rental
        $bookings = Book::where('rental_id', $rental->id)->get(['start_date', 'end_date']);

        // Pass data to the view
        return view('Front.Content.Rental.DetailPage', compact('rental', 'bookings'));
    }


    public function Rentalorder($rental_id)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in to place a rental order.');
        }

        // Fetch rental post by ID
        $rental = Rental::where('id', $rental_id)->first();
        $bookings = Book::where('rental_id', $rental->id)->get(['start_date', 'end_date']);

        // Pass data to the view
        return view('Front.Content.Rental.RentalOrder', compact('rental', 'bookings'));
    }

    public function storeRentalOrder(Request $request)
    {
        // 📋 Step 1: Validate the incoming request
        $validatedData = $request->validate([
            'rental_id'   => 'required|exists:rentals,id',
            'username' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'address'  => 'required|string|min:15|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'total_days'  => 'required|integer|min:1',
            'contact'     => [
                'required',
                'regex:/^0\d{9,10}$/',
            ]
        ], [
            'username.regex' => 'Username should only contain letters and spaces',
            'address.min' =>   'Please enter a proper authentic address.',
            'address.max' =>   'Your address is too long. Please keep it under 255 characters.',
            'contact.regex'    => 'Invalid contact format.',
        ]);

        // 🏠 Step 2: Fetch the rental
        $rental = Rental::find($validatedData['rental_id']);
        if (!$rental) {
            return redirect()->back()->with('error', 'Rental item not found.');
        }

        // 🛑 Step 2.5: Check for date overlaps
        $existingBookings = Book::where('rental_id', $rental->id)
            ->get();

        $newStartDate = Carbon::parse($validatedData['start_date']);
        $newEndDate   = Carbon::parse($validatedData['end_date']);

        foreach ($existingBookings as $booking) {
            $existingStartDate = Carbon::parse($booking->start_date);
            $existingEndDate   = Carbon::parse($booking->end_date);

            if (
                ($newStartDate <= $existingEndDate) &&
                ($newEndDate >= $existingStartDate)
            ) {
                // Dates overlap
                return redirect()->back()->with('error', 'Sorry, selected dates are already booked.')->withInput();
            }
        }

        // 💰 Step 3: Calculate total amount
        $total_amount = $validatedData['total_days'] * $rental->rent_per_day;

        // 🗂️ Step 4: Store booking
        try {
            $booking = Book::create([
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

            // 🔔 Step 5: Notify all admins
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new NewOrderNotification($booking));
            }

            return redirect()->back()->with('success', 'Your rental order has been placed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
