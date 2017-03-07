
@extends('layouts.auth-layout')

@section('title')
    My Referrals
@endsection

@section('style')
    {{--<link href="{{url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div id="main">

        <div class="container"  id="dash-header">
            <h2>My Referrals</h2>
        </div>

        <div class="card">

            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Created At</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($refferal as $ref)
                        <tr>
                            <td> {{$loop->index+1}}</td>
                            <td>{{ \Carbon\Carbon::parse($ref->created_at)->format('F jS, Y h:i A') }}</td>
                            <td>{{$ref->name}}</td>
                            <td>{{$ref->email}}</td>
                            <td>{{$ref->refferalAct($ref->id)}}</td>
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