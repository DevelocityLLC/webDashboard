@extends('layouts.master')

 @section('title')
   {{ __('admin.news') }}
 @endsection

 @section('style')

 @endsection

 @section('content')

    <section class="news-grid">

        <div class="container">
            <div class="row">
                @foreach($news as $new)
                                
                    <div class="col-md-4">

                        <a href="{{ route('users.news.show', $new->id) }}">
                            <div class="new">
                                <div class="image">
                                    <img src="{{ asset('Attachments/news/'. $new->img) }}" width="100%" height="100%">
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <h3>
                                            {{ $new->title}}
                                            <span style="float: left; color:#8b7d7d;font-size:14px">{{ $new->created_at->diffForHumans()}}</span>
                                        </h3>
                                        
                                    </div>
                                   <p>
                                        {!! Str::limit(strip_tags($new->desc), $limit = 150, $end = '...') !!}
                                        <span href="" class="read-more-button" style="float: left;margin-left: 10px;color: #e95a5a;">
                                            <i class="fa fa-arrow-circle-left" style="color: #e95a5a; margin-left:5px"></i>
                                            إقرا المزيد
                                        </span>

                                    </p>
                                </div>
                            </div>
                        </a>


                    </div>
                @endforeach

            </div>
        </div>

    </section>

 @endsection



 @section('js')

 @endsection
