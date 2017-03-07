
@extends('layouts.auth-layout')

@section('title')
    Profile
@endsection

@section('style')
    {{--<link href="{{url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div id="main">

           <div class="container"  id="dash-header">
               <h2>My Profile</h2>
           </div>

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
                                <dd>{{auth()->user()->name}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Gender</dt>
                                <dd>{{auth()->user()->gender}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Phone</dt>
                                <dd>{{auth()->user()->phone}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>State</dt>
                                <dd>{{auth()->user()->state}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>City</dt>
                                <dd>{{auth()->user()->city}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Email</dt>
                                <dd>{{auth()->user()->email}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>PH Level</dt>
                                <dd>{{auth()->user()->level}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Referral ID</dt>
                                <dd>{{url('/register?ref=').auth()->user()->email}}</dd>
                            </dl>
                        </div>

                        <div class="pmbb-edit">
                            <form action="{{route('post.edit-profile')}}" method="post">
                                {{csrf_field()}}
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Full Name</dt>
                                    <dd>
                                        <div class="fg-line{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <input type="text" name="name" class="form-control" placeholder="eg. Mallinda Hollaway" value="{{auth()->user()->name}}" required>
                                        </div>
                                    </dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Gender</dt>
                                    <dd>
                                        <div class="fg-line{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <select name="gender" class="form-control" value="{{auth()->user()->gender}}" required>
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
                                            <input name="phone" type="text" class="form-control" placeholder="eg. 08022336677" value="{{auth()->user()->phone}}" required>
                                        </div>
                                    </dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">State</dt>
                                    <dd>
                                        <div class="fg-line{{ $errors->has('state') ? ' has-error' : '' }}">
                                            <select name="state" class="form-control" value="{{auth()->user()->state}}" required>
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
                                            <input name="city" type="text" class="form-control" placeholder="eg. Ibadan" value="{{auth()->user()->city}}" required>
                                        </div>

                                    </dd>
                                </dl>



                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Change Password</dt>
                                    <dd>
                                        <div class="fg-line{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input name="password" type="Password" maxlength="15" class="form-control">
                                        </div>
                                    </dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Confirm Password </dt>
                                    <dd>
                                        <div class="fg-line{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <input name="password_confirmation" maxlength="15" type="password" class="form-control">
                                        </div>
                                    </dd>
                                </dl>

                                <div class="m-t-30">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect">Save</button>
                                    {{--<button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect">Cancel</button>--}}
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="pmb-block">
                    <div class="pmbb-header">
                        <h2><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Bank Information</h2>
                    </div>
                    <div class="pmbb-body p-l-30">
                        <div class="pmbb-view">
                            <dl class="dl-horizontal">
                                <dt>Account Name</dt>
                                <dd>{{auth()->user()->bank->acct_name}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Account Number</dt>
                                <dd>{{auth()->user()->bank->acct_number}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Bank Name</dt>
                                <dd>{{auth()->user()->bank->bank_name}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Note</dt>
                                <dd>Contact the admin to change your bank details.</dd>
                            </dl>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{url('vendors/bower_components/moment/min/moment.min.js')}}"></script>
    {{--<script src="{{url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>--}}
{{--<script src="{{url('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>--}}
{{--<script src="{{url('vendors/fileinput/fileinput.min.js')}}"></script>--}}
{{--<script src="{{url('js/timer.js')}}"></script>--}}
{{--<script type="text/javascript">--}}
{{--//        new CreateTimer("tmr1", 82800);--}}
{{--//        new CreateTimer("timer1", 2800);--}}
{{--var token = '{{Session::token()}}';--}}
{{--var _url = "{{route('get_match_detail')}}";--}}
{{--$('.tmr').each(function () {--}}
{{--$this = $(this);--}}
{{--new CreateTimer($this.attr('id'),$this.data('time'));--}}
{{--});--}}
{{--</script>
@section('script')
--}}
@endsection