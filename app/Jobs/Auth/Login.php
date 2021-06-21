<?php

namespace App\Jobs\Auth;

use App\Jobs\Job;
use Auth;
use Illuminate\Contracts\Bus\SelfHandling;

class Login extends Job implements SelfHandling
{
    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $auth = Auth::attempt([
            'email' => $data['user_email'],
            'password' => $data['user_password'],
        ]);

        return Auth::attempt([
            'email' => $data['user_email'],
            'password' => $data['user_password'],
        ]);
    }
}
