<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Thrift;
use App\Models\Book;
use App\Models\Sold;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalRentals = Rental::count();
        $totalThrifts = Thrift::count();
        $totalBookOrders = Book::count();
        $totalSoldOrders = Sold::count();

        return view('Admin.Content.content', compact('totalRentals', 'totalThrifts', 'totalBookOrders', 'totalSoldOrders'));
    }

    public function notification()
{
    $notifications = auth()->user()->notifications; 
    return view('Admin.Order.notification', compact('notifications'));
}

public function markAsRead($id)
{
   /** @var \App\Models\User $user */
$user = auth()->user();

if ($user) {
    $notification = $user->notifications()->find($id);
}

    if ($notification) {
        $notification->markAsRead();
    }
    return back();
}


}
