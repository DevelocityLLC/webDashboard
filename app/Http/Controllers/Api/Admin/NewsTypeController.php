<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsTypeResource;
use App\Models\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
       use ApiResponseTrait;
    public function index()
    {
        $news = NewsType::orderBy('id', 'DESC')->get();
        if($news){
            return $this->apiResponse( NewsTypeResource::collection($news), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function store(Request $request)
    {
       $news = NewsType::create($request->all());
        if($news){
            return $this->apiResponse( new NewsTypeResource($news), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }

    public function update(Request $request, $id)
    {

        $new = NewsType::where('id' , $id)->first();
       
        if($new){
             $new->update($request->all());

            return $this->apiResponse(  new NewsTypeResource($new), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function destroy($id)
    {
        $new = NewsType::where('id' , $id)->first();
       if($new ){
         NewsType::destroy($id);
            return $this->apiResponse(  true, 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
