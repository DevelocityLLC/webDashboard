
<title>@yield('title')</title>
<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Keenthemes | Metronic" />
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->

<link href="{{ asset('assets/plugins/global/plugins.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.dark.bundle.css')}}" rel="stylesheet" type="text/css" />

    @if( App::getLocale() == 'en' )
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style_en.css')}}" rel="stylesheet" type="text/css" />

    @else
        <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <style>


            div.dataTables_wrapper {
                direction: rtl;
            }
            th, td { white-space: nowrap; }
            div.dataTables_wrapper {
                margin: 0 auto;
            }

    </style>


    @endif

	
	<!--end::Global Stylesheets Bundle-->

	@yield('style')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

