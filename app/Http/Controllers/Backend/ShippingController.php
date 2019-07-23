<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FreeShip;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ngoaitinh = FreeShip::whereLocation(0)->first();
        $noithanh = FreeShip::whereLocation(2)->first();
        $ngoaithanh = FreeShip::whereLocation(3)->first();
        /*$data = file_get_contents(public_path('frontend/json/addressBundle.json'));
        dd($data);*/

        return view('backend.v1.shipping.index', [
            'ngoaitinh'  => $ngoaitinh,
            'noithanh'   => $noithanh,
            'ngoaithanh' => $ngoaithanh
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.shipping.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngoaitinh = FreeShip::whereLocation(0)->first();
        $ngoaitinh->min_fee = $request->input('tong-hoa-don-ngoai-tinh');
        $ngoaitinh->price = $request->input('gia-ship-ngoai-tinh');
        $ngoaitinh->save();

        $noithanh = FreeShip::whereLocation(2)->first();
        $noithanh->min_fee = $request->input('tong-hoa-don-noi-thanh');
        $noithanh->price = $request->input('gia-ship-noi-thanh');
        $noithanh->save();

        $ngoaithanh = FreeShip::whereLocation(3)->first();
        $ngoaithanh->min_fee = $request->input('tong-hoa-don-ngoai-thanh');
        $ngoaithanh->price = $request->input('gia-ship-ngoai-thanh');
        $ngoaithanh->save();

        @file_put_contents(public_path('frontend/json/addressBundle.json'), $request->jsondata);
        return back()->with('success', 'Lưu thành công!');
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

    public function updateJson(){

        return response()->json(['status'=>200]);
    }
}
