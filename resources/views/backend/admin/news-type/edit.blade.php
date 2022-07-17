@extends('layouts.backend.master')

@section('title')
  {{ __('admin.edit_news_types') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">  {{ __('admin.news_types') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('admins.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span>  {{ __('admin.news_types') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('news-type.update' , $new->id) }}" class="form" method="POST">
            @method('PUT')
            @csrf

            <div class="row">
                    {{-- section name --}}
                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required"> {{ __('admin.title') }} </span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Title " value="{{$new->title }}" name="title" />
                          @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

            </div>

            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label"> {{ __('admin.submit') }}</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>



@endsection



@section('script')

@endsection
