@extends('layouts.backend.master')

@section('title')
requirements rejected
@endsection


@section('style')

@endsection




@section('content')

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1"> {{ __('admin.requirements') }}</span>
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
                            <th class="min-w-140px"> {{ __('admin.price') }}</th>
                            <th class="min-w-140px"> {{ __('admin.task') }}</th>
                            <th class="min-w-140px"> {{ __('admin.admin') }}</th>
                            <th class="min-w-140px"> {{ __('admin.status') }}</th>
                            <th class="min-w-120px">{{ __('admin.change_status') }}</th>
                            <th class="min-w-110px">{{ __('admin.created_at') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($requiremnts_rejected as $requirement)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{$requirement->user->img ? asset('Attachments/users/'.$requirement->user->img) : asset('Attachments/users/1.png') }}" alt="user" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $requirement->user->name }}</span>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $requirement->user->job_title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">${{ $requirement->price }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $requirement->task->title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{$requirement->admin->img ? asset('Attachments/admins/'.$requirement->admin->img) : asset('Attachments/admins/1.png') }}" alt="admin" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $requirement->admin->name }}</span>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $requirement->admin->job_title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">

                                              <span class="badge badge-light-danger">{{ $requirement->status }}</span>


                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary  btn-sm" title="تعديل" data-bs-toggle="modal"
                                    data-bs-target="#Edit{{ $requirement->id }}"><i class="fa fa-edit"></i>
                                    </button>
                                    @include('backend.admin.requirements.edit')
                                </td>
                                <td>{{ $requirement->created_at }}</td>


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
