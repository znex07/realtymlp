<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //

    protected $table = 'subscription';

    protected $fillable = [
      'name',
      'price',
      'lifespan',
      'uom',
      'listings',
      'affiliates',
      'shared_to_me',
      'no_img',
      'no_att',
      'size_img_mb',
      'size_att_mb',
      'single_msg',
      'group_msg',
      'library',
      'group',
      'auto_matching',
      'status'
    ];
}
