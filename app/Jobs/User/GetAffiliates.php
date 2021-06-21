<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetAffiliates extends Job implements SelfHandling
{
    private $base;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($base)
    {
        $this->base = $base;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = auth()->user();

        $affiliates = $this->getSpecific();

        return [
            'count' => [
                'pending' => $user->pendingAffiliates()->count(),
                'new' => $user->newAffiliates()->count(),
            ],
            'affiliates' => $affiliates,
            'current' => $this->base,
        ];
    }

    private function getSpecific()
    {
        $user = auth()->user();
        switch ($this->base) {
            case 'new':
                return $user->newAffiliates()->paginate();
            case 'index':
                return $user->confirmedAffiliates();
        }
    }
}
