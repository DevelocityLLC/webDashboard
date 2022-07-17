@extends('layouts.backend.master')

@section('title')
{{ __('admin.complaint_task') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1"> {{ __('admin.complaints') }}</span>
            </h3>

        </div>
        <!--end::Header-->


        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">

                            <th class="min-w-150px"> {{ __('admin.user') }}</th>
                            <th class="min-w-140px"> {{ __('admin.title') }}</th>
                            <th class="min-w-140px"> {{ __('admin.message') }}</th>
                            <th class="min-w-140px"> {{ __('admin.type') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($compalint_task as $complaint)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{$complaint->user->img ? asset('Attachments/users/'.$complaint->user->img) : asset('Attachments/users/1.png') }}" alt="user" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $complaint->user->name }}</span>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $complaint->user->job_title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $complaint->title }}</span>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $complaint->id }}">Read</button>
                                            @include('backend.admin.complaints.seemore')

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">

                                             <a href="{{ route('task-details', $complaint->task_id) }}"><span class="badge badge-light-warning">Task Complaint</span></a>


                                        </div>
                                    </div>
                                </td>


                            </tr>

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
