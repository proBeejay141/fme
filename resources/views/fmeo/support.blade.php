@extends('voyager::master')
@section('css')

    <link href="{{url('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    {{--<link href="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">--}}
    <link href="{{url('vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">
    <!-- Vendor CSS -->


    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{url('css/app.min.1.css')}}" rel="stylesheet">
    <link href="{{url('css/app.min.2.css')}}" rel="stylesheet">
    <link href="{{url('css/main.css')}}" rel="stylesheet">
@endsection


@section('page_header')
    <h3 class="page-title">

       Suppory


    </h3>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card clearfix admin" id="messages">
            <div class="ms-menu">
                <div class="ms-user clearfix palette-Teal-400 bg">
                    <div>Users</div>
                </div>

                <div class="list-group lg-alt m-t-10">
                    @if(count($users)>0)
                    @foreach($users as $user)
                        <a class="list-group-item media user" data-url="{{route('admin.get-message',$user->id)}}" data-id="{{$user->id}}" href="#">
                            <div class="media-body">
                                <div class="lgi-heading">{{$user->name}}</div>
                                <small class="lgi-text">{{$user->email}}</small>
                            </div>
                        </a>
                    @endforeach
                    @else
                        <div><h3>No Complain</h3></div>
                    @endif

                    {{--<a class="list-group-item media user" data-id="1" href="#">--}}
                        {{--<div class="media-body">--}}
                            {{--<div class="lgi-heading">Davil Parnell</div>--}}
                            {{--<small class="lgi-text">bjbeejay141@gmail.com</small>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                </div>

            </div>

            <div class="ms-body">
                <div class="action-header clearfix palette-Teal-400 bg">
                    <div class="ah-label hidden-xs palette-White text">Conversation</div>
                    <div class="menu-collapse visible-xs" data-ma-action="message-toggle">
                        <div class="mc-wrap">
                            <div class="mcw-line top palette-White bg"></div>
                            <div class="mcw-line center palette-White bg"></div>
                            <div class="mcw-line bottom palette-White bg"></div>
                        </div>
                    </div>
                </div>
               <div class="list-group lg-alt" id="_target">


                </div>

            </div>
        </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{--<script src="{{url('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/moment/min/moment.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>--}}
    <script src="{{url('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>

    <script src="{{url('js/functions.js')}}"></script>
    <script src="{{url('js/actions.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    <script>
        var token = "{{Session::token()}}";
    </script>

@endsection