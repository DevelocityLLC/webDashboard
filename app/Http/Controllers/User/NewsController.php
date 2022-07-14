<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
                        
        $news = News::where('branch_id', auth('user')->user()->branch_id)->orderBy('id', 'DESC')->get();
        return view('backend.user.news.index', compact('news'));

    }

    public function show($id)
    {
        $new = News::where(['id'=>$id, 'branch_id' =>auth('user')->user()->branch_id])->first();

        return $new ? view('backend.user.news.show', compact('new')) : abort(404);;

    }
}
