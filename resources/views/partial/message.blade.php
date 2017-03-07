<div class="list-group lg-alt">
    @foreach($mess as $mes)
        @if($mes->receive_id == $id )
            <div class="list-group-item media">
                <div class="pull-left">
                    <div class="avatar-char" style="background: #796955;color: burlywood;">ME</div>
                </div>

                <div class="media-body me" style="float: left;">
                    <div>
                        <div class="msb-item">
                            {{$mes->message}}
                        </div>
                    </div>
                    <small class="ms-date"><i class="zmdi zmdi-time"></i> {{str_split($mes->created_at,10)[0]}} at {{str_split($mes->created_at,10)[1]}}</small>
                </div>
            </div>
        @else
            <div class="list-group-item media">
                <div class="pull-right">
                    <div class="avatar-char" style="background-color: #557976;color: #ce9258;">U</div>
                </div>
                <div class="media-body reply" style="float: right;">
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

</div>

<form action="{{route('admin.post-messages')}}" method="post">
    {{csrf_field()}}
    <div class="ms-reply">
        <input type="hidden" name="id" value="{{$id}}">
        <textarea name="message" placeholder="Reply"></textarea>

        <button type="submit"><i class="zmdi zmdi-mail-send"></i></button>
    </div>
</form>