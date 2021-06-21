<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    //
    protected $table = 'units';
    protected $fillable = [
        // 'project_id',
        // 'project_code',
        // 'unit_code',
        // 'title',
        // 'floor_area',
        // 'baths',
        // 'min_price',
        // 'max_price',
        // 'parking',
        // 'available_at'
        'developer_code',
        'project_code',
        'unit_code',
        'unit_name',
        'unit_codename',
        'property_type',
        'quantity',
        'unit_area',
        'rooms',
        'bathrooms',
        'parkings',
        'project_updated',
        'min_price',
        'max_price'

    ];

    public function project()
    {
        return $this->belongsTo('App\Projects','project_code','project_code');
    }

    public function developer()
    {
        return $this->belongsTo('App\Developers','developer_code','developer_code');
    }

    public function images()
    {
        return $this->hasMany('App\FileFeatured','unit_code','unit_code');
    }

    public function pictures()
    {
      return $this->images()->where('type', 2)
              ->orderBy('thumbnail','DESC')
              ->get();
    }
}
