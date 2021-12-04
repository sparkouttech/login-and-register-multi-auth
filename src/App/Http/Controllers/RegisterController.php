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
        if(config('user-auth.register_verification') == true && isset($request->email)&&config('user-auth.login_type') == 'email' ){
            dispatch(new VerificationEmailJob($user));
        }else{
            $this->sendSms("+91".$user->phone_number);
        }
        if ($request->expectsJson() == true) {
            return response(['status'=>true,'data'=>$user], 200);
        } else {
            $request->session()->put('user',$user);
            $request->session()->put('userId',$user->id);
            return redirect('/auth/user/login')->with('message','User account created successfully');
        }
    }

    public function verifyUser($id)
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $this->userRepository->updateData($id,['email_verified_at'=> $date]);
       return redirect()->route('userAuth.login.page');
    }

    public function sendSms($phone)
    {
        $receiverNumber =$phone;
        $message = "This is testing from sparkout";
  
        try {
  
            $account_sid = config('user-auth.twilio_sid');
            $auth_token = "c942916bba31b45ed1593908b29a4414";
            $twilio_number = "+15704058916";
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
                Log::info($client);
                Log::info($phone);
                dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}
