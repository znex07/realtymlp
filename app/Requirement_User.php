<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement_User extends Model
{
    protected $table = 'requirement_user';
    protected $fillable = [
        'user_id',
        'requirement_id'
    ];
}
