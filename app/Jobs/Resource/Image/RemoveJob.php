<?php

namespace App\Jobs\Resource\Image;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\FilePic;
use App\Property;

use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class RemoveJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(FilePic $file)
    {
        $data = $this->data;
        try {
            $file = $file->findOrFail(isset($data['file_id']) ? $data['file_id'] : 0);

            if ($file->status == 1 && $file->file_type == 1) {
                $property = Property::with(['files'])->findOrFail($data['property_id']);
                $_file = $property->images()->first();
                $this->update($_file);
            }

            $file = $file->delete();
            return $file;
        } 
        catch(ModelNotFoundException $e) {
            return null;
        }
    }

    public function update($file)
    {
        $file->status = 1;
        $file->save();
    }
}
