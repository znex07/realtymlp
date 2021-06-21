<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePic extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'user_id',
        'property_code',
        'file_category',
        'file_type',
        'file_path',
        'orig_name',
        'file_size',
        'mime_type',
        'status',
        'public'
    ];
    public function property()
    {
        $this->belongsTo('App\Property');
    }

    public function scopeImg($query){
        return $query->where('file_type',1);
    }

    public function scopeThumbnail($query)
    {
        return $query->where('status',1);
    }
}
