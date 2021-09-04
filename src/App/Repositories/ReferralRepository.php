<?php

namespace Sparkouttech\UserAuth\App\Repositories;

use Sparkouttech\UserAuth\App\Models\Referral;

class ReferralRepository extends BaseRepository {

    private $referral;

    /**
     * User repository constructor
     */
    public function __construct(Referral $referral) {
        parent::__construct($referral);
        $this->referral = $referral;
    }

}
