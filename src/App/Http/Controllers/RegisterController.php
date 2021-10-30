<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Sparkouttech\UserMultiAuth\App\Helpers\Helper;
use Sparkouttech\UserMultiAuth\App\Requests\RegisterRequest;
use Sparkouttech\UserMultiAuth\App\Repositories\UserRepository;

class RegisterController extends Controller
{
    private $userRepository;
    private $helper;

    public function __construct(UserRepository $userRepository, Helper $helper)
    {
        $this->userRepository = $userRepository;
        $this->helper = $helper;
    }

    public function register(Request $request)
    {
        return view('user-auth::register');
    }

    public function doRegister(RegisterRequest $request)
    {
        $token = $this->helper->encrypt(implode("-",$request->toArray()));
        $request['password']=Hash::make($request['password']);
        $request['_token'] = $token;
        $user = $this->userRepository->create($request->toArray());
        if ($request->expectsJson() == true) {
            return response(['status'=>true,'data'=>$user], 200);
        } else {
            $request->session()->put('user',$user);
            $request->session()->put('userId',$user->id);
            return redirect('/auth/user/login')->with('message','User account created successfully');
        }
    }
}
