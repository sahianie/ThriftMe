<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Thrift;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public function addRental(Rental $rental)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to add to favourites.');
        }

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

        if (!$user) {
            $favourites = collect();
        } else {

            $rentalFavourites = $user->rentalFavourites()->get()->map(function ($item) {
                $item->favourited_at = $item->pivot->created_at;
                $item->type = 'rental';
                return $item;
            });

            $thriftFavourites = $user->thriftFavourites()->get()->map(function ($item) {
                $item->favourited_at = $item->pivot->created_at;
                $item->type = 'thrift';
                return $item;
            });

            $favourites = $rentalFavourites->merge($thriftFavourites)
                ->sortByDesc('favourited_at')
                ->values();
        }

        return view('Front.Content.Favourite', compact('favourites'));
    }
}
