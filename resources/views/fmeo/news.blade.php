@extends('voyager::master')
@section('css')

@endsection


@section('page_header')
    <h3 class="page-title">

            NEWS

    </h3>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3>Add News</h3>
                        <form action="{{route('admin.post-news')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" required >
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="ready_gh" class="col-md-4 control-label">Content</label>

                                <div class="col-md-6">
                                    <textarea id="ready_gh"  class="form-control" name="message" required></textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr style="margin-bottom: 5px">
                @if(count($news)>0)
                @foreach($news as $new)
                    <div class="row" style="border: 1px dashed;">
                        <div class="col-md-6">
                            <dl>
                                <dt>Created At</dt>
                                <dd>{{$new->created_at}}</dd>
                            </dl>
                            <dl>
                                <dt>Title</dt>
                                <dd>{{$new->title}}</dd>
                            </dl>
                            <dl>
                                <dt>Content</dt>
                                <dd>{{$new->message}}</dd>
                            </dl>
                            <a class="btn-sm btn-info pull-right edit" href="{{route('admin.delete-news',$new->id)}}">
                                <i class="voyager-trash"></i> delete
                            </a>

                        </div>

                    </div>
                    <hr>
                @endforeach
                @else
                    <div class="row">
                        <h2>No News</h2>
                    </div>
                 @endif

            </div>
        </div>
    </div>




@endsection

@section('javascript')


@endsection


