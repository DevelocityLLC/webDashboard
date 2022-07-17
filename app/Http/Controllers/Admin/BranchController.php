<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{

    public function index()
    {
       $branches = Branch::orderBy('created_at', 'DESC')->get();
       return view('backend.admin.branches.index' , compact('branches'));

    }


    public function create()
    {
        return view('backend.admin.branches.create');
    }


    public function store(BranchRequest $request)
    {

        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/branches/'), $file_name);
            $request_data['img'] = $file_name;
        }

        $data = Branch::create($request_data);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('branches.index');
    }




    public function edit($id)
    {
       $branch = Branch::findOrfail($id);
       return view('backend.admin.branches.edit' , compact('branch'));

    }


    public function update(BranchRequest $request, $id)
    {


        $branch = Branch::findOrfail($id);

        $branch->update($request->all());

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $branch->img;
            $branch->img = $new_file_name ;
            Storage::disk('branches')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/branches/'), $new_file_name);
        }



        $branch->save();

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('branches.index');
    }


    public function destroy($id)
    {
        $branch = Branch::where('id' , $id)->first();
        $branch->id = $id;

        $old_file_name = $branch->img;

        if (!empty($branch->name)) {

            Storage::disk('branches')->delete('/'.$old_file_name);
        }
        branch::destroy($id);
        toastr()->success('Data has been Deleted successfully!');
        return redirect()->route('branches.index');
    }
}
