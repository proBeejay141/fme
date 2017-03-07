@extends('voyager::master')
@section('css')

    {{--<link href="{{url('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">--}}
    {{--<!-- Vendor CSS -->--}}


    {{--<link href="/css/app.css" rel="stylesheet">--}}
    {{--<link href="{{url('css/app.min.1.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('css/app.min.2.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('css/main.css')}}" rel="stylesheet">--}}
@endsection


@section('page_header')
    <h3 class="page-title">

            PH MATCH

    </h3>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                @if(count($matches)>0)
                @foreach($matches as $match)
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>Created At</dt>
                                <dd>{{$match->created_at}}</dd>
                            </dl>
                            <dl>
                                <dt>Amount</dt>
                                <dd>{{$match->amount}}</dd>
                            </dl>
                            <dl>
                                <dt>Status</dt>
                                <dd>{{$match->status}}</dd>
                            </dl>

                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Account Name</dt>
                                <dd>{{$match->getUser($match->ghUser_id)->bank->acct_name}}</dd>
                            </dl>
                            <dl>
                                <dt>Account Number</dt>
                                <dd>{{$match->getUser($match->ghUser_id)->bank->acct_number}}</dd>
                            </dl>
                            <dl>
                                <dt>Account Name</dt>
                                <dd>{{$match->getUser($match->ghUser_id)->bank->bank_name}}</dd>
                            </dl>
                            <dl>
                                <dt>Email</dt>
                                <dd>{{$match->getUser($match->ghUser_id)->email}}</dd>
                            </dl>
                            <dl>
                                <dt>Phone</dt>
                                <dd>{{$match->getUser($match->ghUser_id)->phone}}</dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @else
                    <div class="row">
                        <h2>No Matches</h2>
                    </div>
                 @endif

            </div>
        </div>
    </div>




@endsection

@section('javascript')


@endsection


