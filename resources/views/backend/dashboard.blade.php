@extends('layouts.backend.master')

@section('title')
 {{ __('admin.dashboard') }}
@endsection


@section('content')
    @if(auth('admin')->check())
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Row-->

                    {{-- tasks --}}

                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('tasks.index') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ $tasks }} </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('task_waiting') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_waiting }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('task_rejected') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ __('admin.rejected_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_rejected }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>

                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('task_approve') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.approve_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_approve }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('task_complete') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.completed_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_complete }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('task_edit') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ __('admin.edit_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{  $tasks_edit }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>

                    {{-- End tasks --}}

                    {{-- Requirements --}}
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('admin.requirements.index') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.requirements') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ $requiremnts }} </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('Requirements_waiting') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_requirements') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{  $requiremnts_waiting }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('Requirements_rejected') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.rejected_requirements') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $requiremnts_rejected }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                    </div>
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('Requirements_approve') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ __('admin.approved_requirements') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{  $requiremnts_approve }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                         {{-- complaints --}}
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('compalint_general') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.complaint_general') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $complaint_general }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('compalint_task') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ __('admin.complaint_task') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{  $complaint_task }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        {{-- end complaints --}}

                    </div>

                    {{-- End --}}


                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    @else


        @if(isset($latest_new) && $latest_new != '')
            <section class="latest_news">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sec_title">
                                <h2> {{ __('admin.latest_news') }}
                                    <a href="{{ route('users.news.index')}}"> {{ __('admin.more_news') }} </a>
                                </h2>
                            </div>
                        </div>
                        <div class="news">
                            <div class="col-12">
                                <div class="row news-data">
                                    <div class="col-md-6 news_image">
                                        <div class="image" style="height: 100%">
                                            <img src="{{ asset('Attachments/news/'. $latest_new->img) }}" width="100%" height="100%">
                                        </div>
                                    </div>
                                    <div class="col-md-6 grid_news_content">
                                        <div class="news_content">
                                            <div class="news_title">
                                                <a href="{{ route('users.news.show', $latest_new->id) }}">
                                                    <h2>
                                                        {{ $latest_new->title }}
                                                        <p>{{ $latest_new->created_at->diffForHumans()}}</p>

                                                    </h2>
                                                </a>
                                            </div>
                                            <div class="news_desc">
                                                <p>{!! Str::limit(strip_tags($latest_new->desc), $limit = 250, $end = '...') !!}</p>
                                                <a href="{{ route('users.news.show', $latest_new->id) }}" class="read-more-button">
                                                    @if( App::getLocale() == 'en' )
                                                        <i class="fa fa-arrow-circle-right" style="color: #e95a5a; margin-left:5px; float: right;"></i>
                                                    @else
                                                        <i class="fa fa-arrow-circle-left" style="color: #e95a5a; margin-left:5px"></i>
                                                    @endif
                                                    {{ __('admin.read_more') }}
                                                </a>
                                            </div>

                                            <span>{{ $latest_new->newsType->title }}</span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Row-->

                    {{-- tasks --}}

                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('tasks.index') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ $tasks }} </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('tasks.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_waiting }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('tasks.index') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.completed_tasks') }}</div>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $tasks_complete }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                    </div>

                    <div class="row g-5 g-xl-8">
           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ __('admin.waiting_requirements') }}</div>
                       <div class="fw-bold text-white"> {{ $requirement_waiting }} </div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.rejected_requirements') }} </div>
                       <div class="fw-bold text-white">{{ $requirement_rejected }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>

           <div class="col-xl-4">
               <!--begin::Statistics Widget 5-->
               <a href="{{ route('requirements.index') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                   <!--begin::Body-->
                   <div class="card-body">
                       <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                       <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                               <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                               <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                           </svg>
                       </span>
                       <!--end::Svg Icon-->
                       <div class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ __('admin.approved_requirements') }}</div>
                       <div class="fw-bold text-white">{{ $requirements_approve }}</div>
                   </div>
                   <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
           </div>
                    </div>

                    {{-- End tasks --}}


                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    @endif
@endsection
