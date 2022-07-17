<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\ComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
       use ApiResponseTrait;

    public function index()
    {

        $user = auth('user-api')->user()->id;
        $complaints = Complaint::orderBy('id', 'DESC')->where('user_id' , $user)->get();

        if($complaints){
            return $this->apiResponse( ComplaintResource::collection($complaints) , 200 , 'ok');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function store(ComplaintRequest $request)
    {
        $request_data = $request->all();
        $request_data['user_id'] = auth('user-api')->user()->id;
        $complaint = Complaint::create($request_data);

        if($complaint){
            return $this->apiResponse( new ComplaintResource($complaint), 200 , 'ok');
        }else{
            return $this->apiResponse(1, 404 , 'not found');
        }
    }


    public function update(ComplaintRequest $request, $id)
    {
        $complaint = Complaint::where('id' , $id)->first();
        if($complaint){
            $request_data = $request->all();
            $request_data['user_id'] = auth('user-api')->user()->id;
            $complaint->update($request_data);
            return $this->apiResponse( new ComplaintResource($complaint), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function destroy($id)
    {
        $complaint = Complaint::where('id' , $id)->first();

       if($complaint){
             Complaint::destroy($id);
            return $this->apiResponse( true, 200 , 'ok');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
