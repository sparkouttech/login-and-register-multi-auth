<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Sparkouttech\UserMultiAuth\App\Requests\LoginRequest;
use Sparkouttech\UserMultiAuth\App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $userRepository;
    private $config;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->config = config('user-auth');
    }

    public function login(Request $request)
    {
        return view('user-auth::login');
    }

    public function mobileLogin(Request $request)
    {
        return view('user-auth::mobile_login');
    }

    /**
     * @param LoginRequest $request
     */
    public function doLogin(LoginRequest $request)
    {
        if($request->email){
            $credentials = $request->only('email', 'password');
        }
        if($request->phone_number){
            $credentials = $request->only('phone_number', 'password');
        }

           if (Auth::attempt($credentials)) {

            $userDetails = Auth::user();
            if(config('user-auth.register_verification') == true &&  $userDetails->email_verified_at != null){
                // Authentication passed...
                if ($request->expectsJson() == true) {
                    return response()->json(['status'=>true,'message'=>'Login success','data'=>Auth::user()]);
                } else {
                    $request->session()->put('user',Auth::user());
                    $request->session()->put('token',Auth::id());
                    return redirect('/home')->with('message','Login success');
                }
            }else{
                // Authentication passed...
                if ($request->expectsJson() == true) {
                    return response()->json(['status'=>false,'message'=>'Login Unsuccessfull']);
                } else {
                    $id=Auth::id();
                    return view('user-auth::verify-email',compact('id'));
                }
            }

        } else {
            if ($request->expectsJson() == true) {
                return response()->json(['status'=>false,'message'=>'Login failed','data'=>(object)[]]);
            } else {
                Session::flash('error', 'Invalid credentials');
                return back();
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/auth/user/login');
    }
}
