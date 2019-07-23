<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public static $itemsPerPage = 50;
    /**
     * get item by search key word
     */
    public function getSearchResult(Request $req){
        // request model
        $input = $req->all();
        // result by key
        $products = Product::where('name','LIKE','%'.$input['kiot-search'].'%')->paginate(self::$itemsPerPage);
        // total count of product
        $productCount = count(Product::where('full_name','LIKE','%'.$input['kiot-search'].'%')->get());
        // return view
        return view('frontend.v1.product.category',[
            'products' => $products,
            'productCount' => $productCount
        ]);
    }
  
    /**
     * get list product have name like search hint
     */
    public function getSearchHint(Request $req){
    // return list of product have name like key word
    return Product::where('name', 'LIKE', '%'.$req->q.'%')->get();

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
