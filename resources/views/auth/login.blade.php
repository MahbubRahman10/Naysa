@extends('layouts.master')

@section('title')
    <title>Login | Naysabd</title>
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
                    <h3>Login To New Shop</h3>
                    <form action="/login" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="key{{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                       <div class="form-group">
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
                        <input type="submit" value="Login">
                    
                    </form>
                </div>
                <div class="forg">
                    <a href="/password/reset" class="forg-left">Forgot Password</a>
                    <a href="register" class="forg-right">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
         <!--login-->
@endsection