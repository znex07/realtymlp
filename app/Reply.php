<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'from_id',
        'to_id',
        'user_id',
        'thread_id',
        'message',
    ];
    public function from()
    {
        return $this->belongsTo('App\User', 'from_id', 'id');
    }
    public function to()
    {
        return $this->belongsTo('App\User', 'to_id', 'id');
    }

//    public function replies()
//    {
//        return $this->hasMany('App\Reply')->orderBy('created_at', 'asc');
//    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

}
