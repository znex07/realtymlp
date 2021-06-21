<?php

namespace App\Http\Controllers\Resource;

use App\FilePic;
use App\Jobs\Resource\Image\UploadDocs;
use App\Jobs\Resource\Image\UploadImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

use App\Http\Requests\Image\ImageRequest;
class ImageController extends Controller
{
    public function store(ImageRequest $request){
        // dd($request->all());

        $data = $request->all();
        $ret = [];
        $data['user_id'] = auth()->user()->id;
//        dd(Input::all());
        if($data['file_type'] === 'img'){
            $img = $this->dispatch(new UploadImage($data));
            $ret = ['success'=>true,'return'=>$img];
        }
        if($data['file_type'] === 'doc'){
            $doc = $this->dispatch(new UploadDocs($data));
            $ret = ['success'=>true,'return'=>$doc];
        }
        return response()->json($ret);
    }
}
