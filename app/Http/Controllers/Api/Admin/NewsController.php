<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
       use ApiResponseTrait;

    public function index($id=null)
    {
        $news = News::when($id != null, function($q) use($id){
                $q->where('id', $id);
        })->orderBy('id', 'DESC')->get();

        if($news){
            return $this->apiResponse(NewsResource::collection($news) , 200 , 'news found');
        }else{
            return $this->apiResponse(false , 404 , 'news not found');
        }
    }


    public function store(NewsRequest $request)
    {

        $request_data = $request->except('img');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $request->img->move(public_path('/Attachments/news/'), $image->getClientOriginalName());
            $request_data['img'] = $image->getClientOriginalName();
        }


        $news = News::create($request_data);

        if($news){
          return $this->apiResponse(new NewsResource($news) , 200 , 'news creates sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'something went wrong');
        }
    }


   public function update(NewsRequest $request, $id)
    {

        $news = News::Where('id' , $id)->first();

        if($news){

            $request_data = $request->all();

            if ($request->hasFile('img')) {
                
                Storage::disk('news')->delete('/'.$news->img);
                $image = $request->file('img');
                $request->img->move(public_path('/Attachments/news/'), $image->getClientOriginalName());
                $request_data['img'] = $image->getClientOriginalName();
            }

        
            $news->update($request_data);

            return $this->apiResponse(new NewsResource($news) , 200 , 'news update sucessfully');

        }else{
            return $this->apiResponse(null , 404 , 'news not found');
        }
    }
   
    public function destroy($id)
    {
        $news = News::Where('id' , $id)->first();

        if($news){
                    
            if (!empty($news->img)) {

                Storage::disk('news')->delete('/'.$news->img);
            }

            News::destroy($id);
            return $this->apiResponse(true , 200 , 'news deleted sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'news not found');
        }
    }
}
