<?php

namespace Sparkouttech\UserAuth\App\Repositories;

use Sparkouttech\UserAuth\App\Models\User;

class UserRepository extends BaseRepository {

    private $user;

    /**
     * User repository constructor
     */
    public function __construct(User $user) {
        parent::__construct($user);
        $this->user = $user;
    }

}
