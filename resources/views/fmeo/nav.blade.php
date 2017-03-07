<div class="container-fluid">

    <ul class="nav navbar-nav">
        <li><a href="{{ route('admin.show-user', $id) }}">Details</a></li>
        <li><a href="{{route('admin.show-ph',$id)}}">PH Orders</a></li>
        <li><a href="{{route('admin.show-gh',$id)}}">GH Orders</a></li>
        <li><a href="{{route('admin.show-balance',$id)}}">Balance</a></li>
        <li><a href="{{route('admin.show-bonus',$id)}}">Bonuses</a></li>
        <li><a href="{{route('admin.show-refferal',$id)}}">Refferals</a></li>

    </ul>

</div><!-- /.container-fluid -->