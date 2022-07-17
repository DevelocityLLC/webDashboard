<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Http\Resources\RequirementResource;
use App\Http\Requests\Api\admin\RequirementRequest;
class RequirementController extends Controller
{
    use ApiResponseTrait;
        
    public function index($id=null)
    {
        $requirements = Requirement::when($id != null, function($q) use($id){
                $q->where('id', $id);
            })->orderBy('id', 'DESC')->get();

        if($requirements){
            return $this->apiResponse(RequirementResource::collection($requirements) , 200 , 'requirements found');
        }else{
            return $this->apiResponse(false , 404 , 'requirements not found');
        }
    }

    public function update_status(RequirementRequest $request, $id)
    {
        
        $requirement = Requirement::Where('id' , $id)->first();

        if(! $requirement)
            return $this->apiResponse(null , 404 , 'requirement not found');
        
        $requirement->update(['status' => $request->status]);

        return $this->apiResponse(new RequirementResource($requirement) , 201 , 'requirement update sucessfully');

        
    }
}
