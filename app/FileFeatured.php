<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileFeatured extends Model
{
    protected $table = 'files_featured';
    protected $fillable = [
        'project_code',
        'unit_code',
        'file_path',
        'orig_name',
        'caption',
        'image_type',
        'type',
        'mime_type',
        'thumbnail'
    ];
}
