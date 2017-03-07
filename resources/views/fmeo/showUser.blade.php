@extends('voyager::master')
@section('css')

    <link href="{{url('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    {{--<link href="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">--}}
    <link href="{{url('vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">
    <!-- Vendor CSS -->


    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{url('css/app.min.1.css')}}" rel="stylesheet">
    <link href="{{url('css/app.min.2.css')}}" rel="stylesheet">
    <link href="{{url('css/main.css')}}" rel="stylesheet">
@endsection


@section('page_header')
    <h3 class="page-title">

        @include('fmeo.nav')


    </h3>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
          <div class="col-md-12">

                                  <div class="card" id="profile-main">
                                  <div class="card-body card-padding" style="padding-left: 0;padding-top: 0;">
                                  @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                  <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                                  </ul>
                                  </div>
                                  @endif

                                  <div class="pmb-block">
                                  <div class="pmbb-header">
                                  <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>

                                  <ul class="actions">
                                  <li class="dropdown">
                                  <a href="#" data-toggle="dropdown">
                                  <i class="zmdi zmdi-more-vert"></i>
                                  </a>

                                  <ul class="dropdown-menu dropdown-menu-right">
                                  <li>
                                  <a data-pmb-action="edit" href="#">Edit</a>
                                  </li>
                                  </ul>
                                  </li>
                                  </ul>
                                  </div>
                                  <div class="pmbb-body p-l-30">
                                  <div class="pmbb-view">
                                  <dl class="dl-horizontal">
                                  <dt>Full Name</dt>
                                  <dd>{{$user->name}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Gender</dt>
                                  <dd>{{$user->gender}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Phone</dt>
                                  <dd>{{$user->phone}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>State</dt>
                                  <dd>{{$user->state}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>City</dt>
                                  <dd>{{$user->city}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Email</dt>
                                  <dd>{{$user->email}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>PH Level</dt>
                                  <dd>{{$user->level}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Referral ID</dt>
                                  <dd>{{url('/register?ref=').$user->email}}</dd>
                                  </dl>
                                  </div>

                                  <div class="pmbb-edit">
                                  <form action="{{route('admin.post-detail')}}" method="post">
                                  {{csrf_field()}}
                                      <input type="hidden" value="{{$user->id}}" name="user_id">
                                  <dl class="dl-horizontal">
                                  <dt class="p-t-10">Full Name</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <input type="text" name="name" class="form-control" placeholder="eg. Mallinda Hollaway" value="{{$user->name}}" required>
                                  </div>
                                  </dd>
                                  </dl>
                                      <dl class="dl-horizontal">
                                  <dt class="p-t-10">Email</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <input type="email" name="email" class="form-control" placeholder="bjbeejay@gmail.com" value="{{$user->email}}" required>
                                  </div>
                                  </dd>
                                  </dl>

                                  <dl class="dl-horizontal">
                                  <dt class="p-t-10">Gender</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('gender') ? ' has-error' : '' }}">
                                  <select name="gender" class="form-control" value="{{$user->gender}}" required>
                                  <option value="male" >Male</option>
                                  <option value="female">Female</option>
                                  </select>
                                  </div>
                                  </dd>
                                  </dl>

                                  <dl class="dl-horizontal">
                                  <dt class="p-t-10">Mobile Phone</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('phone') ? ' has-error' : '' }}">
                                  <input name="phone" type="text" class="form-control" placeholder="eg. 08022336677" value="{{$user->phone}}" required>
                                  </div>
                                  </dd>
                                  </dl>

                                  <dl class="dl-horizontal">
                                  <dt class="p-t-10">State</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('state') ? ' has-error' : '' }}">
                                  <select name="state" class="form-control" value="{{$user->state}}" required>
                                  <option value="Abia">Abia</option>
                                  <option value="Abuja">Abuja</option>
                                  <option value="Adamawa">Adamawa</option>
                                  <option value="Anambra">Anambra</option>
                                  <option value="Akwa Ibom">Akwa Ibom</option>
                                  <option value="Bauchi">Bauchi</option>
                                  <option value="Bayelsa">Bayelsa</option>
                                  <option value="Benue">Benue</option>
                                  <option value="Borno">Borno</option>
                                  <option value="Cross River">Cross River</option>
                                  <option value="Delta">Delta</option>
                                  <option value="Ebonyi">Ebonyi</option>
                                  <option value="Enugu">Enugu</option>
                                  <option value="Edo">Edo</option>
                                  <option value="Ekiti">Ekiti</option>
                                  <option value="FCT Abuja">FCT Abuja</option>
                                  <option value="Gombe">Gombe</option>
                                  <option value="Imo">Imo</option>
                                  <option value="Jigawa">Jigawa</option>
                                  <option value="Kaduna">Kaduna</option>
                                  <option value="Kano">Kano</option>
                                  <option value="Katsina">Katsina</option>
                                  <option value="Kebbi">Kebbi</option>
                                  <option value="Kogi">Kogi</option>
                                  <option value="Kwara">Kwara</option>
                                  <option value="Lagos">Lagos</option>
                                  <option value="Nasarawa">Nasarawa</option>
                                  <option value="Niger">Niger</option>
                                  <option value="Ogun">Ogun</option>
                                  <option value="Ondo">Ondo</option>
                                  <option value="Osun">Osun</option>
                                  <option value="Oyo">Oyo</option>
                                  <option value="Plateau">Plateau</option>
                                  <option value="Rivers">Rivers</option>
                                  <option value="Sokoto">Sokoto</option>
                                  <option value="Taraba">Taraba</option>
                                  <option value="Yobe">Yobe</option>
                                  <option value="Zamfara">Zamfara</option>
                                  </select>
                                  </div>
                                  </dd>
                                  </dl>

                                  <dl class="dl-horizontal">
                                  <dt class="p-t-10">City</dt>
                                  <dd>
                                  <div class="fg-line{{ $errors->has('city') ? ' has-error' : '' }}">
                                  <input name="city" type="text" class="form-control" placeholder="eg. Ibadan" value="{{$user->city}}" required>
                                  </div>

                                  </dd>
                                  </dl>

                                  <div class="m-t-30">
                                  <button type="submit" class="btn btn-primary btn-sm waves-effect">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect">Cancel</button>
                                  </div>
                                  </form>

                                  </div>
                                  </div>
                                  </div>


                                  <div class="pmb-block">
                                  <div class="pmbb-header">
                                  <h2><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Bank Information</h2>
                                      <ul class="actions">
                                          <li class="dropdown">
                                              <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                  <i class="zmdi zmdi-more-vert"></i>
                                              </a>

                                              <ul class="dropdown-menu dropdown-menu-right">
                                                  <li>
                                                      <a data-pmb-action="edit" href="#">Edit</a>
                                                  </li>
                                              </ul>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="pmbb-body p-l-30">
                                  <div class="pmbb-view">
                                  <dl class="dl-horizontal">
                                  <dt>Account Name</dt>
                                  <dd>{{$user->bank->acct_name}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Account Number</dt>
                                  <dd>{{$user->bank->acct_number}}</dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                  <dt>Bank Name</dt>
                                  <dd>{{$user->bank->bank_name}}</dd>
                                  </dl>

                                  </div>

                                      <div class="pmbb-edit">
                                          <form action="{{route('admin.post-bank')}}" method="post">
                                              {{csrf_field()}}
                                              <input type="hidden" name="user_id" value="{{$user->bank->id}}">
                                              <dl class="dl-horizontal">
                                                  <dt class="p-t-10">Account Name</dt>
                                                  <dd>
                                                      <div class="fg-line">
                                                          <input type="text" name="acct_name" class="form-control" value="{{$user->bank->acct_name}}" placeholder="eg. 00971 12345678 9">
                                                      </div>
                                                  </dd>
                                              </dl>
                                              <dl class="dl-horizontal">
                                                  <dt class="p-t-10">Account Number</dt>
                                                  <dd>
                                                      <div class="fg-line">
                                                          <input type="text" name="acct_number" value="{{$user->bank->acct_number}}" class="form-control" placeholder="eg. 202034569782">
                                                      </div>
                                                  </dd>
                                              </dl>
                                              <dl class="dl-horizontal">
                                                  <dt class="p-t-10">Bank Name</dt>
                                                  <dd>
                                                      <div class="fg-line{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                                                          <input type="text" name="bank_name" value="{{$user->bank->bank_name}}" class="form-control" placeholder="Skye BAnk">
                                                      </div>
                                                  </dd>
                                              </dl>

                                              <div class="m-t-30">
                                                  <button type="submit" class="btn btn-primary btn-sm waves-effect">Save</button>
                                              </div>
                                          </form>

                                      </div>
                                  </div>
                                  </div>

                                  </div>
                                  </div>


          </div>
        </div>

    </div>
@endsection

@section('javascript')
    {{--<script src="{{url('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
    {{--<script src="{{url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
    <script src="{{url('vendors/bower_components/moment/min/moment.min.js')}}"></script>
    {{--<script src="{{url('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>--}}
    <script src="{{url('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>

    <script src="{{url('js/functions.js')}}"></script>
    <script src="{{url('js/actions.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>

@endsection