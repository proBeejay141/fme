@extends('layouts.entry_layout')
{{---------------------------------------------------}}
@section('style')

@endsection
{{---------------------------------------------------}}
@section('title')
    Password Reset
@endsection
{{---------------------------------------------------}}


@section('header')
    @include('includes.entry-header')
@endsection

{{---------------------------------------------------}}
<!-- Main Content -->
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="login">
        <div class="l-block toggled">
            <div class="lb-header palette-Teal bg">
                <i class="zmdi zmdi-account-circle"></i>
                Forgot Password?
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="lb-body">
                    <p class="m-b-30">Supply the E-mail address you registered with.</p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} fg-float">
                        <div class="fg-line">
                            <input type="email" name="email" class="input-sm form-control fg-input">
                            <label class="fg-label">Email Address</label>
                        </div>
                    </div>

                    <button class="btn palette-Teal bg waves-effect">Send Password Reset Link</button>

                    <div class="m-t-30">
                        <a  class="palette-Teal text d-block m-b-5" href="/login">Already have an account?</a>
                        <a  href="/register" class="palette-Teal text">Create an account</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection

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

