<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe_Log extends Model
{
    protected $table = 'subscribe_log';

    protected $fillable = [
        'user_id',
        'subscription_id',
        'subscription_name',
        'remaining_days',
        'total_payment',
        'balance',
        'listings',
        'requirements',
        'affiliates',
        'group_subs',
        'expires_at'
    ];
    protected $dates = [

        'expires_at'
    ];

}
