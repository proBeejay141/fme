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
                        <th>Balance</th>
                        <th>Priority</th>
                        <th>Matches</th>
                        <th>Status</th>
                        <th>Deleted At</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($gh_orders))
                        @foreach($gh_orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F jS, Y h:i A') }}</td>
                                <td>{{$order->amount}}</td>
                                <td>{{$order->balance}}</td>
                                <td>{{$order->priority}}</td>
                                <td><a href="{{route('admin.get-ghMatch',$order->id)}}">{{count($order->matches())}}</a></td>
                                <td>{{$order->status}}</td>
                                <td>{{ \Carbon\Carbon::parse($order->deleted_at)->format('F jS, Y h:i A') }}</td>
                                <td class="no-sort no-click">

                                    <div class="btn-sm btn-danger pull-right delete" onclick="$('#inpId').attr('value',$(this).data('id'));$('#inpOpt').attr('value',$(this).data('role'));" data-toggle="modal" data-target="#modal-gh" data-role="delete" data-id="{{ $order->id }}">
                                        <i class="voyager-trash"></i> Delete
                                    </div>
                                    <div class="btn-sm btn-info pull-right edit" onclick="$('#inpId').attr('value',$(this).data('id'));$('#inpOpt').attr('value',$(this).data('role'));" data-toggle="modal" data-target="#modal-gh" data-role="switch" data-id="{{ $order->id }}">
                                        <i class="voyager-trash"></i> Switch Priority
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div id="modal-gh" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #00E676">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="trash-title" class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <form id="formgh" method="post" action="{{route('admin.post-gh')}}">
                        {{csrf_field()}}
                        <p>Are you sure?</p>
                        <input type="hidden" id="inpId" name="id">
                        <input type="hidden" id="inpOpt" name="opt">
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#formgh').submit();" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
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