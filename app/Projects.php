<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //

    protected $table = 'projects';
    protected  $fillable = [
        // 'developer_id',
        // 'project_code',
        // 'name',
        // 'type',
        // 'municipality',
        // 'description',
        // 'sub_description'
        'developer_code',
        'project_code',
        'project_name',
        'property_classification',
        'project_description',
        'whats',
        'building_amenities',
        'facilities_services',
        'commercial_area',
        'project_availability',
        'province',
        'city',
        'street_address',
        'brgy',
        'geopolitical_location',
        'google_lat',
        'google_lng',
        'marker_type',
        'full_location',
        'slug_name'
    ];
    public function developer()
    {
        return $this->belongsTo('App\Developers', 'developer_code', 'developer_code');
    }

    public function units()
    {
        return $this->hasMany('App\Units','project_code','project_code');
    }

    public function images()
    {
        return $this->hasMany('App\FileFeatured','project_code','project_code');
    }

    public function pictures()
    {
      return $this->images()->where('type', 1)
                ->orderBy('thumbnail','DESC')
                ->get();
    }

    public function thumbnail()
    {
      return $this->images()->where('image_type', 8)->first();
    }
}
