
@extends('layouts.auth-layout')

@section('title')
    GH History
@endsection

@section('style')
    <link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">
    {{--<link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div id="main">

        <div class="container"  id="dash-header">
            <h2>Get Help History</h2>
        </div>

        <div class="panel-group history" role="tablist" aria-multiselectable="true">
            @if(count($orders)>0)
                @foreach($orders as $order)

                    <div class="card dash-card z-depth-2">
                                <div class="card-body card-padding" >
                                    <div class="panel panel-collapse">
                                        <div class="panel-heading pan-gh" role="tab" id="heading{{$order->id}}" >
                                            <h4 class="panel-title" >
                                                <a class="collapsed"  data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}">
                                                    <div class="col-md-2 mid"> <span>Order:</span> Provide Help </div>
                                                    <div class="col-md-2 mid"><span>Amount:</span> ₦{{$order->amount}}</div>
                                                    <div class="col-md-2 mid"><span>Balance:</span> ₦{{$order->balance}}</div>
                                                    <div class="col-md-2 mid"><span>Created on:</span> {{str_split($order->created_at,10)[0]}}</div>
                                                    <div class="col-md-2"><span>Status:</span> {{$order->status}}</div>

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$order->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$order->id}}" aria-expanded="false">
                                            <div class="panel-body">
                                                @if(count($order->matches())>0)
                                                    @foreach($order->matches() as $match)

                                                        <div class="card">
                                                            <div class="container">
                                                                <div class="col-md-2">
                                                                    <span>Created on:</span>
                                                                    <h4>{{str_split($match->created_at,16)[0]}}</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Match:</span>
                                                                    <h4>{{$match->ph_username}}</h4>
                                                                    <button class="btn btn-default waves-effect show_detail" data-match="{{$match->phUser_id}}" data-order="gh" data-target="#showDetail" data-toggle="modal"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i>Details</button>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Remaining Time:</span>
                                                                    @if($match->status == 'unconfirmed' && $match->timeOut())
                                                                        <h4 class="tmr" data-time="{{$match->timeOut()}}" data-idty = "{{$match->id}}" id="timer{{$match->id}}" style="background-color: white;color: red; max-width:130px">0H:24M:3S</h4>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Amount:</span>
                                                                    <h4>₦{{$match->amount}}</h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Confirmation:</span>
                                                                    @if($match->confirm)

                                                                        <div style="width: 40px; height: 40px;" class="lightbox clearfix">
                                                                            <div data-src="{{route('get.img',[$match->confirm])}}">
                                                                                <div class="lightbox-item">
                                                                                    <img src="{{route('get.img',[$match->confirm_thumb])}}" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <h4 style="background-color: white;color: blue;/* max-width:100px */">No Upload Yet</h4>
                                                                    @endif
                                                                    @if($match->status != 'confirmed')
                                                                        <button class="btn btn-default waves-effect comfirm_payment" data-match="{{$match->id}}" data-toggle="modal" data-target="#confirm_payment" style="background-color: gold;font-weight: 600;"><i class="zmdi zmdi-badge-check zmdi-hc-fw"></i>Confirm Payment</button>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Status:</span>
                                                                    <h4>{{$match->status}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @else

                                                    <div class="card">
                                                        <div class="container" style="text-align: center">
                                                            <h3 style="color: #81a0ab">No Matches Yet</h3>
                                                        </div>
                                                    </div>

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                @endforeach
            @else
                <div class="card">
                    <div class="container" style="text-align: center">
                        <h3 style="color: #81a0ab">You doesn't have any Completed Get Help order yet.</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('modals')
    <div class="modal fade" data-modal-color="bluegray" id="showDetail" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog edited-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Matched Member Details</h4>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-body">
                            <div class="lb-body">
                                <div id="_target" style="text-align: center">
                                    <div class="preloader pl-lg pls-white">
                                        <svg class="pl-circular" viewBox="25 25 50 50">
                                            <circle class="plc-path" cx="50" cy="50" r="20"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect z-depth-2-bottom" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{url('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
    {{--<script src="{{url('vendors/fileinput/fileinput.min.js')}}"></script>--}}
    {{--<script src="{{url('js/timer.js')}}"></script>--}}
    <script type="text/javascript">

    var token = '{{Session::token()}}';
    var _url = "{{route('get_match_detail')}}";

    </script>
@endsection