@extends('layouts.master')

 @section('title')

 Requirement details

 @endsection

 @section('style')

 @endsection


 @section('content')



    <div class="card shadow mb-4">




        <div class="card-body table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" style="text-align:center">


                <tbody>





                    <tr class="fw-bolder text-muted">
                        <th scope="row"> {{ __('admin.name') }} </th>
                        <th scope="row"> {{ __('admin.price')}} </th>
                        <th scope="row"> {{ __('admin.task') }} </th>
                        <th scope="row"> {{ __('admin.user') }} </th>

                    </tr>


                    <tr class="table-warning" class="table-warning">
                        <td>{{ $requirement->name}}</td>
                        <td>{{ $requirement->price}}</td>
                        <td>{{ $requirement->task->title}}</td>
                        <td>{{ $requirement->user->name}}</td>

                    </tr>





                    <tr class="fw-bolder text-muted">

                        <th scope="row"> {{ __('admin.admin') }} </th>
                        <th scope="row"> {{ __('admin.status') }} </th>
                        <th scope="row"> {{ __('admin.change_status') }} </th>
                    </tr>

                    <tr class="table-warning" class="table-warning">

                        <td>{{ $requirement->admin->admin_name}}</td>
                        @if ( $requirement->status == 'approve')
                            <td><span
                                    class="badge badge-pill badge-success">{{ $requirement->status }}</span>
                            </td>
                        @elseif ($requirement->status == 'rejected')

                            <td><span
                                class="badge badge-pill badge-danger">{{ $requirement->status }}</span>
                            </td>
                        @else
                            <td><span
                                class="badge badge-pill badge-warning">{{ $requirement->status }}</span>
                            </td>

                        @endif

                        <td>
                            <button type="button" class="btn btn-primary  btn-sm" title="تعديل" data-bs-toggle="modal"
                          data-bs-target="#Edit{{ $requirement->id }}"><i class="fa fa-edit"></i>
                        </button>
                        </td>
                        @include('backend.admin.requirements.edit')
                    </tr>















                </tbody>










            </table>
        </div>




 </div>




 @endsection



 @section('js')

 @endsection
