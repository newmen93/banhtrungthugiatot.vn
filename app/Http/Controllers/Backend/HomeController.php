<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('backend.v1.home', [
            'order'=>Order::count(),
            'product'=>Product::count(),
            'customer'=>Customer::count(),
            'order'=>Order::count()
        ]);
    }
    public function test()
    {
        return 'xxx';
    }
}
