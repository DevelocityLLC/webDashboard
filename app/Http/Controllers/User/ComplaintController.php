<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Requests\ComplaintRequest;

class ComplaintController extends Controller
{

    public function index()
    {
        $complaints = Complaint::where('user_id', auth()->user()->id)->get();
        return view('backend.user.complaints.index' , compact('complaints'));

    }


    public function create()
    {
        $tasks = auth()->user()->tasks;
        return view('backend.user.complaints.create', compact('tasks'));
    }


    public function store(ComplaintRequest $request)
    {
         Complaint::create([
            'title'   => $request->title,
            'message' => $request->message ,
            'type'    => $request->type,
            'user_id'=> auth()->user()->id,
            'task_id'=> $request->task_id
         ]);

         toastr()->success('Complaint Created sucessfully');
         return redirect()->route('complaints.index');
    }

    public function edit($id)
    {
        $complaint = Complaint::findOrfail($id);
        $tasks = auth()->user()->tasks;
        return view('backend.user.complaints.edit' , compact('complaint', 'tasks'));
    }


    public function update(ComplaintRequest $request, $id)
    {
        $complaint = Complaint::findOrfail($id);
        $complaint->update([
            'title'   => $request->title,
            'message' => $request->message,
            'type'    => $request->type,
            'task_id' => $request->task_id
         ]);

        toastr()->success('Complaint updated sucessfully');
        return redirect()->route('complaints.index');
    }
   
    public function destroy($id)
    {
        Complaint::destroy($id);
        toastr()->success('Company deleted sucessfully');
        return redirect()->route('complaints.index');
    }
}
