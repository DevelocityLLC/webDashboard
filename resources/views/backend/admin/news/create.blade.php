@extends('layouts.backend.master')

@section('title')
  {{ __('admin.add_news') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.news') }} </h6>
            <div class="ml-auto">
                <a href="{{ route('news.index') }}" class="btn btn-primary">
                <span><i class="fa fa-home"></i></span>
                <span> {{ __('admin.news') }} </span>
            </a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('news.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                            {{ __('admin.title') }}
                            </span>
                        </label>
                        <input type="text"  name="title" class="form-control form-control-solid" placeholder="Enter title" value="{{ old('title') }}" >
                        @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                            {{ __('admin.desc') }}
                            </span>
                        </label>
                        <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter News Desc" rows="3">{{ old('desc') }}</textarea>
                        @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>



                </div>

               <div class="row">

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">{{ __('admin.news_types') }}</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a NewsType" name="type_id">
                                <option value="">Select NewsType...</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>

                                @endforeach

                            </select>
                            @error('type_id') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->
                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">{{ __('admin.branch') }}</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a branches" name="branch_id">
                                <option value="">Select branches...</option>
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>

                                @endforeach

                            </select>
                            @error('branch_id') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->
                    </div>

               </div>


                <div class="row pt-4">

                    <div class="col-6">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.img') }}
                            </span>
                        </label>
                        <div >
                            <input type="file" name="img" class="form-control" >
                            <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                            @error('img') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>
                    </div>

                </div>


                <div class="text-center pt-15">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('admin.submit') }}</span>
                        <span class="indicator-progress">Please wait...</span>
                    </button>
                </div>

            </form>

        </div>

    </div>



@endsection



@section('script')

@endsection
