<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
//    protected $table = 'messages';
    protected $fillable = [
    	'message_type',
    	'from_id',
    	'to_id',
    	'from_name',
    	'property_id',
    	'email_address',
    	'mobile_no',
    	'message'
    ];


    public function property() {

        return $this->belongsTo('App\Property');
    }
	public function to(){
		return $this->belongsTo('App\User','to_id','id');
	}
}
