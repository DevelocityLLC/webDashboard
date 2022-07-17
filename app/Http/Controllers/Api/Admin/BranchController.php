<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\BranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BranchController extends Controller
{
       use ApiResponseTrait;
    public function index()
    {

        $branches = Branch::orderBy('id', 'DESC')->get();

        if($branches){
            return $this->apiResponse( BranchResource::collection($branches), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
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

        $branch = Branch::create($request_data);

        if($branch){
            return $this->apiResponse( new BranchResource($branch), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function update(BranchRequest $request, $id)
    {

        $branch = Branch::where('id' , $id)->first();


        if($branch){

            $branch->update($request->all());

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $branch->img;
            $branch->img = $new_file_name ;
            Storage::disk('branches')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/branches/'), $new_file_name);
        }



        $branch->save();

            return $this->apiResponse( new BranchResource($branch), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function destroy($id)
    {
        $branch = Branch::where('id' , $id)->first();
        

       if($branch){

        $old_file_name = $branch->img;

        if (!empty($branch->name)) {

            Storage::disk('branches')->delete('/'.$old_file_name);
        }
        branch::destroy($id);
            return $this->apiResponse( true, 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
