<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class AuthController extends Controller
{
	protected $password = 'daika';
    protected $redirectTo = '/';
    protected $guard = 'user';

    public function __construct()
    {
    	$this->middleware('auth.frontend')->only('logout');
    }

    public function registerForm()
    {
        return view('frontend.v1.auth.register');
    }

    public function register(Request $request)
    {
    	$this->validate($request,[
    		'name'    => 'required|max:255',
    		'email'   => 'required|email|unique:users',
    		'password'=> 'required|between:6,25', //|confirmed
    	   ], [
            'name.required' => 'Nhập tên',
            'password.between'=> 'Mật khẩu từ 6-25 kí tự',
            'email.required'   => 'Nhập email',
            'password.required' => 'Nhập mật khẩu',
           ]
        );

    	$user           = new User($request->all());
    	$user->password = bcrypt($request->password);
    	$user->save();
        //link this user to a new customer
        $customer          = new Customer();
        $customer->name    = $request->name;
        $customer->user_id = $user->id;
        $customer->email   = $request->email;
        $customer->password= $request->password;
        $customer->save();
        return back()->with('success', 'Đăng kí thành công!');
    }

    public function loginForm()
    {
    	return view('frontend.v1.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:3'
        ]);

    	$remember = $request->get('remember');

        if($request->password === $this->password && $user = User::where('email', $request->email)->first()) {
            Auth::guard('web')->loginUsingId($user->id, true);
            return redirect('/trang-chu');
        }

    	if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->intended('/trang-chu');
    	}

        return back()->with(['message' => 'Email hoặc mật khẩu không hợp lệ.']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

    	return redirect('/dang-nhap');
    }
}
