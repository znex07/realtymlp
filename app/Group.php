<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
      'user_id',
      'group_title',
      'group_description',
      'public',
    ];

    public function moderator()
    {
      return $this->belongsTo('App\User','user_id');
    }

    public function members()
    {
      return $this->belongsToMany('App\User', 'group_user','group_id', 'user_id')
                  ->withTimestamps();
    }

    public function properties()
    {
      return $this->belongsToMany('App\Property')
                  ->withPivot('sharables')
                  ->withTimestamps();
    }


}
