<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\FilePic;
use App\Property;
class ThumbnailJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(FilePic $file)
    {
        $data = $this->data;
        $property = $data['property'];
        $index = $data['thumbnail_index'];
        // $property = $property->with(['files']);
        $this->resetThumbnail($property->images);
        $image = $property->images->get($index);
        if ($image) {
            $image->status = 1;
            $image->save();
            return $image;
        }        
    }

    private function resetThumbnail($files)
    {
        foreach ($files as $file) {
            $file->status = 0;
            $file->save();
        }
    }
}
