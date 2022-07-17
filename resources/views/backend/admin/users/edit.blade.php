@extends('layouts.backend.master')

@section('title')
  {{ __('admin.edit_user') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.users') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.users') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('users.update' , $user->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $user->name) }}" class="form-control form-control-solid" placeholder="Enter Your Name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email' , $user->email) }}" class="form-control form-control-solid" placeholder="Enter Your Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>



            </div>

           <div class="row">

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.password') }}
                        </span>
                    </label>
                    <input type="password"  name="password" class="form-control form-control-solid" placeholder="Enter Your password" >
                    @error('password') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.job_title') }}
                        </span>
                    </label>
                    <input type="text"  name="job_title" value="{{ old('job_title' , $user->job_title) }}" class="form-control form-control-solid" placeholder="Enter Your job Title" >
                    @error('job_title') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
           </div>

           <div class="row">

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.job_desc') }}
                        </span>
                    </label>
                    <textarea name="job_desc" class="form-control form-control-solid"  placeholder="Enter job Desc" rows="3">{{ old('job_desc' , $user->job_desc) }}</textarea>
                    @error('job_desc') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.kpis') }}
                        </span>
                    </label>
                    <textarea name="kpis" class="form-control form-control-solid"  placeholder="Enter job Desc" rows="3">{{ old('kpis' , $user->kpis) }}</textarea>
                    @error('kpis') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

           </div>

           <div class="row">

                <div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ __('admin.branch') }}</label>
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Branches" name="branch_id" id="branch_id">
                       <option value="{{ $user->branch_id }}">{{ $user->branch->name }}</option>
                        <option value="">Select Branch...</option>
                        @foreach ($branches as $branch)
                           <option value="{{ $branch->id }}">{{ $branch->name }}</option>

                        @endforeach

                    </select>
                    @error('branch_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ __('admin.section') }}</label>
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Branches" name="section_id" id="section_id">
                        <option value="{{ $user->section_id }}">{{ $user->sections->name }}</option>

                    </select>
                    @error('section_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

           </div>



            <div class="row pt-4">

                <div class="col-md-6">
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

 {{-- get sections --}}
 <script>
    $(document).ready(function () {
        $('#branch_id').on('change', function () {
            var branch_id = $(this).val();
            if (branch_id) {
                $.ajax({
                    url: "{{ URL::to('admin/user-section') }}/" + branch_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#section_id').empty();
                        $('#section_id').append('<option selected disabled > -- Select a Branches --</option>');
                        $.each(data, function (key, value) {
                            $('#section_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                    ,
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

@endsection
