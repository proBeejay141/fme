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
                <th>Amount</th>
                <th>For</th>
                </tr>
                </thead>
                <tbody>
                @if(count($bonuses))
                @foreach($bonuses as $bonus)
                <tr>
                <td>{{$bonus->id}}</td>
                <td>{{ \Carbon\Carbon::parse($bonus->created_at)->format('F jS, Y h:i A') }}</td>
                <td>{{$bonus->amount}}</td>
                <td>{{$bonus->for}}</td>
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


@endsection