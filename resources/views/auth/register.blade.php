@extends('layouts.master')

@section('title')
    <title>Register | Naysabd</title>
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
                    <div class="form-w3agile form1">
                        <h3>Register</h3>
                        <form action="/register" method="post">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <div class="key{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <input  type="text" name="username" value="{{ old('username') }}" placeholder="Username" required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <input  type="text" name="email" value="{{ old('email') }}" placeholder="Email" required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <input  type="text"  name="phone" value="{{ old('phone') }}" placeholder="Phone"  required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <input  type="text" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" value="{{ old('address') }}" placeholder="Address"  required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    <input  type="text"  name="city" value="{{ old('city') }}" placeholder="City"  required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('postal') ? ' has-error' : '' }}">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <input  type="text"  name="postal" value="{{ old('postal') }}" placeholder="Postal Code"  required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('postal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postal') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <input  type="text" name="country" value="{{ old('country') }}" placeholder="Country"  required="">
                                    <div class="clearfix"></div>
                                </div>
                                @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="key{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <input  type="password"  name="password" value="" placeholder="Password"  required="">
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
                                <input  type="password" name="password_confirmation" value="" placeholder="Confirm Password" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
            <!--login-->

@endsection