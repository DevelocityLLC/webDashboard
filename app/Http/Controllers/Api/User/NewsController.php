<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
       $branch_id = auth('user-api')->user()->branch_id;

       $news = News::where('branch_id' , $branch_id)->orderBy('id', 'DESC')->get();

       if($news){
         return $this->apiResponse(NewsResource::collection($news) , 200 , 'news found');
       }else{
         return $this->apiResponse(null , 404 , 'not found');
       }


    }
}
