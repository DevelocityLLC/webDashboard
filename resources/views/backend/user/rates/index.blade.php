@extends('layouts.master')

 @section('title')
   {{ __('admin.rates') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.rates') }}</h6>

    </div>





    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.task') }}</th>
                   <th class="min-w-150px">{{ __('admin.branch') }}</th>
                   <th class="min-w-140px">{{ __('admin.section') }}</th>
                   <th class="min-w-130px">{{ __('admin.admin') }}</th>
                   <th class="min-w-120px">{{ __('admin.rate') }}</th>
                   <th class="min-w-110px">{{ __('admin.desc') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($tasks_rates as $task)
                <tr>

                    <td></td>
                    <td>{{ $task->title}}</td>
                    <td>{{ $task->branch->name }}</td>
                    <td>
                        @foreach ($task->sections as $section)
                          <h5><span class="badge badge-info" >{{ $section->name}}</span><h5>
                        @endforeach
                    </td>
                    <td>{{ $task->admin->name }}</td>
                    <td>
                        <h5><span class="badge badge-info" >{{ $task->pivot->rate }}</span><h5>
                    </td>

                    <td>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $task->id }}">{{ __('admin.read_more') }}</button>
                        @include('backend.user.rates.seemore')

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
