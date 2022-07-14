<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr'  }}" direction="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}" style="direction : {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }} ">
	<!--begin::Head-->
	<head>
        <base href="">
        @include('layouts.backend.head')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					   @include('layouts.backend.brand')
					<!--end::Brand-->
					<!--begin::Aside menu-->
				          @include('layouts.backend.sidebar')
					<!--end::Aside menu-->

				</div>
				<!--end::Aside-->



				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					  @include('layouts.backend.header')
					<!--end::Header-->


					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('content')

					</div>
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

		<!--end::Modals-->
		 @include('layouts.backend.script')

	</body>
	<!--end::Body-->
</html>
