<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{

    public function task_waiting()
    {
        $tasks = Task::where('status' , '=' , 'waiting')->orderBy('created_at' , 'desc')->get();
        return view('backend.admin.task-status.waiting' , compact('tasks'));
    }

    public function task_rejected()
    {
        $tasks = Task::where('status' , '=' , 'rejected')->orderBy('created_at' , 'desc')->get();
        return view('backend.admin.task-status.rejected' , compact('tasks'));
    }

    public function task_approve()
    {
        $tasks = Task::where('status' , '=' , 'approve')->orderBy('created_at' , 'desc')->get();
        return view('backend.admin.task-status.approve' , compact('tasks'));
    }


    public function task_complete()
    {
        $tasks = Task::where('status' , '=' , 'complete')->orderBy('created_at' , 'desc')->get();
        return view('backend.admin.task-status.complete' , compact('tasks'));
    }

    public function task_edit()
    {
        $tasks = Task::where('status' , '=' , 'edit')->orderBy('created_at' , 'desc')->get();
        return view('backend.admin.task-status.edit' , compact('tasks'));
    }
}
