<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    //

    protected $table = 'subscription';
    protected $fillable = [
    	'name',
    	'price',
    	'lifespan',
    	'listings',
    	'requirements',
    	'affiliates',
    	'shared_to_me',
    	'no_img',
    	'no_att',
    	'size_img',
    	'size_att',
    	'single_msg',
    	'group_msg',
    	'library',
    	'group',
    	'auto_matching'
    ];

}
