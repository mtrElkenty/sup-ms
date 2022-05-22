<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css') }}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/charts/chartist.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app-lite.css') }}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/dashboard-ecommerce.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    @if (!Auth::guest())
        @include('layout.navbar')
        @include('layout.sidebar')

        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                @yield('content')
            </div>
        </div>
        @include('layout.footer')
    @else
        @yield('content')
    @endif

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{ asset('js/core/app-menu-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/app-lite.js') }}" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script src=" {{ asset('js/script.js') }} "></script>
</body>

</html>
