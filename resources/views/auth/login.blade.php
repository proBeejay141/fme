@extends('layouts.entry_layout')
{{---------------------------------------------------}}
@section('style')

@endsection
{{---------------------------------------------------}}
@section('title')
    Login
@endsection
{{---------------------------------------------------}}


@section('header')
    @include('includes.entry-header')
@endsection

{{---------------------------------------------------}}
@section('content')

    <div class="row" id="login-row" >

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- Login -->
        <div class="l-block toggled">
            <div class="lb-header palette-Teal bg">
                <i>I</i>
                &nbsp;
                Hi there welcome back!, Please Sign in
            </div>

            <form action="{{ url('/login')}}" method="post">
                {{csrf_field()}}
                <div class="lb-body">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="email" class="input-sm form-control fg-input" name="email" required>
                            <label class="fg-label">Email Address</label>
                        </div>
                    </div>

                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="password" class="input-sm form-control fg-input" name="password" required>
                            <label class="fg-label">Password</label>
                        </div>
                    </div>

                    {{--<div class="checkbox m-b-30">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" name="remember" value="">--}}
                            {{--<i class="input-helper"></i>--}}
                            {{--Remember Me--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    <button class="btn palette-Teal bg" type="submit">Sign in</button>

                    <div class="m-t-20">
                        <a  class="palette-Teal text d-block m-b-5" href="/register">Creat an account</a>
                        <a  href="/password/reset" class="palette-Teal text">Forgot password?</a>
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
    </footer>
@endsection

@section('script')

@endsection
