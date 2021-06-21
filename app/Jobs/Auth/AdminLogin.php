<?php

namespace App\Jobs\Auth;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Admin;
class AdminLogin extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        dd($this->data);
//        return $admin->all();
        $data = $this->data;

        return Auth::attempt([
            'email' => $data['user_email'],
            'password' => $data['user_password'],
        ]);
    }
}
