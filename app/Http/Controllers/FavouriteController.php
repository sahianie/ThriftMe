<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Thrift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    public function addRental(Rental $rental)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to add to favourites.');
        }
    
        // If user is authenticated, add to favourites
        Auth::user()->rentalFavourites()->syncWithoutDetaching([$rental->id]);
        return back()->with('success', 'Added to favourites!');
    }

    public function removeRental(Rental $rental)
    {
        Auth::user()->rentalFavourites()->detach($rental->id);
        return back()->with('success', 'Removed from favourites!');
    }

    public function addThrift(Thrift $thrift)
    {
        Auth::user()->thriftFavourites()->syncWithoutDetaching([$thrift->id]);
        return back()->with('success', 'Added to favourites!');
    }

    public function removeThrift(Thrift $thrift)
    {
        Auth::user()->thriftFavourites()->detach($thrift->id);
        return back()->with('success', 'Removed from favourites!');
    }

    public function index()
    {
        $rentalFavourites = Auth::user()->rentalFavourites()->latest()->get();
        $thriftFavourites = Auth::user()->thriftFavourites()->latest()->get();

        return view('Front.Content.Favourite', compact('rentalFavourites', 'thriftFavourites'));
    }
}
