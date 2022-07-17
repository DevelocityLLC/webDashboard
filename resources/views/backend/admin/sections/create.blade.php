@extends('layouts.backend.master')

@section('title')
  {{ __('admin.add_section') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">  {{ __('admin.sections') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('admins.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span>  {{ __('admin.sections') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

            <form action="{{ route('sections.store') }}" class="form" method="POST">
                @csrf
        

                <div class="row">
                        {{-- section name --}}
                        <div class="d-flex flex-column mb-8 fv-row col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required"> {{ __('admin.name') }}</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Section Name" name="name" />
                            @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>
        
                    <div class="d-flex col-md-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold mb-2">{{ __('admin.branch') }}</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Branches" name="branch_id">
                                    <option value="">Select Branch...</option>
                                    @foreach ($branches as $branch)
                                       <option value="{{ $branch->id }}">{{ $branch->name }}</option>
        
                                    @endforeach
        
                                </select>
                                @error('branch_id') <span class="text-danger">{{ $message }}</span>  @enderror
        
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
