<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Sparkouttech\UserMultiAuth\App\Jobs\ForgetPasswordEmailJob;
use Sparkouttech\UserMultiAuth\App\Requests\CheckEmailRequest;
use Sparkouttech\UserMultiAuth\App\Requests\SetPasswordRequest;
use Sparkouttech\UserMultiAuth\App\Repositories\UserRepository;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\RegisterController;


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
        if($request->type == 'email'){
            $userExist = $this->userRepository->findOne('email',$request->email);
            if($userExist){
                dispatch(new ForgetPasswordEmailJob($userExist));

                // Session::flash('message','Password reset link has been sent to your email');
                return back()->with('message','Password reset link has been sent to your email');
            }else{
                return back()->with('error','Entered email not match with any account');
            }
        }else{
            $userExist = $this->userRepository->findOne('phone_number',$request->phone);
            if($userExist){
                $user_id = $userExist->id;
                $otp= RegisterController::sendSms($userExist->phone_number);
                // Session::flash('message','Password reset verification code has been sent to your phone');
                return view('user-auth::otp_verify',compact('otp','user_id'));
            }else{
                return back()->with('error','Entered phone number not match with any account');
        }

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
            return redirect()->route('userAuth.login.page')->with('message','Password Changed Sucessfully');
    }

     /**
     * @param otpVerify
     * @return \Illuminate\Http\RedirectResponse
     */
    public function otpVerify(Request $request)
    {
        $this ->validate($request, array(
            'otp_user_value' => 'required',
            'otp_value' => 'required',
        ));
        $userOtp = $request->otp_user_value;
        $otp = $request->otp_value;
        $otpValue = implode("", $otp);
        $id = $request->user_id;
        if($userOtp == $otpValue){
           $user = $this->userRepository->findOne('id',$id);
            if($user->otp_verified == 1){
                return view('user-auth::reset-password',compact('id'))->with('message','Otp Verify Sucessfully');
            }else{
                $user->update([
                    'phone_number_verified_at' => now(),
                    'otp_verified' => 1,
                    ]);
            }
            return redirect()->route('userAuth.login.page')->with('message','Otp Verify Sucessfully');
        }else{
            return back()->with('error','please enter valid otp number');
        }
    }
}
