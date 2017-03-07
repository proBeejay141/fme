@extends('layouts.entry_layout')
{{---------------------------------------------------}}
@section('style')

@endsection
{{---------------------------------------------------}}
@section('title')
    Register
@endsection
{{---------------------------------------------------}}


@section('header')
    @include('includes.entry-header')
@endsection

{{---------------------------------------------------}}
@section('content')
    <div class="row small-bg">
        <h1>Register Now</h1>
        <h3>Together we can achieve the impossible...........</h3>
    </div>
    <div class="row" id="reg-row" >
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Register -->
        <div class="col-md-12 card  toggled" id="l-register">
            {{--<div class="lb-header palette-Teal bg">--}}
            {{--<i class="zmdi zmdi-account-circle"></i>Create Account--}}
            {{--</div>--}}
            <form action="{{ url('/register')}}" method="post">
                {{csrf_field()}}
                <div class="lb-body">
                    <div class="row">
                        <div class="col-md-6">


                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                            </div>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Full Name</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="text" name="name" class="form-control" placeholder="eg. Mallinda Hollaway" value="{{ old('name') }}" required>
                                    </div>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Gender</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        <select name="gender" class="form-control" value="{{ old('gender') }}" required>
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
                                        <input name="phone" type="text" class="form-control" placeholder="eg. 08022336677" value="{{ old('phone') }}" required>
                                    </div>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">State</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('state') ? ' has-error' : '' }}">
                                        <select name="state" class="form-control" value="{{ old('state') }}" required>
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
                                        <input name="city" type="text" class="form-control" placeholder="eg. Ibadan" value="{{ old('city') }}" required>
                                    </div>

                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Email Address</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input name="email" type="email" class="form-control " placeholder="eg. malinda.h@gmail.com" value="{{ old('email') }}" required>
                                    </div>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Password</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input name="password" type="Password" maxlength="15" class="form-control" required>
                                    </div>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Confirm Password </dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input name="password_confirmation" maxlength="15" type="password" class="form-control" required>
                                    </div>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Referral ID</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('referral') ? ' has-error' : '' }}">
                                        <input name="referral" type="email" class="form-control" placeholder="eg. malinda.h@gmail.com" value="{{ app('request')->input('ref') }}">
                                    </div>
                                </dd>
                            </dl>


                        </div>
                        <div class="col-md-6">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Bank Details</h2>
                            </div>
                            <div class="form-group fg-float">
                                <div class="fg-line{{ $errors->has('acct_name') ? ' has-error' : '' }}">
                                    <input type="text" name="acct_name" class="input-sm form-control fg-input" value="{{ old('acct_name')  }}" required>
                                    <label class="fg-label">Account Name</label>
                                </div>
                            </div>

                            <div class="form-group fg-float">
                                <div class="fg-line{{ $errors->has('acct_number') ? ' has-error' : '' }}">
                                    <input type="text" name="acct_number" class="input-sm form-control fg-input" value="{{ old('acct_number') }}" required>
                                    <label class="fg-label">Account Number</label>
                                </div>
                            </div>

                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Bank</dt>
                                <dd>
                                    <div class="fg-line{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                                        <select name="bank_name" class="form-control" value="{{old('bank_name')}}" required>
                                            <option value="Access Bank">Access Bank</option>
                                            <option value="Citibank">Citibank</option>
                                            <option value="Diamond Bank">Diamond Bank</option>
                                            <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                            <option value="Fidelity Bank Nigeria">Fidelity Bank Nigeria</option>
                                            <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                                            <option value="First City Monument Bank">First City Monument Bank</option>
                                            <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                            <option value="Heritage Bank Plc">Heritage Bank Plc</option>
                                            <option value="Keystone Bank Limited">Keystone Bank Limited</option>
                                            <option value="Providus Bank Plc">Providus Bank Plc</option>
                                            <option value="Skye Bank">Skye Bank</option>
                                            <option value="Stanbic IBTC Bank Nigeria Limited">Stanbic IBTC Bank Nigeria Limited</option>
                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                            <option value="Sterling Bank">Sterling Bank</option>
                                            <option value="Suntrust Bank Nigeria Limited">Suntrust Bank Nigeria Limited</option>
                                            <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                                            <option value="UBA">UBA</option>
                                            <option value="Unity Bank Plc.">Unity Bank Plc.</option>
                                            <option value="Wema Bank">Wema Bank</option>
                                            <option value="Zenith Bank">Zenith Bank</option>
                                        </select>
                                    </div>
                                </dd>
                            </dl>



                        </div>
                    </div>
                    <div class="row" style="
    padding-left: 15px;
">
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" onclick=" if($(this).val() == 'no'){ $(this).attr('value','yes'); $('#creat').removeAttr('Disabled') ;}else {$(this).attr('value','no');  $('#creat').attr('Disabled','Disabled') ;}" value="no">
                                <i class="input-helper"></i>
                                Accept the Terms and Conditions
                            </label>
                        </div>

                        <button id="creat" class="btn palette-Teal bg waves-effect" disabled="disabled" type="submit"><i class="zmdi zmdi-accounts-add zmdi-hc-fw"></i>Create Account</button>

                        <div class="m-t-30">
                            <a data-block="#l-login" class="palette-Teal text d-block m-b-5" href="/login">Already have an account?</a>
                            <a data-block="#l-forget-password" href="/password/reset" class="palette-Teal text">Forgot password?</a>
                        </div>
                    </div>


                </div>
            </form>

        </div>

    </div>

@endsection

{{---------------------------------------------------}}
@section('footer')
    <footer id="footer">
        Copyright I'Conquer &copy; 2016
        {{--<ul class="f-menu">--}}
        {{--<li><a href="/">Home</a></li>--}}
        {{--<li><a href="{{route('events')}}">Dashboard</a></li>--}}
        {{--<li><a href="#">About Us</a></li>--}}
        {{--<li><a href="#">Support</a></li>--}}
        {{--<li><a href="#">Contact</a></li>--}}
        {{--</ul>--}}
    </footer>
@endsection

@section('script')

@endsection



{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Login</div>--}}
{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox" name="remember"> Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-8 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Login--}}
{{--</button>--}}

{{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
{{--Forgot Your Password?--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

