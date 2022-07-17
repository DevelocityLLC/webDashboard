<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Rate;
use App\Models\Task;
use App\Notifications\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
     public function index($task_id=null)
     {
      
        $user_id = auth()->user()->id ;
        $tasks = Task::whereHas('users', function($q) use ($user_id,$task_id){
               return $q->when($task_id != null, function($q) use ($task_id){
                        return $q->where('task_id', $task_id);
                  })->where('user_id' , $user_id);
        })->orderBy('id', 'DESC')->get();
        
        
        return view('backend.user.tasks.index' , compact('tasks'));
     }

     public function editTask($id)
     {
        $task = Task::where('id' , $id)->first();
        return view('backend.user.tasks.edit' , compact('task'));
     }

     public function taskUpdate(Request $request , $id)
     {


        $task = Task::where('id' , $id)->first();
        $task->update(['status' => $request->status, 'message' => $request->message]);
        $task->admin->notify(new TaskStatus($task));



        toastr()->success('Task Status Update Sucessfully!');
        return redirect()->route('tasks.users');
     }

     public function rates()
     {
         $user = auth()->user();
         $tasks_rates = $user->tasks;
         //$rates = Rate::Where('user_id' , $user)->orderBy('id', 'DESC')->get();
         return view('backend.user.rates.index' , compact('tasks_rates'));

     }
}
