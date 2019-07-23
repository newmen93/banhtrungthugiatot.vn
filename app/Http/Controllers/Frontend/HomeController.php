<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $cate  = Category::find(20);
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
        // get product new
        $newProducts = Product::whereIsNew(1)->paginate(self::$itemsPerPage);

        // get product hot
        $hotProducts = Product::whereIsHot(1)->paginate(self::$itemsPerPage);
        
        // get product discount
        $discountProducts = Product::whereIsDiscount(1)->paginate(self::$itemsPerPage);
        return view('frontend.v1.home', [
            'newProducts' => $newProducts,
            'hotProducts' => $hotProducts,
            'discountProducts' => $discountProducts
        ]);
    }

    # page menu navbar
    public function home()
    {
        return view('frontend.v1.home');
    }
    public function about()
    {
        return view('frontend.v1.about');
    }
    public function contact()
    {
        return view('frontend.v1.contact');
    }
    public function shopLocator()
    {
        return view('frontend.v1.shop-locator');
    }
}
