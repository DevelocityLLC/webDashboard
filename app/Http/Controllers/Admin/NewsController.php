<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Branch;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::orderBy('id', 'DESC')->get();
        return view('backend.admin.news.index' , compact('news'));
    }


    public function create()
    {
         $types = NewsType::orderBy('id', 'DESC')->get();
         $branches = Branch::orderBy('id', 'DESC')->get();
        return view('backend.admin.news.create' , compact('types' , 'branches'));
    }


    public function store(NewsRequest $request)
    {
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/news/'), $file_name);
            $request_data['img'] = $file_name;
        }

        News::create($request_data);
        toastr()->success('News has been created successfully!');
        return redirect()->route('news.index');
    }



    public function edit($id)
    {
        $types = NewsType::orderBy('id', 'DESC')->get();
        $branches = Branch::orderBy('id', 'DESC')->get();

        $new = News::findOrfail($id);
        return view('backend.admin.news.edit' , compact('types' , 'branches' , 'new'));
    }


    public function update(NewsRequest $request, $id)
    {
        $new = News::findOrfail($id);

        $new->update($request->all());
        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $new->img;
            $new->img = $new_file_name ;
            Storage::disk('news')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/news/'), $new_file_name);
        }

        $new->save();
        toastr()->success('News has been update successfully!');
        return redirect()->route('news.index');

    }


    public function destroy($id)
    {
        $new = News::where('id' , $id)->first();


        $old_file_name = $new->img;

        if (!empty($new->title)) {

            Storage::disk('news')->delete($old_file_name);
        }
         News::destroy($id);
        toastr()->success('News has been created successfully!');
        return redirect()->route('news.index');
    }
}
