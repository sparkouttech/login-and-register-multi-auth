<?php

namespace Sparkouttech\UserMultiAuth\App\Listeners;

use Sparkouttech\UserMultiAuth\App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Sparkouttech\UserMultiAuth\App\Repositories\ReferralRepository;

class ReferralNewUserListener implements ShouldQueue
{
    private $referralRepository;
    private $config;

    public function __construct(ReferralRepository $referralRepository) {
        $this->referralRepository = $referralRepository;
        $this->config = config('user-auth');
    }

    public function generateReferralCode()
    {

        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        do {
            $referralCode = substr(str_shuffle($str_result), 0, $this->config['referral_code_length']);
        } while ($this->referralRepository->findOne('referral_code',$referralCode) != null);
        return $referralCode;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($this->config['referral'] == true) {
            if (isset($event->request['referral_code'])) {
                // referral code exists
                $referredUser = $this->referralRepository->findOne('referral_code',$event->request['referral_code']);
                $event->request['referred_from'] = $referredUser->id;
            }
            $event->request['user_id'] = $event->user->id;
            $event->request['referral_code'] = strtoupper($this->generateReferralCode());
            $this->referralRepository->create($event->request);
        }
    }
}
