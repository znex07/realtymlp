<?php

namespace App\Jobs\Group;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Group;
use App\User;
class CreateGroup extends Job implements SelfHandling
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle(Group $group, User $user)
    {
        
        $data = $this->request->all();
        $data['user_ids'] = $data['user_id'];
        $data['user_id'] = $data['owner_id'];
        $group = Group::create($data);
        
        $group->members()->attach([$data['user_id']=>[]]);
        
        foreach($data['user_ids'] as $id) {
            $group->members()->attach([
                $id => []
            ]);
        }
        return $group;
    }
}
