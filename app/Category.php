<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected  $fillable = [
        'code',
        'category_id',
        'title',
        'description'
    ];

    public function scopeConditions($query)
    {
      return $query->where('code',4);
    }

    public function scopeAvailabilities($query)
    {
      return $query->where('code',5);
    }

    public function scopeOwnerships($query)
    {
      return $query->where('code',6);
    }
}
