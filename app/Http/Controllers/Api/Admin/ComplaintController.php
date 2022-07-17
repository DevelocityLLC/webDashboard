<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Resources\ComplaintResource;

class ComplaintController extends Controller
{
    use ApiResponseTrait;

    public function index($id=null)
    {
        $complaints = Complaint::when($id != null, function($q) use($id){
                $q->where('id', $id);
            })->orderBy('id', 'DESC')->get();

        if($complaints){
            return $this->apiResponse(ComplaintResource::collection($complaints) , 200 , 'complaints found');
        }else{
            return $this->apiResponse(false , 404 , 'complaints not found');
        }
    }
}
