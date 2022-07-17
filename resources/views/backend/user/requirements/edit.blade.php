@extends('layouts.master')

 @section('title')
   {{ __('admin.edit_requirement') }}
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.requirements') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('requirements.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.requirements') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('requirements.update' , $requirement->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $requirement->name) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.price') }}
                        </span>
                    </label>
                    <input type="number"  name="price" value="{{ old('price' , $requirement->price) }}" class="form-control form-control-solid" placeholder="Enter price" >
                    @error('price') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.task') }}
                        </span>
                    </label>

                    <select name="task_id" id="task_id" class="form-control">
                        <option value="{{ $requirement->task_id }}">{{ $requirement->task->title }}</option>
                        <option value=""> -- choose -- </option>
                        @foreach($tasks as $task)
                           <option value="{{ $task->id }}">{{ $task->title }}</option>
                        @endforeach

                    </select>
                    @error('task_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    
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



 @section('js')


 @endsection
