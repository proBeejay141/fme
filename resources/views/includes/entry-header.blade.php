<header id="header" class="media">
    <div class="pull-left h-logo">
        {{--<a class=".z-depth-1-bottom" href="{{route('index')}}" ><i>I</i>'Conquer</a>--}}

        {{--<div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">--}}
            {{--<div class="mc-wrap">--}}
                {{--<div class="mcw-line top palette-White bg"></div>--}}
                {{--<div class="mcw-line center palette-White bg"></div>--}}
                {{--<div class="mcw-line bottom palette-White bg"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
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
                <a data-toggle="dropdown" href="#">
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

