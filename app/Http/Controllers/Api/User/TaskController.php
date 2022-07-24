<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Admin\UpdateUserTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Notifications\TaskStatus;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {

       $user = auth('user-api')->user();
       $tasks = $user->tasks;
        if($tasks){
            return $this->apiResponse( TaskResource::collection($tasks), 200 , 'user tasks');
        }else{
            return $this->apiResponse( null, 404 , 'not found');
        }
    }

         
    public function update_task_status(UpdateUserTaskRequest $request , $id)
     {

        $user_id = auth('user-api')->user()->id;
        
        $task = Task::whereHas('users', function($q) use ($user_id){
                    return $q->where('user_id', $user_id);
        })->where('id', $id)->first();

        if(! $task){
            return $this->apiResponse( null, 404 , 'task not found');
        }

        $task->update(['status' => $request->status, 'message' => $request->message]);

        if($task){
                    
            $task->admin->notify(new TaskStatus($task));
            return $this->apiResponse( null, 200 , 'Task status updated successfuly');
            
        }else{
            return $this->apiResponse( null, 404 , 'not found');
        }

     }
}
