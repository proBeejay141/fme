
@extends('layouts.auth-layout')

@section('title')
    Dashboard
@endsection

@section('style')
    <link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">
@endsection


@section('content')
    <div id="main">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container"  id="dash-header">
            <h2>Dashboard</h2>
        </div>
        <div class="card dash-card bs-item z-depth-3">
            <div class="card-body card-padding" style="padding:0;">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="
    min-height: 78px;
">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <div class="item active" id="first-news">
                            <div class="carousel-caption">
                                <h3>How it works:</h3>
                                <p>100% return in 48 hours after your donation has been confirmed, and you have 30 hours to make payment for PH order after which your account will be deleted if you fail to pay. 5% Referral bonus </p>
                            </div>
                        </div>
                        @foreach($news as $new)
                            <div class="item">
                                <div class="carousel-caption">
                                    <h3>{{$new->title}}:</h3>
                                    <p>{{$new->message}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <!-- Controls -->
                    {{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
                        {{--<span class="zmdi zmdi-chevron-left" aria-hidden="true"></span>--}}
                        {{--<span class="sr-only">Previous</span>--}}
                    {{--</a>--}}
                    {{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
                        {{--<span class="zmdi zmdi-chevron-right" aria-hidden="true"></span>--}}
                        {{--<span class="sr-only">Next</span>--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
        <div class="card dash-card z-depth-2">
            <div class="card-body card-padding" id="balance">
                <div class="row">
                    <div class="col-md-4" id="ph-bal">
                        <div class="bal-title" style="margin: 0 -10px;">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw"></i>
                            <h3>Confirmed PH</h3>
                        </div>
                        <span class="span-bal">₦{{auth()->user()->balance->confirmed_ph}}</span><br/>
                        <span class="span-hint">Your total confirmed donations</span>
                    </div>
                    <div class="col-md-4" id="gh-bal">
                        <div class="bal-title">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw"></i>
                            <h3>Ready for GH</h3>
                        </div>
                        <span class="span-bal">₦{{auth()->user()->balance->ready_gh}}</span><br/>
                        <span class="span-hint">Matured donations available for withdrawer</span>
                    </div>
                    <div class="col-md-4" id="bn-bal">
                        <div class="bal-title">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw"></i>
                            <h3>Bonus Bal</h3>
                        </div>
                        <span class="span-bal" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Your bonus will be added to your 'Get Help' balance once it amount to ₦5,000 or more.">₦{{auth()->user()->balance->bonus}}</span><br/>
                        <span class="span-hint">Accumulated bonuses</span>
                    </div>

                </div>
            </div>
        </div>
        {{--button ph and gh--}}
        <div class="row btn-row">
              <div class="col-md-5" >
                  @if(Voyager::setting('allowPh')=='1')
                    <button id="btn-ph" class="btn btn-primary btn-block waves-effect" style="background-color: #c5fd62;" data-toggle="modal" data-target="#modal_ph">Provide Help</button>
                  @endif
              </div>
              <div class="col-md-5 col-md-offset-2">
                  @if(Voyager::setting('allowGh')=='1')
                  <button id="btn-gh" class="btn btn-primary btn-block waves-effect" style="background-color: #fbca43;" data-toggle="modal" data-target="#modal_gh">Get Help</button>
                  @endif
              </div>
        </div>

        {{--div for GH and PH history--}}
        <div class="panel-group history" role="tablist" aria-multiselectable="true">
            @if(count($orders)>0)
                @foreach($orders as $order)
                    @if($order->status == 'In progress')
                        @if($order->order_type == 'ph')
                            <div class="card dash-card z-depth-2">
                                <div class="card-body card-padding">
                                    <div class="panel panel-collapse">
                                        <div class="panel-heading active pan-ph" role="tab" id="heading{{$order->id}}">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}" aria-expanded="true" aria-controls="collapse{{$order->id}}" class="">
                                                    <div class="col-md-2 mid"> <span>Order:</span> Provide Help </div>
                                                    <div class="col-md-2 mid"><span>Amount:</span> ₦{{$order->amount}}</div>
                                                    <div class="col-md-2 mid"><span>Balance:</span> ₦{{$order->balance}}</div>
                                                    <div class="col-md-2 mid"><span>Created on:</span> {{str_split($order->created_at,10)[0]}}</div>
                                                    <div class="col-md-2"><span>Status:</span> {{$order->status}}</div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$order->id}}" class="collapse in" role="tabpanel" aria-labelledby="heading{{$order->id}}" aria-expanded="true">
                                            <div class="panel-body">
                                                @if(count($order->matches())>0)
                                                    @foreach($order->matches() as $match)
                                                        <div class="card">
                                                            <div class="container">
                                                                <div class="col-md-2">
                                                                    <span>Created on:</span>
                                                                    <h4>{{str_split($match->created_at,16)[0]}}</h4>
                                                                </div>
                                                                <div class="col-md-2" style="padding:0;">
                                                                    <span>Match:</span>
                                                                    <h4>{{$match->gh_username}}</h4>
                                                                    <button class="btn btn-default waves-effect show_detail" data-match="{{$match->ghUser_id}}" data-toggle="modal" data-order="ph" data-target="#showDetail"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i>Bank Details</button>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Remaining Time:</span>
                                                                    @if($match->status == 'unconfirmed' && $match->timeOut())
                                                                        <h4 class="tmr" data-time="{{$match->timeOut()}}" data-idty = "{{$match->id}}" id="timer{{$match->id}}" style="background-color: white;color: red; max-width:130px">0H:24M:3S</h4>
                                                                     @elseif($match->status == 'unconfirmed' && !$match->timeOut())
                                                                    <h4 style="color: #ff0000">Will be removed soon</h4>
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
                                                                        <button class="btn btn-default waves-effect upload_payment" onclick="$('#match_id').attr('value','{{$match->id}}')"  data-toggle="modal" data-target="#upload_payment" data-order_id="1" style="background-color: gold;font-weight: 600;"><i class="zmdi zmdi-upload zmdi-hc-fw"></i>Payment Details</button>

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

                        @else
                            <div class="card dash-card z-depth-2">
                                <div class="card-body card-padding" >
                                    <div class="panel panel-collapse">
                                        <div class="panel-heading active pan-gh" role="tab" id="heading{{$order->id}}" >
                                            <h4 class="panel-title" >
                                                <a  data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}" aria-expanded="true" aria-controls="collapse{{$order->id}}">
                                                    <div class="col-md-2 mid"> <span>Order:</span> Provide Help </div>
                                                    <div class="col-md-2 mid"><span>Amount:</span> ₦{{$order->amount}}</div>
                                                    <div class="col-md-2 mid"><span>Balance:</span> ₦{{$order->balance}}</div>
                                                    <div class="col-md-2 mid"><span>Created on:</span> {{str_split($order->created_at,10)[0]}}</div>
                                                    <div class="col-md-2"><span>Status:</span> {{$order->status}}</div>

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$order->id}}" class="collapse in" role="tabpanel" aria-labelledby="heading{{$order->id}}" aria-expanded="false">
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
                                                             @elseif($match->status == 'unconfirmed' && !$match->timeOut())
                                                                            <h4 style="color: #ff0000">Will be removed soon</h4>
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
                                                            <button class="btn btn-default waves-effect comfirm_payment" onclick="$('#ghMatchConfirmId').attr('value','{{$match->id}}')" data-toggle="modal" data-target="#confirm_payment" style="background-color: gold;font-weight: 600;"><i class="zmdi zmdi-badge-check zmdi-hc-fw"></i>Confirm Payment</button>
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
                        @endif

                    @elseif($order->status == 'Completed')
                        @if($order->order_type == 'ph')
                            <div class="card dash-card z-depth-2">
                                <div class="card-body card-padding">
                                    <div class="panel panel-collapse">
                                        <div class="panel-heading pan-ph" role="tab" id="heading{{$order->id}}">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}" class="collapsed">
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
                                                                <div class="col-md-2" style="padding:0;">
                                                                    <span>Match:</span>
                                                                    <h4>{{$match->gh_username}}</h4>
                                                                    <button class="btn btn-default waves-effect show_detail" data-match="{{$match->ghUser_id}}" data-toggle="modal" data-order="ph" data-target="#showDetail"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i>Bank Details</button>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Remaining Time:</span>

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
                                                                        <h4>No Upload</h4>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Status:</span>
                                                                    <h4>{{$match->status}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @else
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
                        @endif
                    @endif
                        @break($loop->index>14)
                @endforeach
            @else
                <div class="card">
                    <div class="container" style="text-align: center">
                        <h3 style="color: #81a0ab">You doesn't have any order yet.</h3>
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
    <div class="modal fade"  data-modal-color="bluegray" id="upload_payment" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog edited-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">UPLOAD YOUR PAYMENT DETAILS</h4>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-body">
                            <div class="lb-body">
                                <div>Remember that uploading of fake teller details is a criminal (Fraud) offence.Pls united we stand.</div>
                                <form action="{{route('post.confirm')}}" id="formUploadConfirm" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input id="match_id" name="match" type="hidden">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                        <div>
                                    <span class="btn btn-info btn-file waves-effect">
                                        <span class="fileinput-new">Select teller</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="pic">
                                    </span>
                                            <a href="#" class="btn btn-danger fileinput-exists waves-effect" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#formUploadConfirm').submit();" class="btn btn-link waves-effect z-depth-2-bottom">Upload</button>
                    <button type="button" class="btn btn-link waves-effect z-depth-2-bottom" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade"  data-modal-color="bluegray" id="confirm_payment" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog edited-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm donation</h4>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-body">
                            <div class="lb-body">
                                <div class="container">
                                    <div class="col-md-12">
                                        <h4 style="color:#fff;"><span>Note:</span> Do not confirm the donation untill you actually receive a notification from your bank.</h4>
                                    </div>
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <div class="checkbox m-b-15">
                                            <label>
                                                <input id="chk_agree" onclick="if($(this).val() == 'no'){ $(this).attr('value','yes'); $('#btn-confirm').removeAttr('Disabled') ;}else {$(this).attr('value','no');  $('#btn-confirm').attr('Disabled','Disabled') ;}" type="checkbox" value="no">
                                                <i class="input-helper"></i>
                                                I confirmed the payment.
                                            </label>
                                        </div>
                                    </div>
                                    <form id="formGhConfirm" action="{{route('post.confirm-gh')}}" method="post">
                                        {{csrf_field()}}
                                        <input id="ghMatchConfirmId" type="hidden" name="match">
                                        <div class="col-md-12" style="padding-top:30px;">
                                            <div class="form-group fg-float">
                                                <div class="fg-line">
                                                    <input name="testimony" type="text" class="input-lg form-control fg-input">
                                                    <label class="fg-label" style="color: #fff;">Write Testimony</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-confirm" disabled onclick="$('#formGhConfirm').submit();"  type="button" class="btn btn-link waves-effect z-depth-2-bottom">I Comfirm</button>
                    <button  type="button" class="btn btn-link waves-effect z-depth-2-bottom" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade"  data-modal-color="bluegray" id="modal_ph" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog edited-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Provide help to a fellow member</h4>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-body">
                            <div class="lb-body">
                                <div class="container">
                                    <dl class="dl-horizontal">
                                        <form id="form_ph_order" action="{{route('post_ph_order')}}" method="post">
                                            {{csrf_field()}}
                                            <dt class="p-t-10">Choose Package</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select name="package" class="form-control" value="{{ old('package') }}" required>
                                                        <option value="classic">Classic:  ₦10,000 Return> ₦20,000</option>
                                                        <option value="premium">Premium:  ₦20,000 Return> ₦40,000</option>
                                                        <option value="ultimate">Ultimate:  ₦50,000 Return> ₦100,000</option>
                                                        <option value="booster">Booster:  ₦100,000 Return> ₦200,000</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </form>

                                    </dl>

                                    <div class="checkbox m-b-15">
                                        <label>
                                            <input id="chk_agree" onclick="if($(this).val() == 'no'){ $(this).attr('value','yes'); $('#next').removeAttr('Disabled') ;}else {$(this).attr('value','no');  $('#next').attr('Disabled','Disabled') ;}" type="checkbox" value="no">
                                            <i class="input-helper"></i>
                                            I agree to make a donation to another fellow I'Conquer member. and i fully understand all the risks. Note that once the order is created, <span style="color: orange;">it cannot be cancelled</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" onclick="$('#form_ph_order').submit();" id="next" disabled class="btn btn-link waves-effect z-depth-2-bottom">Done</button>
                    <button type="button" class="btn btn-link waves-effect z-depth-2-bottom" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade"  data-modal-color="bluegray" id="modal_gh" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog edited-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Request for help from a fellow member</h4>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-body">
                            <div class="lb-body">
                                <div class="container">
                                    <div class="pmbb-view">
                                        <form id="form_gh" action="{{route('post_gh_order')}}" method="post">
                                            {{csrf_field()}}
                                            <dl class="dl-horizontal">
                                                <dt style="width:190px;">Ready for Get Help Balance:</dt>
                                                <dd>₦{{auth()->user()->balance->ready_gh}}</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-t-10" style="width: 175px;">Get Help Request Amount:</dt>

                                                <dd>
                                                    <div class="fg-line" id="ghParen" style="width: 90%;">
                                                        <select data-balance="{{auth()->user()->balance->ready_gh}}" name="gh_amount" type="text" class="form-control">
                                                            <option value="10000">₦10,000</option>
                                                            <option value="20000">₦20,000</option>
                                                            <option value="40000">₦40,000</option>
                                                            <option value="50000">₦50,000</option>
                                                            <option value="100000">₦100,000</option>
                                                            <option value="200000">₦200,000</option>
                                                        </select>
                                                    </div>

                                                </dd>
                                            </dl>
                                        </form>

                                    </div>

                                </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id="btnGhDone" class="btn btn-link waves-effect z-depth-2-bottom">Done</button>
                    <button type="button" class="btn btn-link waves-effect z-depth-2-bottom" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
         </div>
    </div>
@endsection


@section('script')
    <script src="{{url('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{url('vendors/fileinput/fileinput.min.js')}}"></script>
    <script src="{{url('js/timer.min.js')}}"></script>
    <script type="text/javascript">
//        new CreateTimer("tmr1", 82800);
//        new CreateTimer("timer1", 2800);
    var token = '{{Session::token()}}';
    var _url = "{{route('get_match_detail')}}";
        $('.tmr').each(function () {
           $this = $(this);
            new CreateTimer($this.attr('id'),$this.data('time'));
        });
    </script>
@endsection