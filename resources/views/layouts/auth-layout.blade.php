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
    <link href="{{url('css/main.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body data-ma-header="teal">

<header id="header" class="media" style="position: fixed; width: 100%;">
    <div class="pull-left h-logo">
        <a class=".z-depth-1-bottom" href="{{route('index')}}" ><i>MS</i></a>

        <div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
        <div class="mc-wrap">
        <div class="mcw-line top palette-White bg"></div>
        <div class="mcw-line center palette-White bg"></div>
        <div class="mcw-line bottom palette-White bg"></div>
        </div>
        </div>
    </div>

    <ul class="pull-right h-menu">
        <li class="dropdown hm-profile">
            @if (Auth::guest())
                <div class="btn-group-demo">
                    <div class="btn-group" role="group">
                        <a class="btn btn-default .z-depth-4-bottom" href="{{ url('/login') }}"><i class="zmdi zmdi-check-circle zmdi-hc-fw"></i> Login</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a class="btn btn-default .z-depth-4-bottom" href="{{ url('/register') }}"><i class="zmdi zmdi-accounts-add zmdi-hc-fw"></i> Register</a>
                    </div>
                </div>
            @else
                <a data-toggle="dropdown" href="#" style="font-size: initial; margin-top: 6px;">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
            @endif
            <ul class="dropdown-menu pull-right dm-icon">
                <li>
                    <a href="profile-about.html"><i class="zmdi zmdi-account"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="zmdi zmdi-time-restore"></i> Logout</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>


<section class="main-container">

    <aside id="s-main-menu" class="sidebar" style="background-color: black;margin-top: 73px;position:fixed;">
        <div class="smm-header">
            <i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i>
        </div>

        <ul class="main-menu">

            <li >
                <a href="{{route('dash_index')}}"><i class="zmdi zmdi-widgets"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{route('get.ph-history')}}"><i class="zmdi zmdi-caret-right-circle zmdi-hc-fw"></i> PH History</a>
            </li>

            <li>
                <a href="{{route('get.gh-history')}}"><i class="zmdi zmdi-caret-left-circle zmdi-hc-fw"></i> GH History</a>
            </li>

            <li>
                <a href="{{route('profile')}}"><i class="zmdi zmdi-account-o zmdi-hc-fw"></i> My Profile</a>
            </li>

            <li>
                <a href="{{route('get.messages')}}"><i class="zmdi zmdi-inbox zmdi-hc-fw"></i>Messages | Tickets</a>
            </li>
            <li>
                <a href="{{route('get_bonus')}}"><i class="zmdi zmdi-accounts-add zmdi-hc-fw"></i> Bonus History</a>
            </li>
            <li>
                <a href="{{route('get_referral')}}"><i class="zmdi zmdi-accounts-add zmdi-hc-fw"></i> My Referrals</a>
            </li>

            <li>
                <a href="/"><i class="zmdi zmdi-view-list"></i> About</a>
            </li>
            <li>
                <a href="/"><i class="zmdi zmdi-collection-text"></i> Contact Us</a></li>
        </ul>
    </aside>

        <section id="content">
            <div class="container">

                @yield('content')

            </div>
        </section>



    @yield('footer')

    @yield('modals')
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

    <script src="{{url('js/functions.min.js')}}"></script>
    <script src="{{url('js/actions.min.js')}}"></script>
    <script src="{{url('js/main.min.js')}}"></script>

</body>
</html>
