<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Sold;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Rental orders (Book model)
    public function rentalOrders()
    {
        $orders = Book::all(); // Sab rental orders
        return view('Admin.Order.book', compact('orders'));
    }

    // Thrift orders (Sold model)
    public function thriftOrders()
    {
        $soldItems = Sold::all(); // Sab thrift orders
        return view('Admin.Order.sold', compact('soldItems'));
    }

    public function rentaldestroy($id)
{
    $order = Book::findOrFail($id);
    $order->delete();

    return redirect()->back()->with('success', 'Order deleted successfully!');
}

public function thriftdestroy($id)
{
    $sold = Sold::findOrFail($id);
    $sold->delete();

    return redirect()->back()->with('success', 'Sold item deleted successfully!');
}

}
