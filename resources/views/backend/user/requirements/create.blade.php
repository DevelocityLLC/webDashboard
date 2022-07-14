@extends('layouts.master')

 @section('title')
   {{ __('admin.add_requirement') }}
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

        <form action="{{ route('requirements.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.price') }}
                        </span>
                    </label>
                    <input type="number"  name="price" value="{{ old('price') }}" class="form-control form-control-solid" placeholder="Enter price" >
                    @error('price') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.task') }}
                        </span>
                    </label>

                    <select name="task_id" id="task_id" class="form-control">
                        <option value=""> -- choose -- </option>
                        @foreach($tasks as $task)
                           <option value="{{ $task->id }}">{{ $task->title }}</option>
                        @endforeach

                    </select>
                    @error('task_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.admins') }}
                        </span>
                    </label>

                    <select name="admin_id" id="admin_id" class="form-control">
                        <option value=""> -- choose -- </option>
                        @foreach($admins as $admin)
                           <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach

                    </select>
                    @error('admin_id') <span class="text-danger">{{ $message }}</span>  @enderror

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

  {{-- get jobs --}}
  <script>
    $(document).ready(function () {
        $('#company_id').on('change', function () {
            var company_id = $(this).val();
            if (company_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-jobs') }}/" + company_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#job_id').empty();
                        $('#job_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#job_id').append('<option value="' + key + '">' + value + '</option>');
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

 {{-- get users --}}
 <script>
    $(document).ready(function () {
        $('#job_id').on('change', function () {
            var job_id = $(this).val();
            if (job_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-user') }}/" + job_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#user_id').empty();
                        $('#user_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#user_id').append('<option value="' + key + '">' + value + '</option>');
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
