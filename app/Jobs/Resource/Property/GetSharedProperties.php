<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use App\Property;
class GetSharedProperties extends Job implements SelfHandling
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(User $user)
    {
        $id = $this->id;
        $properties = $user->find($id)->shares()->with(['files','user'])->get();
        return $properties;
    }
}
