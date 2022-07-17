@php
    if(auth('admin')->check()){

        $task_notifications = auth('admin')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\TaskStatus')
                                ->orderBy('created_at','DESC')->limit(50)->get();
        $req_notifications  = auth('admin')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\AddRequirement')
                                ->orderBy('created_at','DESC')->limit(50)->get();

    }else{

        $task_notifications = auth('user')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\AddTask')
                                ->orderBy('created_at','DESC')->limit(50)->get();
        $req_notifications  = auth('user')
                                ->user()
                                ->notifications()
                                ->where('type', 'App\Notifications\ChangStatusRequirement')
                                ->orderBy('created_at','DESC')->limit(50)->get();

    }

@endphp
 <!--begin::Info-->
 <div class="flex-grow-1 me-2">
    <!--begin::Username-->
      @if(auth('admin')->check())
      <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ auth('admin')->user()->name }}</a>
      <span class="text-gray-600 fw-bold d-block fs-8 mb-1"> Admin </span>
      @elseif (auth('user')->check())
      <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ auth('user')->user()->name }}</a>
      <span class="text-gray-600 fw-bold d-block fs-8 mb-1">Python Dev</span>
      @endif

    <div class="d-flex align-items-center text-success fs-9">
    <span class="bullet bullet-dot bg-success me-1"></span>online</div>
    <!--end::Label-->
</div>
<!--end::Info-->


<!--begin::User menu-->
<div class="me-n2">
    <!--begin::Action-->
    <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
        <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
                <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                @if (auth('admin')->check())
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{ auth('admin')->user()->img ? asset('Attachments/admins/'.auth('admin')->user()->img) : asset('Attachments/admins/1.png') }}" />
                    </div>
                @else
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ auth('user')->user()->img ? asset('Attachments/users/'.auth('user')->user()->img) : asset('Attachments/users/1.png') }}" />
                </div>
                @endif

                <!--end::Avatar-->
                <!--begin::Username-->
                 @if(auth('admin')->check())
                    <div class="d-flex flex-column">
                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth('admin')->user()->name }}
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Owner</span></div>
                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth('admin')->user()->email }}</a>
                    </div>
                 @elseif(auth('user')->check())
                    <div class="d-flex flex-column">
                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth('user')->user()->name }}
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth('user')->user()->email }}</a>
                    </div>
                 @endif
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <!--begin::Menu item-->
        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('admin.Language') }}
            </a>

            <div class="menu-sub menu-sub-dropdown w-175px py-4">



                    <div class="btn-group mb-5">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <button type="button" class="btn btn-light btn-sm"  aria-haspopup="true" aria-expanded="false" style="position: relative;width:74px;height:34px">
                                @if (App::getLocale() == 'en')
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" style="position: absolute;top:0;left:0;width:100%;height:100%;line-height:34px">
                                        {{ $properties['native'] }}
                                    </a>
                                @else
                                    <a  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" style="position: absolute;top:0;left:0;width:100%;height:100%;line-height:34px">
                                        {{ $properties['native'] }}
                                    </a>
                                @endif
                            </button>
                        @endforeach
                    </div>


            </div>

        </div>

        {{-- notification --}}
        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('admin.Notifications') }}
            </a>

            <!--begin::Notifications-->
            <div class="d-flex align-items-center ms-1 ms-lg-3">
                <!--begin::Menu- wrapper-->
               
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                    <!--begin::Heading-->
                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('assets/media/misc/pattern-1.jpg') }}')">
                        <!--begin::Title-->
                        <h3 class="text-white fw-bold px-9 mt-10 mb-6">{{ __('admin.notifications') }}
                        <span class="fs-8 opacity-75 ps-3"> {{ __('admin.num_unread_notif') }} :
                             @if (auth('admin')->check())
                             {{ auth('admin')->user()->unreadNotifications->count() }}
                             @else
                             {{ auth('user')->user()->unreadNotifications->count() }}
                             @endif
                        </span></h3>
                        <div class="d-flex">
                            <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                    href="{{ route('MarkAsRead_all') }}"> {{ __('admin.set_read_all') }} </a></span>
                        </div>


                        <!--end::Title-->
                        <!--begin::Tabs-->
                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                            <li class="nav-item">
                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_1">{{ __('admin.tasks') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_2"> {{ __('admin.requirements') }} </a>
                            </li>

                        </ul>
                        <!--end::Tabs-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab panel-->
                        <div class="tab-pane show active" id="kt_topbar_notifications_1" role="tabpanel">

                            <x-notifications :tasknotifications="$task_notifications" :reqnotifications="null"/>

                        </div>
                        <div class="tab-pane fade" id="kt_topbar_notifications_2" role="tabpanel">
                            <x-notifications :tasknotifications="null" :reqnotifications="$req_notifications"/>
                        </div>


                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Menu-->
                <!--end::Menu wrapper-->
            </div>
            <!--end::Notifications-->

        </div>

        @if (auth('admin')->check())
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a class="menu-link px-5" href="{{ route('logout-admin') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>{{ __('admin.signout') }}
                </a>
                <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>


        @elseif (auth('user')->check())

        <div class="menu-item px-5">
            <a class="menu-link px-5" href="{{ route('profile.edit') }}">{{ __('admin.edit_profile') }}
                         </a>
            <a class="menu-link px-5" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>{{ __('admin.signout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>


        </div>



        @endif

        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <div class="menu-content px-5">
                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="#" onchange="checkboxchange()"/>
                    <span class="pulse-ring ms-n1"></span>
                    <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                </label>
            </div>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::User account menu-->
    <!--end::Action-->
</div>

<!--end::User menu-->
