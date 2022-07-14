@extends('layouts.master')

 @section('title')
   {{ __('admin.edit_complaint') }}
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.complaints') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('complaints.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.complaints') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('complaints.update' , $complaint->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @method('PUT')
            @csrf


            <div class="row">
                                
                <div class="d-flex col-8 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.title') }}
                        </span>
                    </label>
                    <input type="text" name="title" class="form-control form-control-solid"  value="{{ $complaint->title }}">
                    @error('title') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
            </div>

            <div class="row">
                <div class="d-flex col-8 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.message') }}
                        </span>
                    </label>
                    <textarea name="message" class="form-control form-control-solid"  placeholder="Enter Message" rows="3">{{ old('message' , $complaint->message) }}</textarea>
                    @error('message') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
            </div>
            <div class="row">
                        
                <div class="d-flex col-8 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.complaint_type') }}
                        </span>
                    </label> 
                    <select name="type" class="form-control" onchange="complaint_types(this.value)">
                        <option value="general" @if ($complaint->type == 'general') selected="selected"@endif>General Complaint</option>
                        <option value="task" @if ($complaint->type == 'task') selected="selected"@endif>Task Complain</option>
                    </select>
                    @error('complaint_type') <span class="text-danger">{{ $message }}</span>  @enderror

                </div> 
                <div class="col-8 mb-7 {{old('complaint_type')}}"  @if ( $complaint->type == 'general') style="display: none" @endif id="task">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.task') }}
                        </span>
                    </label>
                    <select id="task_id" class="form-control">
                        <option value=""> -- choose -- </option>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}" @if ($complaint->task_id == $task->id) selected="selected" @endif>{{ $task->title }}</option>
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

  <script type="text/javascript">

        function complaint_types(val){
            console.log(val);
            if(val == "task"){
                $("#task").show();
                $('#task_id').prop('name', 'task_id');
            }else{
                $("#task").hide();
                $('#task_id').removeAttr('name');
            }
        }
  </script>

 @endsection
