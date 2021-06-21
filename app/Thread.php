<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
    protected $fillable = [
        'from_id',
        'to_id',
        'user_id',
        'subject',
        'pair_id',
        'ownership',
        'is_unread'
    ];

    public function from()
    {
        return $this->belongsTo('App\User', 'from_id', 'id');
    }

    public function to()
    {
        return $this->belongsTo('App\User', 'to_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply')->orderBy('created_at', 'asc');
    }
    public function property() {

        return $this->belongsTo('App\Property');
    }
    public function getMsgSubject($id){
        return Thread::where('to_id','=',$id)->pluck('subject');
    }
}
