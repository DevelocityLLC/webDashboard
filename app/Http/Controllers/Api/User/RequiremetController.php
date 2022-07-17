<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\admin\RequirementRequest;
use App\Http\Resources\RequirementResource;
use App\Models\Requirement;
use Illuminate\Http\Request;


class RequiremetController extends Controller
{
       use ApiResponseTrait;
    public function index()
    {

       $user = auth('user-api')->user()->id;
       $requirements = Requirement::orderBy('id', 'DESC')->where('user_id' , $user)->get();
        if( $requirements){
            return $this->apiResponse(  RequirementResource::collection($requirements), 200 , 'ok');
        }else{
            return $this->apiResponse( null, 404 , 'not found');
        }
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        $request_data['user_id'] = auth('user-api')->user()->id;
        $request_data['status'] = 'waiting';
        $requirement = Requirement::create($request_data);
        if($requirement){
            return $this->apiResponse( new RequirementResource($requirement), 200 , 'ok');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function update(Request $request, $id)
    {
        $requirement = Requirement::where('id' , $id)->first();
        if($requirement){
            $request_data = $request->all();
            $request_data['user_id'] = auth('user-api')->user()->id;
            $request_data['status'] = 'waiting';
            $requirement->update($request_data);
            return $this->apiResponse( new RequirementResource($requirement), 200 , 'ok');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function destroy($id)
    {
        $requirement = Requirement::where('id' , $id)->first();
       if($requirement){
             Requirement::destroy($id);
            return $this->apiResponse( true, 200 , 'ok');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
