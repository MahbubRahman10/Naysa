@extends('layouts.master')

@section('title')
    <title>Forgot Password | Naysabd</title>
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="description" content="">
@endsection

@section('banner')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <!-- <h3><a href="index.html">Home</a> / <span>Products</span></h3> -->
        </div>
    </div>
@endsection

@section('content')

        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Reset Password</h3>
                    <form action="/reset/password" method="post">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <input type="hidden" name="email_token" value="{{ $token }}">
                            <div class="key{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input  type="password" value="Password" name="password_confirmation" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
                            <div class="clearfix"></div>
                        </div>

                        <input type="submit" value="Send Link">
                    </form>
                </div>
            </div>
        </div>
         <!--login-->
@endsection