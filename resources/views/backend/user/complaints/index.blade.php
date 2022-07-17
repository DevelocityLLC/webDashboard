@extends('layouts.master')

 @section('title')
   {{ __('admin.complaints') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.complaints')}}</h6>
        <div class="ml-auto">
            <a href="{{ route('complaints.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_complaint') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.title') }}</th>
                   <th class="min-w-150px">{{ __('admin.message') }}</th>
                    <th class="min-w-150px">{{ __('admin.complaint_type') }}</th>
                   <th class="min-w-90px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>

                    <td></td>
                    <td>{{ $complaint->title }}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $complaint->id }}">{{ __('admin.read_more') }}</button>
                            @include('backend.admin.complaints.seemore')
                    </td>
                    <td>
                        @if ($complaint->type == 'general')
                            <h5><span class="badge badge-info" >General Complaint</span><h5>
                        @else
                          <a href="{{ route('tasks.users', $complaint->task_id) }}"><span class="badge badge-primary" >Task Complaint</span></a>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('complaints.edit' , $complaint->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $complaint->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.user.complaints.delete')
                        </div>

                    </td>

                 </tr>

                @endforeach




            </tbody>


        </table>
    </div>


 </div>




 @endsection



 @section('js')

 @endsection
