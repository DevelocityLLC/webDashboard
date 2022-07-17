<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Http\Resources\TaskResource;
use App\Models\Branch;
use App\Models\News;
use App\Models\Task;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    use ApiResponseTrait;
    
     public function tasks($task_id=null)
    {
        $user_id = auth('user-api')->user()->id ;
        $tasks = Task::whereHas('users', function($q) use ($user_id,$task_id){
               return $q->when($task_id != null, function($q) use ($task_id){
                        return $q->where('task_id', $task_id);
                  })->where('user_id' , $user_id);
        })->orderBy('id', 'DESC')->get();

       if($tasks){
         return $this->apiResponse(TaskResource::collection($tasks) , 200 , 'ok');
       }else{
         return $this->apiResponse(null , 404 , 'not found');
       }
    }

    public function news()
    {
       $users = auth('user-api')->user()->branch_id;

       $news = News::orderBy('id', 'DESC')->where('branch_id' , $users)->get();

       if($news){
         return $this->apiResponse(NewsResource::collection($news) , 200 , 'ok');
       }else{
         return $this->apiResponse(null , 404 , 'not found');
       }


    }
}
