<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller {

    public function getMemberInfo(Request $req) {

        $member = Customer::whereContactNumber($req->phone_number)->first();
        if(null == $member) {
            $member = new Customer;
            $member->gender = "0";
        }

        return $member;

    }
    public function updateMemberInfo(Request $request, $id)
    {
    	$customer = Customer::find($id);
    	$customer->contac_number = $request->tel;
    	$customer->name = $request->name;
    	$customer->address = $request->address;
    	$customer->gender = $request->gender;
    	$customer->email = $request->email;
    	$customer->save();

    	$user = User::find($customer->user->id);
    	$user->password = Hash::make($request->password);
    	$user->save();
    	
    	return back()->with('success','Cập nhật thành công');
    }
}
