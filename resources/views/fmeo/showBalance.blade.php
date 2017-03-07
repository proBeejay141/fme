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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.post-balance')}}">
                    {{ csrf_field() }}

                    <input name="id" type="hidden" value="{{$balance->id}}" >

                    <div class="form-group{{ $errors->has('confirmed_ph') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Confirmed Provided Help</label>

                        <div class="col-md-6">
                            <input id="name" type="number" class="form-control" name="confirmed_ph" value="{{ $balance->confirmed_ph }}" required >
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('ready_gh') ? ' has-error' : '' }}">
                        <label for="ready_gh" class="col-md-4 control-label">Ready For Get</label>

                        <div class="col-md-6">
                            <input id="ready_gh" type="number" class="form-control" name="ready_gh" value="{{ $balance->ready_gh }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('bonus') ? ' has-error' : '' }}">
                        <label for="bonus" class="col-md-4 control-label">Bonuses</label>

                        <div class="col-md-6">
                            <input id="bonus" type="number" class="form-control" name="bonus" value="{{$balance->bonus}}" required>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection