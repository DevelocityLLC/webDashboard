<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Branch;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {
        $sections = Section::orderBy('id', 'DESC')->get();
        $branches = Branch::orderBy('id', 'DESC')->get();

        return view('backend.admin.sections.index' , compact('sections' , 'branches'));
    }


    public function store(SectionRequest $request)
    {
        Section::create($request->all());
        toastr()->success('section created sucessfully');
        return redirect()->route('sections.index');
    }


    public function update(SectionRequest $request, $id)
    {
        $section = Section::findOrfail($id);
        $section->update($request->all());
        toastr()->success('Sections update sucess');
        return redirect()->route('sections.index');
    }


    public function destroy($id)
    {
        Section::destroy($id);
        toastr()->success('Sections deleted sucess');
        return redirect()->route('sections.index');
    }
}
