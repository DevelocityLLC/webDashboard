<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
       use ApiResponseTrait;
    public function index()
    {
        $sections = Section::orderBy('id', 'DESC')->get();
        if($sections){
            return $this->apiResponse( SectionResource::collection($sections), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function store(SectionRequest $request)
    {
         $section =  Section::create($request->all());

        if($section){
            return $this->apiResponse(new SectionResource($section), 200 , 'section  create sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function update(SectionRequest $request, $id)
    {
        $section = Section::where('id' , $id)->first();

        if($section){
            $section->update($request->all());
            return $this->apiResponse( new SectionResource($section), 200 , 'section update sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }


    public function destroy($id)
    {
        $section = Section::where('id' , $id)->first();

       if($section){
                Section::destroy($id);
            return $this->apiResponse( true, 200 , 'section delete sucess');
        }else{
            return $this->apiResponse(null, 404 , 'not found');
        }
    }
}
