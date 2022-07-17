@extends('layouts.master')

 @section('title')

   {{ __('admin.task_detail') }}

 @endsection

 @section('style')

 @endsection


 @section('content')



    <div class="card shadow mb-4">




        <div class="card-body table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" style="text-align:center">


                <tbody>





                    <tr class="fw-bolder text-muted">
                        <th scope="row"> {{ __('admin.title') }} </th>
                        <th scope="row"> {{ __('admin.branch') }} </th>
                        <th scope="row"> {{ __('admin.section') }} </th>
                        <th scope="row"> {{ __('admin.user') }} </th>
                        <th scope="row"> {{ __('admin.admin') }} </th>
                    </tr>


                    <tr class="table-warning" class="table-warning">
                        <td>{{ $task->title}}</td>
                        <td>{{ $task->branch->name}}</td>
                        <td>
                            @foreach ($task->sections as $section)
                            <h5><span class="badge badge-info" >{{ $section->name}}</span><h5>
                            @endforeach
                        </td>
                        <td>
                        @foreach ($task->users as $task_user)
                            <h5><span class="badge badge-info" >{{ $task_user->name}}</span><h5>
                        @endforeach
                        </td>
                        <td>{{ $task->admin->admin_name }}</td>
                    </tr>


                    <tr class="fw-bolder text-muted">
                        <th scope="row"> {{ __('admin.desc') }} </th>
                        <th scope="row"> {{ __('admin.status') }} </th>
                        <th scope="row"> {{ __('admin.result') }} </th>
                        <th scope="row"> {{ __('admin.start_date') }} </th>
                        <th scope="row"> {{ __('admin.end_date') }} </th>
                    </tr>


                    <tr class="table-warning" class="table-warning">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $task->id }}">Read</button>
                                    @include('backend.admin.tasks.seemore')
                                </div>
                            </div>
                        </td>
                        <td>{{ $task->status}}</td>
                        <td>{{ $task->res}}</td>
                        <td>{{ $task->start_date}}</td>
                        <td>{{ $task->end_date }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">{{ __('admin.message') }}</td>
                    </tr>

                    <tr class="table-warning" class="table-warning">
                        <td colspan="5"><p>{{ $task->message}}</p></td>
                    </tr>


                    @if(auth('admin')->check())
                        <tr>
                            <td colspan="5">                            
                                <a href="{{ route('tasks.edit' , $task->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> {{ __('admin.edit_task') }}
                                </a>
                            </td>
                        </tr>
                    @endif



                </tbody>


            </table>
        </div>




 </div>




 @endsection



 @section('js')

 @endsection
