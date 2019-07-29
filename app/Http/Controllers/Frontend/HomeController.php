<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Price1;
use App\Models\Price2;
use App\Models\Product;

class HomeController extends Controller
{
    private static $itemsPerPage = 50;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth.frontend');
    }
    public function test($slug, $id)
    {
        $cate = Category::find(20);
        dd($slug, $id);
        return 'xxx';
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.v2.home');
        // get product new
        $newProducts = Product::whereIsNew(1)->paginate(self::$itemsPerPage);

        // get product hot
        $hotProducts = Product::whereIsHot(1)->paginate(self::$itemsPerPage);

        // get product discount
        $discountProducts = Product::whereIsDiscount(1)->paginate(self::$itemsPerPage);
        return view('frontend.v1.home', [
            'newProducts' => $newProducts,
            'hotProducts' => $hotProducts,
            'discountProducts' => $discountProducts,
        ]);
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
    public function shopLocator()
    {
        return view('frontend.v1.shop-locator');
    }
}
