<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('backend.v1.profile.index');
    }

    public function update(Request $request)
    {
        $rules = [
            'name'   => 'required|max:255',
            'email'  => 'required',
        ];
        $messages = [
            'name:required' => 'Nhập tên',
            'email:required' => 'Nhập email'
        ];
        if( Input::filled('pass')) {
            $rules['pass'] = 'min:6';
            $rules['repass'] = 'same:pass';
            $messages['pass:min'] = 'Mật khẩu ít nhất 6 kí tự';
            $messages['repass:same'] = 'Mật khẩu xác nhận không đúng';
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'messages' => $validator->errors()]);
        }

        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->name = $request->name;
        if(Input::filled('pass')){
            $admin->email = $request->email;
        }
        $admin->password = Hash::make($request->pass);
        $admin->save();
        return response()->json(['status' => 1, 'messages' => 'Cập nhật thành công']);
    }
}
