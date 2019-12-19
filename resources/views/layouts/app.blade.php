<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="assets/images/favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('backend/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">

    <script src="{{ asset('backend/assets/js/jquery-1.11.3.min.js') }}"></script>

    <!--[if lt IE 9]><script src="{{ asset('backend/assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body page-fade">
    <div class="page-container">
        @if(Request::is('admin*'))
            @include('layouts.partial.sidebar')
        @endif
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/rickshaw/rickshaw.min.css') }}">
    <link rel="stylesheet" href="{{asset('backend/assets/js/datatables/datatables.css')}}">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <!-- Bottom scripts (common) -->
    <script src="{{ asset('backend/assets/js/slugify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/speakingurl.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/assets/js/joinable.js') }}"></script>
    <script src="{{ asset('backend/assets/js/resizeable.js') }}"></script>
    <script src="{{ asset('backend/assets/js/neon-api.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ asset('backend/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/rickshaw/vendor/d3.v3.js') }}"></script>
    <script src="{{ asset('backend/assets/js/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/toastr.js') }}"></script>
    <script src="{{ asset('backend/assets/js/neon-chat.js') }}"></script>

            <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('backend/assets/js/neon-custom.js') }}"></script>

    <!-- Demo Settings -->
    <script src="{{ asset('backend/assets/js/neon-demo.js') }}"></script>

</body>
</html>
