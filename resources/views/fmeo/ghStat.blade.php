@extends('voyager::master')
@section('css')


@endsection


@section('page_header')
    <h3 class="page-title">

        @include('fmeo.statNav')


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
                        <th>Order Type</th>
                        <th>Amount</th>
                        <th>Balance</th>
                        <th>Priority</th>
                        <th>Matches</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders))
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F jS, Y h:i A') }}</td>
                                <td>{{$order->order_type}}</td>
                                <td>{{$order->amount}}</td>
                                <td>{{$order->balance}}</td>
                                <td>{{$order->priority}}</td>
                                <td><a href="{{route('admin.get-ghMatch',$order->id)}}">{{count($order->matches())}}</a></td>
                                <td>{{$order->status}}</td>

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