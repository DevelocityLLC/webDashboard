@extends('layouts.backend.master')

@section('title')
Perfect Employee
@endsection


@section('style')

@endsection




@section('content')
<br><br><br>
<!--begin::Team-->
<div class="mb-40">
    <!--begin::Heading-->
    <div class="text-center mb-17">
        <!--begin::Title-->
        <h3 class="fs-2hx text-dark mb-5">Our Great Team</h3>
        <!--end::Title-->
        <!--begin::Sub-title-->
        <div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer to complete, additional costs to
        <br />integrate and test each extra feature creeps up and haunts most of us.</div>
        <!--end::Sub-title=-->
    </div>
    <!--end::Heading-->
    <!--begin::Wrapper-->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">
        <!--begin::Item-->

         @foreach ($users as $user)
            <div class="col text-center mb-9">
                <!--begin::Photo-->
                <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('Attachments/users/'.$user->img) }}')"></div>
                <!--end::Photo-->
                <!--begin::Person-->
                <div class="mb-0">
                    <!--begin::Name-->
                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{ $user->name }}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="text-muted fs-6 fw-bold">{{ $user->job_desc }} <br>

                        <span class="text-muted fw-bolder text-hover-primary fs-7">{{ $user->kpis }}</span><br>

                    </div>



                    <!--begin::Position-->
                </div>
                <!--end::Person-->
            </div>

         @endforeach

        <!--end::Item-->

        <!--end::Item-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Team-->



@endsection



@section('script')

@endsection
