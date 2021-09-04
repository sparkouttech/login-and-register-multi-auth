<?php


namespace Sparkouttech\UserAuth\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    use \Sparkouttech\UserAuth\App\Traits\Uuids;

    protected $table = 'referral';

    protected $fillable = [
        'user_id',
        'referred_from',
        'referral_code'
    ];

}
