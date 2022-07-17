<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{

    public function index()
    {
        $news = NewsType::orderBy('id', 'DESC')->get();
        return view('backend.admin.news-type.index' , compact('news'));
    }
    public function create()
    {
        return view('backend.admin.news-type.create');
    }


    public function store(Request $request)
    {
        
        NewsType::create($request->all());
        toastr()->success('newsType created sucessfully');
        return redirect()->route('news-type.index');
    }

    public function edit($id)
    {
        $new = NewsType::findOrfail($id);
        return view('backend.admin.news-type.edit', compact('new'));
    }


    public function update(Request $request, $id)
    {
        $new = NewsType::findOrfail($id);
        $new->update($request->all());
        toastr()->success('newsType update sucessfully');
        return redirect()->route('news-type.index');
    }


    public function destroy($id)
    {
        $new = NewsType::destroy($id);
        toastr()->success('newsType deleted sucessfully');
        return redirect()->route('news-type.index');
    }
}
