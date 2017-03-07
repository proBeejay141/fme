@extends('voyager::master')
@section('css')
    <link href="{{url('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">
    <!-- Vendor CSS -->
    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{url('css/app.min.1.css')}}" rel="stylesheet">
    <link href="{{url('css/app.min.2.css')}}" rel="stylesheet">
    <link href="{{url('css/main.css')}}" rel="stylesheet">
@endsection


@section('page_header')
    <h1 class="page-title">

    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">

        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{url('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{url('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>
@endsection