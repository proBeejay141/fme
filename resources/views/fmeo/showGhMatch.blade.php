@extends('voyager::master')
@section('css')

@endsection


@section('page_header')
    <h3 class="page-title">

       GH MATCH


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


