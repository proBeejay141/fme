
@extends('layouts.auth-layout')

@section('title')
    Messages | Tickests
@endsection

@section('style')
    {{--<link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div id="main">

        <div class="container"  id="dash-header">
            <h2>Messages and Complains</h2>
        </div>


            <div class="card clearfix" id="messages">
                <div class="ms-body user-message">
                    <div class="action-header clearfix palette-Teal-400 bg" style="background-color: #557976;">
                        <div class="ah-label palette-White text">Messages</div>

                        <ul class="actions a-alt">
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-time"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="list-group lg-alt">
                        @if(count(auth()->user()->messages)>0)
                            @foreach(auth()->user()->messages()->orderBy('created_at','asc')->get() as $mes)
                                @if($mes->receive_id !=auth()->user()->id)
                                    <div class="list-group-item media ">
                                        <div class="pull-left">
                                            <div class="avatar-char" style="background: #796955;color: burlywood;">ME</div>
                                        </div>

                                        <div class="media-body me">
                                            <div>
                                                <div class="msb-item">
                                                    {{$mes->message}}
                                                </div>
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> {{str_split($mes->created_at,10)[0]}} at {{str_split($mes->created_at,10)[1]}}</small>
                                        </div>
                                    </div>
                                @else
                                    <div class="list-group-item media ">
                                        <div class="pull-right">
                                            <div class="avatar-char" style="background-color: #557976;color: #ce9258;">AD</div>
                                        </div>
                                        <div class="media-body reply">
                                            <div>
                                                <div class="msb-item">
                                                   {{$mes->message}}
                                                </div>
                                            </div>

                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> {{str_split($mes->created_at,10)[0]}} at {{str_split($mes->created_at,10)[1]}}</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @else
                            <div class="card">
                                <div class="container" style="text-align: center">
                                    <h3 style="color: #81a0ab">No Messages</h3>
                                </div>
                            </div>
                        @endif



                    </div>
                    <form action="{{route('post.messages')}}" method="post">
                        {{csrf_field()}}
                        <div class="ms-reply">
                            <textarea name="message" placeholder="Write your complain here..."></textarea>

                            <button type="submit"><i class="zmdi zmdi-mail-send"></i></button>
                        </div>
                    </form>
                </div>
            </div>
    </div>

@endsection

@section('script')
    <script src="{{url('vendors/bower_components/moment/min/moment.min.js')}}"></script>

    {{--<script src="{{url('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/fileinput/fileinput.min.js')}}"></script>--}}
    {{--<script src="{{url('js/timer.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
    {{--//        new CreateTimer("tmr1", 82800);--}}
    {{--//        new CreateTimer("timer1", 2800);--}}
    {{--var token = '{{Session::token()}}';--}}
    {{--var _url = "{{route('get_match_detail')}}";--}}
    {{--$('.tmr').each(function () {--}}
    {{--$this = $(this);--}}
    {{--new CreateTimer($this.attr('id'),$this.data('time'));--}}
    {{--});--}}
    {{--</script>
    @section('script')
    --}}
@endsection