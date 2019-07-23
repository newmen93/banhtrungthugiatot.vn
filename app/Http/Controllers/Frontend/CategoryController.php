<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    private static $itemsPerPage = 50;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(self::$itemsPerPage);   
        return view('frontend.v1.product.category', [
            'products' => $products,
        ]);     
    }

    public function getCategory($slug) {
        $exploded = explode('-', $slug);
        $id = end($exploded);
        $products = Product::whereCategoryId($id)->paginate(self::$itemsPerPage); 
        return view('frontend.v1.product.category', [
            'products' => $products,
        ]);   
    }

    public function getDiscountProducts() {
        $products = Product::whereIsDiscount(1)->paginate(self::$itemsPerPage);
        return view('frontend.v1.product.category', [
            'products' => $products,
        ]);   
    }

    public function getNewProducts() {
        $products = Product::whereIsNew(1)->paginate(self::$itemsPerPage);
        return view('frontend.v1.product.category', [
            'products' => $products,
        ]);   
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
        //
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
