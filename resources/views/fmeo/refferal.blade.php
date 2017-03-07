@extends('voyager::master')
@section('css')


@endsection


@section('page_header')
    <h3 class="page-title">

        @include('fmeo.nav')


    </h3>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">

                <table id="dataTable" class="table table-hover">
                <thead>
                <tr>
                <th>ID</th>
                <th>Created At</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($refferal))
                @foreach($refferal as $ref)
                <tr>
                <td>{{$ref->id}}</td>
                <td>{{ \Carbon\Carbon::parse($ref->created_at)->format('F jS, Y h:i A') }}</td>
                <td>{{$ref->name}}</td>
                <td>{{$ref->email}}</td>
                <td>{{$ref->refferalAct($ref->id)}}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{--<script src="{{url('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/moment/min/moment.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>--}}

    {{--<script src="{{url('js/functions.js')}}"></script>--}}
    {{--<script src="{{url('js/actions.js')}}"></script>--}}
    {{--<script src="{{url('js/main.js')}}"></script>--}}

@endsection