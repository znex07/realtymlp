<?php

namespace App\Jobs\Resource\Image;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class GetPropertyImagesJob extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     * 
     * @return void
     */
    public function handle(FilePic $filePic)
    {
        // $propertyImages = $filePic->where('')
    }
}
