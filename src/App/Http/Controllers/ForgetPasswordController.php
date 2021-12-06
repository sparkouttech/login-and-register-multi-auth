<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Sparkouttech\UserMultiAuth\App\Jobs\ForgetPasswordEmailJob;
use Sparkouttech\UserMultiAuth\App\Requests\CheckEmailRequest;
use Sparkouttech\UserMultiAuth\App\Requests\SetPasswordRequest;
use Sparkouttech\UserMultiAuth\App\Repositories\UserRepository;

class ForgetPasswordController extends Controller
{

    private $userRepository;

    /**
     * ForgetPasswordController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function forgetPasswordPage(Request  $request)
    {

        return view('user-auth::forget-password');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function verifyPassword($id)
    {
        return view('user-auth::reset-password',compact('id'));
    }

    /**
     * @param CheckEmailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkEmail(CheckEmailRequest $request){
        $userExist = $this->userRepository->findOne('email',$request->email);
        if($userExist){
            dispatch(new ForgetPasswordEmailJob($userExist));

            Session::flash('message','Password reset link has been sent to your email');
            return back()->with('message','Password reset link has been sent to your email');
        }else{
            return back()->with('error','Entered email not match with any account');
        }
    }

    /**
     * @param SetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setPassword(SetPasswordRequest $request)
    {
        $password = Hash::make($request->password);
        $this->userRepository->updateData($request->id, ['password' => $password]);
        return redirect()->route('userAuth.login.page');
    }
}
