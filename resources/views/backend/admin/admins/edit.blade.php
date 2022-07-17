@extends('layouts.backend.master')

@section('title')
  {{ __('admin.edit_admin') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">  {{ __('admin.admins') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('admins.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span>  {{ __('admin.admins') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admins.update' , $admin->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- name , job_title --}}

            <div class="row">
                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $admin->name) }}" class="form-control form-control-solid" placeholder="Enter Your Name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                             {{ __('admin.job_title') }}
                        </span>
                    </label>
                    <input type="text"  name="job_title" value="{{ old('job_title' , $admin->job_title) }}" class="form-control form-control-solid" placeholder="Enter your Job title" >
                    @error('job_title') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


            </div>

            {{-- email , password --}}

           <div class="row">
                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email' , $admin->email) }}" class="form-control form-control-solid" placeholder="Enter Your Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                             {{ __('admin.password') }}
                        </span>
                    </label>
                    <input type="password"  name="password"  class="form-control form-control-solid" placeholder="Enter Your password" >
                    @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
           </div>

           {{-- img --}}
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
