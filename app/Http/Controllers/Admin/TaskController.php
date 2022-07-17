<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\AddTask;
use App\Http\Requests\ImportFileRequest;
use App\Imports\TasksImport;
use Illuminate\Support\Facades\Notification;
use Excel;
class TaskController extends Controller
{

    public function index(Request $request)
    {
        $tasks = Task::when($request->userId, function($q) use ($request){
            return $q->whereHas('users', function($q)use ($request){
                return $q->where('user_id', $request->userId);
            });

        })->orderBy('id', 'DESC')->get();
        return view('backend.admin.tasks.index' , compact('tasks'));
    }


    public function create()
    {
       $admins = Admin::orderBy('id', 'DESC')->get();
       $users = User::orderBy('id', 'DESC')->get();
       $sections = Section::orderBy('id', 'DESC')->get();
       $branches = Branch::orderBy('id', 'DESC')->get();

        return view('backend.admin.tasks.create' , compact('admins' , 'users' , 'sections' , 'branches'));
    }


    public function store(TaskRequest $request)
    {

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/tasks/'), $file_name);
        }


        $task = Task::create([
            'title'=>$request->title,
            'branch_id' => $request->branch_id ,
            'desc' => $request->desc ,
            'img' => $request->img ,
            'status' => 'waiting' ,
            'start_date' => $request->start_date ,
            'end_date' => $request->end_date ,
            'admin_id' => auth('admin')->user()->id ,
        ]);

        $task->users()->sync($request->user_id);
        $task->sections()->sync($request->section_id);

        Notification::send($task->users, new AddTask($task));

        toastr()->success('task created sucessfully');

        return $request->userId
                ?
                    redirect()->route('tasks.index', ['userId'=>$request->userId])
                :
                    redirect()->route('tasks.index');


    }



    public function edit($id)
    {
       $admins = Admin::orderBy('id', 'DESC')->get();
       $users = User::orderBy('id', 'DESC')->get();
       $sections = Section::orderBy('id', 'DESC')->get();
       $branches = Branch::orderBy('id', 'DESC')->get();
       $task = Task::where('id' , $id)->first();

        return view('backend.admin.tasks.edit' , compact('task' ,'admins' , 'users' , 'sections' , 'branches'));
    }


    public function update(TaskRequest $request, $id)
    {

        $task = Task::findOrfail($id);
        
        $task->update([
            'title'=>$request->title,
            'branch_id' => $request->branch_id ,
            'desc' => $request->desc ,
            'start_date' => $request->start_date ,
            'end_date' => $request->end_date ,
            'admin_id' => auth('admin')->user()->id ,
        ]);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $task->img;
            $task->img = $new_file_name ;
            Storage::disk('tasks')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/tasks/'), $new_file_name);
        }

        $task->save();
        $task->users()->sync($request->user_id);
        $task->sections()->sync($request->section_id);

        toastr()->success('task update sucessfully');
        return redirect()->route('tasks.index');
    }


    public function destroy($id)
    {
        $task = Task::where('id' , $id)->first();
        $task->id = $id;

        $old_file_name = $task->img;

        if (!empty($task->title)) {

            Storage::disk('tasks')->delete($old_file_name);
        }
        Task::destroy($id);
        toastr()->success('task delete sucessfully');
        return redirect()->route('tasks.index');
    }
    public function rate_task(Request $request, Task $task)
    {
        $users_task_rate = array();
        foreach($request->rate_task as $key=>$value){
            $j=0;
            foreach($value as $val){
                $users_task_rate[$j][$key] = $val;
                $j++;
            }
        }


        foreach($users_task_rate as $user_task_rate){

            $task->users()->updateExistingPivot($user_task_rate['user_id'], ['rate'=>$user_task_rate['rate'], 'desc'=>$user_task_rate['desc']]);
        }

        toastr()->success('Task has been rated successfully!');
        return redirect()->back();

    }
    public function get_users($section_ids)
    {
        $section_ids = explode(',' , $section_ids);
        $users = User::whereIn('section_id' , $section_ids)->pluck('name' , 'id');
        return  $users;
    }

    public function uploadcsv()
    {
        return view('backend.admin.tasks.uploadcsv');
    }

    public function importcvs(ImportFileRequest $request)
    {
            $file = $request->file('file');
            Excel::import(new TasksImport, $file);

            toastr()->success('tasks has been added successfully!');
            return redirect()->route('tasks.index');

    }

        
    public function task_details($id)
    {
        $task = Task::where('id' , $id)->first();
        return view('backend.admin.tasks.details' , compact('task'));

    }
    
        public function check_task_users(Task $task, $user_id)
    {
        return in_array($user_id, $task->users->pluck('id')->toArray()) ?? false;
    }

}
