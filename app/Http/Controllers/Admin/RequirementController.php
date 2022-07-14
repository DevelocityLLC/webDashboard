<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Notifications\ChangStatusRequirement;

class RequirementController extends Controller
{
        
    public function index()
    {
       $requirements =  Requirement::orderBy('id', 'DESC')->get();
       return view('backend.admin.requirements.index' , compact('requirements'));

    }

        
    public function changStatus( Request $request ,$id)
    {
        $req = Requirement::findOrfail($id);
        $req->update(['status' => $request->status]);
        $req->user->notify(new ChangStatusRequirement($req));
        return redirect()->route('admin.requirements');

    }
    
    
    public function Requirements_waiting()
    {
        $requiremnts_waiting = Requirement::Where('status' , '=' , 'waiting')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.requirements.waiting' , compact('requiremnts_waiting'));
    }

    public function Requirements_rejected()
    {
        $requiremnts_rejected = Requirement::Where('status' , '=' , 'rejected')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.requirements.rejected' , compact('requiremnts_rejected'));
    }

    public function Requirements_approve()
    {
        $requiremnts_approve = Requirement::Where('status' , '=' , 'approve')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.requirements.approve' , compact('requiremnts_approve'));
    }
}
