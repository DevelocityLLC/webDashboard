<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::orderBy('id', 'DESC')->get();
        return view('backend.admin.admins.index' , compact('admins'));

    }


    public function create()
    {
        return view('backend.admin.admins.create');
    }


    public function store(AdminRequest $request)
    {
       

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/admins/'), $file_name);
        }


        $admin = Admin::create([
            'name' => $request->name,
            'email'=> $request->email,
            'job_title' => $request->job_title ,
            'password' => bcrypt($request->password),
            'img'=> $file_name ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);



        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admins.index');

    }


    public function edit($id)
    {
        $admin = Admin::findOrfail($id);
        return view('backend.admin.admins.edit' , compact('admin'));
    }


    public function update(AdminRequest $request, $id)
    {
        $new_file_name = '';
        $old_file_name = '';

        $admin = Admin::findOrfail($id);
        $admin->update([
            'admin' => $request->name,
            'email'=> $request->email,
            'job_title' => $request->job_title ,
            'password' => bcrypt($request->password),
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $admin->img;
            $admin->img = $new_file_name ;
        }

        if ($request->hasFile('img')) {
            // move img
            Storage::disk('admins')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/admins/'), $new_file_name);
        }

        $admin->save();

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        $admin = Admin::where('id' , $id)->first();
        $admin->id = $id;

        $old_file_name = $admin->img;

        if (!empty($admin->name)) {

            Storage::disk('admins')->delete('/'.$old_file_name);
        }
        Admin::destroy($id);
        toastr()->success('Data has been Deleted successfully!');
        return redirect()->route('admins.index');
    }
}
