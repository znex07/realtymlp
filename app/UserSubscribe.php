<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscribe extends Model
{
    protected $table = 'user_subscribe';

    protected $fillable = [
        'name',
        'user_code',
        'price',
        'user_id',
        'listings',
        'requirements',
        'affiliates',
    ];
}
