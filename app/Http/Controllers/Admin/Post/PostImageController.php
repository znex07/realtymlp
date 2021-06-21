<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\Resource\Image\Admin\UploadImages;
class PostImageController extends Controller
{
   public function storeImage(Request $request)
   {
       $data = $request->all();
       $response = $this->dispatch(new UploadImages($data));
       return response()->json(['success'=>true,'return'=>$response]);
   }
}
