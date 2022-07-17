@extends('layouts.backend.master')

@section('title')
  {{ __('admin.edit_section') }}
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

        <form action="{{ route('sections.update' , $section->id) }}" class="form" method="POST">
            @method('PUT')
            @csrf

            <div class="row">
                    {{-- section name --}}
                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">{{ __('admin.name') }}</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Section Name" value="{{ old('name' ,$section->name) }}" name="name" />
                          @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-bold mb-2">{{ __('admin.branch') }}</label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Branches" name="branch_id">
                            <option value="">Select Branch...</option>
                            @foreach ($branches as $branch)
                               <option value="{{ $branch->id }}" {{ $branch->id == $section->branch_id ? 'selected' : ''}}>{{ $branch->name }}</option>

                            @endforeach

                        </select>
                      @error('branch_id') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->

                    <!--end::Col-->



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
