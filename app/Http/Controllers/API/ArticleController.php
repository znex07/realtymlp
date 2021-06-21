<?php

namespace App\Http\Controllers\API;

use App\Property;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Property::where('property_status','1')->orderBy('created_at','desc')->get();
//        $property = $articles->where('property_status','1');
//        dd($articles);
//        foreach($articles as &$article) {
//            $article->listing_type = $article->get;
//            $article->condition_type = 1;
//        }
//        dd(response()->json($articles));
        return response()->json($articles);
//        $json = json_encode($articles);
//        return compact('articles', 'json');
//        return $articles;
    }
}
