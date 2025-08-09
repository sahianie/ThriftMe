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

    
}
