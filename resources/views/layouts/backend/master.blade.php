<!DOCTYPE html>

<html @if(App::getLocale() == 'ar') {{"dir=rtl"}} @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="">
		 @include('layouts.backend.head')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
			       @include('layouts.backend.sidebar')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
                         @include('layouts.backend.header')
					<!--end::Header-->
					<!--begin::Content-->
					  @yield('content')
					<!--end::Content-->
					<!--begin::Footer-->
					   @include('layouts.backend.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->




        @include('layouts.backend.script')


		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
