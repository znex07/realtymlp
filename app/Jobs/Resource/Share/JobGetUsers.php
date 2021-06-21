<?php

namespace App\Jobs\Resource\Share;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;

class JobGetUsers extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function handle(User $user)
    {
        $data = $this->data;
        $users = $user->whereRaw('not id = '.auth()->user()->id.' and user_fname like "%'.$data['value'].'%" or user_lname like "%'.$data['value'].'%" or email like "%'.$data['value'].'%"')->select('id','email','user_lname','user_fname')->get();
        
        return json_encode($users);
    }
}
