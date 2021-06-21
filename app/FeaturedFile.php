<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedFile extends Model
{
    protected $table = 'featured_file';
    protected $fillable = [
        'property_code',
        'file_category',
        'file_path',
        'orig_name',
        'mime_type',
        'status'
    ];
    
    public function units()
    {
    	return $this->belongsTo('App\Units');
    }

    public function projects()
    {
    	return $this->belongsTo('App\Projects');
    }

}
