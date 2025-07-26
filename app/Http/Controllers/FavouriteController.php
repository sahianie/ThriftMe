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
       /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $user->rentalFavourites()->syncWithoutDetaching([$rental->id]);
}

        return back()->with('success', 'Added to favourites!');
    }

    public function removeRental(Rental $rental)
    {
       /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $user->rentalFavourites()->detach($rental->id);
}

        return back()->with('success', 'Removed from favourites!');
    }

    public function addThrift(Thrift $thrift)
    {
       /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $user->thriftFavourites()->syncWithoutDetaching([$thrift->id]);
}

        return back()->with('success', 'Added to favourites!');
    }

    public function removeThrift(Thrift $thrift)
    {
      /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $user->thriftFavourites()->detach($thrift->id);
}

        return back()->with('success', 'Removed from favourites!');
    }

    public function index()
    {
       /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $rentalFavourites = $user->rentalFavourites()->latest()->get();
} else {
    $rentalFavourites = collect(); // empty collection if no user logged in
}

       /** @var \App\Models\User $user */
$user = Auth::user();

if ($user) {
    $thriftFavourites = $user->thriftFavourites()->latest()->get();
} else {
    $thriftFavourites = collect(); // empty collection if no user logged in
}


        return view('Front.Content.Favourite', compact('rentalFavourites', 'thriftFavourites'));
    }
}
