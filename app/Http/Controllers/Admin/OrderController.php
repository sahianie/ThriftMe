<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Sold;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function rentalOrders()
    {
        $orders = Book::all();
        return view('Admin.Order.book', compact('orders'));
    }

    public function thriftOrders()
    {
        $soldItems = Sold::all();
        return view('Admin.Order.sold', compact('soldItems'));
    }


    public function notification()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();
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

    public function rentaldestroy($id)
    {
        $order = Book::findOrFail($id);

        DB::table('notifications')
            ->where('data->booking_id', $order->id)
            ->delete();

        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully!');
    }

    public function thriftdestroy($id)
    {
        $sold = Sold::findOrFail($id);

        DB::table('notifications')
            ->where('data->sold_id', $sold->id)
            ->delete();

        $sold->delete();

        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
}
