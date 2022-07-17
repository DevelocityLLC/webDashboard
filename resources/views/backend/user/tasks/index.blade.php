@extends('layouts.master')

 @section('title')
   {{ __('admin.tasks') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.tasks') }}</h6>

    </div>




    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.task') }}</th>
                   <th class="min-w-140px">{{ __('admin.img') }}</th>
                   <th class="min-w-130px">{{ __('admin.branch') }}</th>
                   <th class="min-w-120px">{{ __('admin.section') }}</th>
                   <th class="min-w-100px">{{ __('admin.start_date') }}</th>
                   <th class="min-w-100px">{{ __('admin.end_date') }}</th>
                   <th class="min-w-100px">{{ __('admin.admin') }}</th>
                   <th class="min-w-100px">{{ __('admin.status') }}</th>
                   <th class="min-w-90px" style="width:30px ;">{{ __('admin.change_status') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>

                    <td></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $task->id }}">{{ __('admin.read_more') }}</button>
                        @include('backend.admin.tasks.seemore')
                    </td>
                    <td>
                        <img src="{{ asset('Attachments/tasks/'.$task->img) }}" width="70px" alt="">
                    </td>
                    <td>{{ $task->branch->name }}</td>
                    <td>                        
                        @foreach ($task->sections as $section)
                          <h5><span class="badge badge-info" >{{ $section->name}}</span><h5>
                        @endforeach
                    </td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>{{ $task->admin->admin_name }}</td>
                    @if ( $task->status == 'complete')
                        <td><span
                                class="badge badge-pill badge-success">{{ $task->status }}</span>
                        </td>
                    @elseif ($task->status == 'rejected')

                        <td><span
                            class="badge badge-pill badge-danger">{{ $task->status }}</span>
                        </td>
                    @else
                        <td><span
                            class="badge badge-pill badge-warning">{{ $task->status }}</span>
                        </td>

                    @endif

                    <td>
                        <div class="btn-group">

                            <button type="button" class="btn btn-primary  btn-sm" title="تعديل" data-bs-toggle="modal"
                               data-bs-target="#Edit{{ $task->id }}"><i class="fa fa-edit"></i>
                            </button>

                            {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $company->id }}" title="حذف"><i class="fa fa-trash"></i></button> --}}

                            @include('backend.user.tasks.edit')



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
