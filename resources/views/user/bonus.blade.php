
@extends('layouts.auth-layout')

@section('title')
    My Bonuses
@endsection

@section('style')
    {{--<link href="{{url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div id="main">

        <div class="container"  id="dash-header">
            <h2>My Bonuses</h2>
        </div>

        <div class="card">

            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Bonus For</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bonuses as $bonus)
                        <tr>
                            <td> {{$loop->index+1}}</td>
                            <td>{{$bonus->created_at}}</td>
                            <td>{{$bonus->amount}}</td>
                            <td>{{$bonus->for}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection

@section('script')

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