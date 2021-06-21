<?php

namespace App\Jobs\Resource\Image;

use App\FilePic;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class UploadImage extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function handle(FilePic $filePic)
    {
        $data = $this->data;
        $ctr = 0;
        // return $data;
        $destinationPath = 'uploads/';
        $user_id = $data['user_id'];
        $property_code = $data['property_code'];
        $up = null;
        foreach($data['attcImage'] as $f){
            $status = 0;
            if ($ctr == $data['thumbnail_index'] && $data['_type'] == 'create')
                $status = 1;

            $ext = $f->getClientOriginalExtension();
            $rnd = date('Y-m-d-H-i-s') . uniqid();
            $upload_file = $rnd .'.'. $ext;
            $success = $f->move($destinationPath, $upload_file);
            $file = [
                'user_id'=>$user_id,
                'property_code'=>$property_code,
                'file_category'=>1,
                'file_type'=>1,
                'file_path'=>$upload_file,
                'orig_name'=>$f->getClientOriginalName(),
                'file_size'=>$f->getClientSize(),
                'mime_type'=>$f->getClientMimeType(),
                'status'=>$status,
                'public'=>1
            ];
            $up = $filePic->create($file);

            $ctr++;
        }
        return $up;
    }
}
