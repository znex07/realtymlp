<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Elasticquent\ElasticquentTrait;
class Location extends Model
{
    // use ElasticquentTrait;
    //
    protected $fillable = [
    	'id',
        'type',
        'parent_id',
        'name',
        'desc'
    ];


}
