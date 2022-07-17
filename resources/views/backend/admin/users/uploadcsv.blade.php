@extends('layouts.master')

 @section('title')
  Add User
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Users </h6>
        <div class="ml-auto">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Users </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('users.importcvs') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <div class="row pt-4">

                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            File
                        </span>
                    </label>
                    <div >
                        <input type="file" name="file" class="form-control" >
                        <span class="form-text text-muted">file with should be csv</span>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

            </div>


            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>




 @endsection




