@extends('layouts.backend.master')

@section('title')
 {{ __('admin.tasks') }}
@endsection


@section('style')

@endsection




@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ __('admin.tasks') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a task"> 
                <a href="{{ route('tasks.create' , ['userId'=>Request::get('userId')]) }}" class="btn btn-primary add-margin">
                    <span><i class="fa fa-plus"></i></span>
                    <span> {{ __('admin.add_task') }} </span>
                </a>
                <a href="{{ route('tasks.uploadcsv') }}" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    <span> {{ __('admin.import_tasks') }} </span>
                </a>
            </div>
        </div>
        <!--end::Header-->


        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">

                            <th class="min-w-150px">{{ __('admin.admin') }}</th>
                            <th class="min-w-140px">{{ __('admin.title') }}</th>
                            <th class="min-w-130px">{{ __('admin.desc') }}</th>
                            <th class="min-w-120px">{{ __('admin.status') }}</th>
                            <th class="min-w-110px">{{ __('admin.start_date') }}</th>
                            <th class="min-w-100px">{{ __('admin.end_date') }}</th>
                            <th class="min-w-90px">{{ __('admin.branch') }}</th>
                            <th class="min-w-90px">{{ __('admin.sections') }}</th>
                            <th class="min-w-90px">{{ __('admin.users') }}</th>
                            <th class="min-w-110px">{{ __('admin.rate') }}</th>
                            <th class="min-w-80px text-end">{{ __('admin.action') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($tasks as $task)

                            <tr>
                                <td>

                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{ $task->admin->img ? asset('Attachments/admins/'.$task->admin->img) : asset('Attachments/admins/1.png') }}" alt="" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $task->admin->name }}</span>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $task->admin->job_title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $task->title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $task->id }}">Read</button>
                                            @include('backend.admin.tasks.seemore')
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            @if ($task->status == 'complete')
                                              <span class="badge badge-light-success">{{ $task->status }}</span>
                                            @elseif ($task->status == 'rejected')
                                              <span class="badge badge-light-danger">{{ $task->status }}</span>
                                            @else
                                             <span class="badge badge-light-warning">{{ $task->status }}</span>
                                            @endif


                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $task->start_date }}</span>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $task->end_date }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $task->branch->name }}</span>
                                        </div>
                                    </div>
                                </td>

                                 <td>

                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            @foreach ($task->sections as $section)
                                             <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $section->name }}</span>
                                             @endforeach
                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            @foreach ($task->users as $user)
                                              <span class="text-dark fw-bolder text-hover-primary fs-6 ">{{ $user->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>

                                </td>


                                <td>                      
                                    @foreach ($task->users as $task_user)
                                        <h5><span class="badge badge-info" >{{ $task_user->pivot->rate}}</span><h5>
                                    @endforeach
                                </td>

                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
              
                                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to rate the task">
                                            <a href="#" class="rate-icon btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_task_rate_{{$i}}" title="rate the task">
                                                <i class="fa fa-star" style="color: #a1a5b7;"></i>
                                            </a>      
                                     
                                            @include('backend.admin.tasks.rate_task')
                                        </div>
                                        <a href="{{ route('tasks.edit' , $task->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>

                                        <a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $task->id }}">

                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                </svg>
                                            </span>
                                        </a>
                                        @include('backend.admin.tasks.delete')

                                    </div>
                                </td>
                            </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach


                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>



@endsection



@section('script')

@endsection
