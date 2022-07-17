<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImportFileRequest;
use App\Exports\UserTasksRate;
use App\Imports\UsersImport;
use Excel;
class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.admin.users.index' , compact('users'));
    }


    public function create()
    {
        $branches = Branch::orderBy('id', 'DESC')->get();
        $sections = Section::orderBy('id', 'DESC')->get();
        return view('backend.admin.users.create' , compact('branches' , 'sections'));

    }


    public function store(UserRequest $request)
    {
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/users/'), $file_name);
            $request_data['img'] = $file_name;
        }

        $request_data['password'] = bcrypt($request->password);
        //$request_data['email_verified_at'] = now();
        $request_data['activation_code'] = Str::random(30);
        $request_data['remember_token'] = Str::random(10);

        User::create($request_data);
        
        $data = [
            'name' => $request->name,
            'activation_code' => $request_data['activation_code']
        ];

        \Mail::to($request->email)->send(new \App\Mail\ActivateAccount($data));

        toastr()->success('User has been Saved successfully!');
        return redirect()->route('users.index');




    }


    public function edit($id)
    {
        $branches = Branch::orderBy('id', 'DESC')->get();
        $sections = Section::orderBy('id', 'DESC')->get();
        $user = User::findOrfail($id);
        return view('backend.admin.users.edit' , compact('branches' , 'sections' , 'user'));

    }


    public function update(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $request_data = $request->except('password');    
        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }
        $user->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $user->img;
            $user->img = $new_file_name ;
            Storage::disk('users')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/users/'), $new_file_name);
        }

        $user->save();
        toastr()->success('User has been update successfully!');
        return redirect()->route('users.index');


    }


    public function destroy($id)
    {
        $user = User::where('id' , $id)->first();
        $user->id = $id;

        $old_file_name = $user->img;

        if (!empty($user->name)) {

            Storage::disk('users')->delete('/'.$old_file_name);
        }
        User::destroy($id);
        toastr()->success('Data has been Deleted successfully!');
        return redirect()->route('users.index');
    }

    public function get_sections($id)
    {
        $sections = Section::where('branch_id' , $id)->pluck('name' , 'id');
        return $sections;
    }

    public function export($user_id)
    {
        $user = User::where('id' , $user_id)->first();
        return Excel::download(new UserTasksRate($user), 'xx.xlsx');
    }


        
    public function uploadcsv()
    {
        return view('backend.admin.users.uploadcsv');
    }

    public function importcvs(ImportFileRequest $request)
    {
            $file = $request->file('file');
            Excel::import(new UsersImport, $file);
         
            toastr()->success('user has been added successfully!');
            return redirect()->route('users.index');
    }
    public function perfect_employee()
    {
        $users = User::get()->sortByDesc(function ($user, $key) {
                return $user->avg_rates();
        })->take(5);
       return view('backend.admin.users.perfect_employee' , compact('users'));
    }
}
