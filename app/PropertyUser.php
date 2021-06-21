<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyUser extends Model
{
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    protected $table = 'property_user';
    protected $fillable = [
        'property_id',
        'user_id',
        'sharables',
        'listings',
    ];
}
