<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FreeShip;

class ShipFeeController extends Controller {

    public function getFee(Request $req) {
        $input = $req->all();
        $total = (float)str_replace(',', '', $input['total']);
        if($input['province_value'] == '1') {
            $result = FreeShip::whereNotIn('location', [0])->get();
            foreach($result as $item) {
                if (($item->location == '3' && $item->min_fee <= $total)
                    || ($item->location == '2' && $item->min_fee <= $total)) {
                    return 0;
                } else {
                    return $item->price;
                }
            }
        } else {
            $result = FreeShip::whereLocation(0)->first();
            if ($result->min_fee <= $total) {
                return 0;
            } else {
                return $result->price;
            }
        }
    }
}