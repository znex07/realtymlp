<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    //

    protected $table = 'projects_picture';
    protected $fillable = [
        'type',
        'branch_code',
        'units_code',
        'img_path',
        'status'
    ];
}
