<?php

namespace Sparkouttech\UserMultiAuth\App\Repositories;

use Sparkouttech\UserMultiAuth\App\Models\Referral;

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
