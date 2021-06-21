<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_Log extends Model
{
    //

    protected $table = 'property_log';
    protected $fillable = [
    	'property_code',
    	'action',
    	'ip_address',
    	'inquirer_type',
    	'user_code',
    	'inquirer_name'
    ];

    public function property() {
        return $this->hasOne('App\Property','property_code','property_code');
    }
}
