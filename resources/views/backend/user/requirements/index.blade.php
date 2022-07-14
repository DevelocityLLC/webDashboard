@extends('layouts.master')

 @section('title')
  {{ __('admin.requirements') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.requirements') }}</h6>
        <div class="ml-auto">
            <a href="{{ route('requirements.create') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_requirement') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.name') }}</th>
                   <th class="min-w-140px">{{ __('admin.price') }}</th>
                   <th class="min-w-140px">{{ __('admin.task') }}</th>
                   <th class="min-w-120px">{{ __('admin.status') }}</th>

                   <th class="min-w-90px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($requirements as $requirement)
                <tr>

                    <td></td>

                    <td>{{ $requirement->name }}</td>
                    <td>{{ $requirement->price }}</td>
                    <td>{{ $requirement->task->title }}</td>


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
                        <div class="btn-group">
                            <a href="{{ route('requirements.edit' , $requirement->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>


                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $requirement->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.user.requirements.delete')
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
