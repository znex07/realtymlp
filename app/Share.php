<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Share extends Model
{
	use SoftDeletes;
    protected $table = 'property_share';
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'property_id',
 	    'user_id',
 	    'sharables'
    ];
}
	