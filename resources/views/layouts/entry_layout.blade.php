<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Vendor CSS -->
    <link href="{{url('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">
    <!-- Vendor CSS -->

{{--page style--}}
@yield('style')

<!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{url('css/app.min.1.css')}}" rel="stylesheet">
    <link href="{{url('css/app.min.2.css')}}" rel="stylesheet">
    <link href="{{url('css/main.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body data-ma-header="teal">

@yield('header')


@yield('content')


@yield('footer')

<!-- Page Loader -->
<div class="page-loader palette-Teal bg">
    <div class="preloader pl-xl pls-white">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20"/>
        </svg>
    </div>
</div>

<!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1 class="c-white">Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="img/browsers/chrome.png" alt="">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="img/browsers/firefox.png" alt="">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="img/browsers/opera.png" alt="">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="img/browsers/safari.png" alt="">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="img/browsers/ie.png" alt="">
                    <div>IE (New)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<script src="{{url('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{url('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
<script src="{{url('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="{{url('vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js')}}"></script>
<![endif]-->

@yield('script')

<script src="{{url('js/functions.js')}}"></script>
<script src="{{url('js/actions.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>

</body>
</html>
