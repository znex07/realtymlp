<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_User extends Model
{
    //
    protected  $table = 'property_user';
    protected $fillable = [
        'property_id',
        'user_id',
        'sharables',
        'user_fullname',
        'cat_ownership_type',
        'ownership_id'

    ];
    public function cat_ownership_type()
    {
        return $this->hasOne('App\Category', 'category_id', 'ownership_type')
            ->where('code', 6);
    }

}
