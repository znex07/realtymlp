<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate_Log extends Model
{
    //
    protected $table = 'affiliate_log';

    protected $fillable = [
    	'user_id',
    	'code',
    	'affiliate_name',
    	'action'
    ];
//	public function geAffiliateNameAttribute()
//	{
//		return ($this->affiliate_name);
//	}
}
