<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::query()->orderBy('created_at', 'ASC')->limit(10)->get();
        $reservations = Reservation::query()->orderBy('date', 'ASC')->limit(10)->get();
        $orderCount = Order::query()->count();
        $reservationCount = Reservation::query()->count();
        $productCount = Product::query()->count();
        $contactCount = Contact::query()->count();

        return view('admin.home', compact('orders', 'reservations', 'orderCount', 'reservationCount','productCount', 'contactCount'));
    }
}
