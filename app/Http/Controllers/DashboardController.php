<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Complaint;
use App\Models\Task;
use App\Models\User;
use App\Models\News;
use App\Models\Requirement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth('admin')->check()){

          $tasks = Task::count();
          $tasks_waiting = Task::where('status' , '=' , 'waiting')->count();
          $tasks_rejected = Task::where('status' , '=' , 'rejected')->count();
          $tasks_approve = Task::where('status' , '=' , 'approve')->count();
          $tasks_complete = Task::where('status' , '=' , 'complete')->count();
          $tasks_edit = Task::where('status' , '=' , 'edit')->count();

          $requiremnts = Requirement::count();
          $requiremnts_waiting = Requirement::Where('status' , '=' , 'waiting')->count();
          $requiremnts_rejected = Requirement::Where('status' , '=' , 'rejected')->count();
          $requiremnts_approve = Requirement::Where('status' , '=' , 'approve')->count();

          $complaint_general = Complaint::Where('type' , '=' , 'general')->count();
          $complaint_task = Complaint::Where('type' , '=' , 'task')->count();



            return view('backend.dashboard' , compact('tasks' , 'tasks_waiting' , 'tasks_rejected' , 'tasks_approve' , 'tasks_complete' ,
                  'tasks_edit' ,'requiremnts' , 'requiremnts_rejected' , 'requiremnts_approve' ,
                   'requiremnts_waiting' , 'complaint_general' , 'complaint_task'
            ));
        }else{


            $user_id = auth('user')->user()->id;


            $latest_new = News::where('branch_id', auth('user')->user()->branch_id)->latest()->first();

            $tasks = Task::whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();

            $tasks_waiting = Task::where('status' , '=' , 'waiting')->whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();

            $tasks_complete = Task::where('status' , '=' , 'complete')->whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();


            $requirement_waiting = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'waiting')->count();
            $requirement_rejected = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'rejected')->count();
            $requirements_approve = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'approve')->count();



           return view('backend.dashboard' , compact('latest_new','tasks' , 'tasks_waiting' , 'tasks_complete' ,
              'requirement_waiting' , 'requirement_rejected'  , 'requirements_approve'

           ));


            return view('backend.dashboard' );
        }


    }


    public function welcome()
    {
        return view('welcome');
    }
}
