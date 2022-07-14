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
                    <div class="col-md-8">

                        <a href="">
                            <div class="new">
                                <div class="image">
                                    <img src="{{ asset('Attachments/news/'. $new->img) }}" width="100%" height="100%">
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <h3>
                                            {{ $new->title}}
                                            <span>{{ $new->created_at->diffForHumans()}}</span>
                                        </h3>
                                        
                                    </div>
                                   <p> {{ $new->desc}} </p>
                                </div>
                            </div>
                        </a>


                    </div>
            </div>
        </div>

    </section>

 @endsection



 @section('js')

 @endsection
