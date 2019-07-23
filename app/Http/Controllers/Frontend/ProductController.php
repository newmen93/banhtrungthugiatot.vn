<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use View;

class ProductController extends Controller
{
    private static $itemsPerPage = 3;    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getDetail($slug) {
        $exploded = explode('-', $slug);
        $id = end($exploded);
        // get details of product
        $product = Product::whereId($id)->first();
        // get hot product
        $hotProducts =  Product::whereIsHot(1)->paginate(self::$itemsPerPage);

        // get related product
        $relatedProducts = Product::whereCategoryId($product->category_id)
                ->where('id','!=', $id)->take(self::$itemsPerPage)->get();

        return view('frontend.v1.product.product-detail', [
            'product' => $product,
            'hotProducts' => $hotProducts,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function getQuickView(Request $req) {
    
        $product = Product::whereId($req->all()['product_id'])->first();
        return  View::make('frontend.v1.product.product-detail-form', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
