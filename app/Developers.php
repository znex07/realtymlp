<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    //
    protected $table = 'developers';

    protected $fillable = [
        // 'name',
        // 'contact_no',
        // 'office_address',
        // 'status'
    	'developer_code',
    	'developer_name'
    ];

    public function projects()
    {
        return $this->hasMany('App\Projects','developer_code','developer_code');
    }

    public function units()
    {
        return $this->hasManyThrough('App\Units', 'App\Projects', 'project_code', 'unit_code');
    }
}
