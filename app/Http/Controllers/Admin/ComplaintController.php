<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Requirement;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function complaints()
    {
        $complaints = Complaint::orderBy('id', 'DESC')->get();
        return view('backend.admin.complaints.index' , compact('complaints'));
    }
    
    public function compalint_task()
    {
        $compalint_task = Complaint::where('type' , '=' , 'task')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.complaints.task' , compact('compalint_task'));

    }

    public function compalint_general()
    {
        $compalint_general = Complaint::where('type' , '=' , 'general')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.complaints.general' , compact('compalint_general'));

    }

}
