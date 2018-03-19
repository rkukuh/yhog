<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">

        @stack('header-scripts')

        <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/AdminLTE.min.css') }}">

        @role('admin')
        <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/skins/skin-red.min.css') }}">
        @endrole

        @role('editor')
        <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/skins/skin-green.min.css') }}">
        @endrole

        <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        <style>
            section.content .form { border-left: 1px solid #eee; }
            .box-body > .alert { margin-bottom: -10px; }
        </style>
    </head>

    @role('admin')
    <body class="hold-transition skin-red sidebar-mini">
    @endrole

    @role('editor')
    <body class="hold-transition skin-green sidebar-mini">
    @endrole

        <div class="wrapper">

            @include('admin.layouts._header')

            @include('admin.layouts._sidebar')

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('content-title')
                    </h1>
                </section>

                @include('admin.layouts._alert')

                @if ( ! isset($custom_content) )

                    @if ( ! isset($content_alt) )
                        @include('admin.layouts._content')
                    @else
                        @include('admin.layouts._content-and-form')
                    @endif

                @else
                    @yield('backend.custom-content')
                @endif
            </div>

            @include('admin.layouts._footer')

        </div>

        <script src="{{ asset('assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>

        <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>

        @stack('footer-scripts')

        <script src="{{ asset('js/common.js') }}"></script>
    </body>
</html>
