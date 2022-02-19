<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Sparkouttech\UserMultiAuth\App\Helpers\Helper;
use Sparkouttech\UserMultiAuth\App\Requests\RegisterRequest;
use Sparkouttech\UserMultiAuth\App\Repositories\UserRepository;
use Sparkouttech\UserMultiAuth\App\Jobs\VerificationEmailJob;
use carbon\Carbon;
use Exception;
use Twilio\Rest\Client;
use Log;
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

        if(config('user-auth.register_verification') == true && isset($request->email) && config('user-auth.login_type') == 'email' ){

            dispatch(new VerificationEmailJob($user));

            if ($request->expectsJson() == true) {
                return response(['status'=>true,'data'=>$user], 200);
            } else {
                $user_id= $user->id;

                $request->session()->put('user',$user);
                $request->session()->put('userId',$user_id);

                return redirect('/auth/user/login')->with('message','Please verify your email before login');

            }
        }else if(config('user-auth.register_verification') == true && config('user-auth.login_type') == 'phone' ){
            $otp = $this->sendSms("+91".$user->phone_number);

            if ($request->expectsJson() == true) {
                return response(['status'=>true,'data'=>$user], 200);
            } else {
                $user_id= $user->id;
                $request->session()->put('user',$user);
                $request->session()->put('userId',$user_id);
                return view('user-auth::otp_verify',compact('otp','user_id'));
            }
        }

    }

    public function verifyUser($id)
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $this->userRepository->updateData($id,['email_verified_at'=> $date]);
        return redirect()->route('userAuth.login.page')->with('message','Email verified sucessfully');
    }

    public function sendSms($phone)
    {
        $receiverNumber =$phone;
        $message = "This is testing from sparkout";
        $otp = rand(10000,99999);
        try {

            $account_sid = config('user-auth.twilio_sid');
            $auth_token =config('user-auth.twilio_token');
            $twilio_number = config('user-auth.twilio_from');

            $client = new Client($account_sid, $auth_token);

            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message."your otp is an :".$otp
            ]);

            return $otp;

        } catch (Exception $e) {
            dd("Twillo Error: ". $e->getMessage());
        }
    }
}
