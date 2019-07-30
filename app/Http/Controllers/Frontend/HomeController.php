<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Price1;
use App\Models\Price2;
use App\Modes\Product;

class HomeController extends Controller
{
    private static $itemsPerPage = 50;
    private static $itemsOnHome = 3;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::take(self::$itemsOnHome)->latest();
        $products = Product::whereIsHome(1)->get();
        return view('frontend.v2.home', ['posts' => $posts, 'products' => $products]);
    }

    # page menu navbar
    public function home()
    {
        return view('frontend.v1.home');
    }
    public function about()
    {
        return view('frontend.v2.about');
    }
    public function contact()
    {

        return view('frontend.v2.contact');
    }
    public function price()
    {
        $t1 = Price1::all();
        $t2 = Price2::all();
        return view('frontend.v2.price', ['t1' => $t1, 't2' => $t2]);
    }
    public function post()
    {
        return view('frontend.v2.post.post');
    }
    public function porudct()
    {
        $products = Product::all();
        return view('frontend.v2.product.index', ['products' => $products]);
    }
}
