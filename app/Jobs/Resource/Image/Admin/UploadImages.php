<?php

namespace App\Jobs\Resource\Image\Admin;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\FileFeatured;

class UploadImages extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(FileFeatured $file)
    {
        $data = $this->data;
        $destinationPath = 'img/featured_files/';
        $ctr = 0;
        $c = 0;
        $thumbnail = 0;
        if ($data['image_type'] == 8 && $data['type'] == 1)
          $thumbnail = 1;
        elseif ($data['image_type'] == 5 && $data['type'] == 2 && $thumbnail <= 0)
          $thumbnail = 1;
          
        foreach($data['dropzones'] as $f) {
            $ext = $f->getClientOriginalExtension();
            $prefix = isset($data['_unit_code']) ? 'U-' : 'P-';
            $rnd = $prefix . date('Y-m-d-H-i-s') . uniqid();
            $upload_file = $rnd .'.'. $ext;
            $success = $f->move($destinationPath, $upload_file);
            $dta = [
                'project_code' => $data['project_code'],
                'unit_code' => isset($data['_unit_code']) ? $data['_unit_code'] : '',
                'file_path' => $upload_file,
                'orig_name' => $f->getClientOriginalName(),
                'caption' => $data['dropzoneInputs'][$c],
                'image_type' => $data['image_type'],
                'type' => $data['type'],
                'mime_type' => $f->getClientMimeType(),
                'thumbnail' => $thumbnail
            ];
            $file->create($dta);
            $c++;
        }
    }
}
