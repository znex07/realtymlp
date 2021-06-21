<?php

namespace App\Jobs\Resource\Image;

use App\FilePic;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class UploadDocs extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function handle(FilePic $filePic)
    {
        $data = $this->data;
        // return $data;
        $destinationPath = 'uploads/';
        $user_id = $data['user_id'];
        $property_code = $data['property_code'];
        $up = null;
        foreach($data['attcDocs'] as $f){
            $ext = $f->getClientOriginalExtension();
            $rnd = date('Y-m-d-H-i-s') . uniqid();
            $upload_file = $rnd .'.'. $ext;
            $success = $f->move($destinationPath, $upload_file);
            $file = [
                'user_id'=>$user_id,
                'property_code'=>$property_code,
                'file_category'=>2,
                'file_type'=>2,
                'file_path'=>$upload_file,
                'orig_name'=>$f->getClientOriginalName(),
                'file_size'=>$f->getClientSize(),
                'mime_type'=>$f->getClientMimeType(),
                'status'=>0,
                'public'=>1
            ];
            $up = $filePic->create($file);
        }
        return $up;
    }
}
