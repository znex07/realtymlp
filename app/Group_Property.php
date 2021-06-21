<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_Property extends Model
{
    //
    protected $table = 'group_property';

    protected $fillable = [
        'group_id',
        'property_id',
        'sharables',
    ];
    public function groupname()
    {
        return $this->belongsToMany('App\Group');
    }

}
