@extends('layouts.master')

@section('title')
	<title>Change Password | Naysabd</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('banner')
	<!--banner-->
	<div class="banner1">
		<div class="container">
		</div>
	</div>
@endsection

@section('content')

	<div class="user-profile">
		<div class="container clearfix">
			<div class="col-md-3">
				<div class="sidebar">
					@include('user.nav')
				</div>
			</div>
			<div class="col-md-9">
				<div id="usercontent">
					<fieldset class="orders margin-top-10">
						<legend> Change Password </legend>   
						<br><br>
						@if (\Session::has('message'))
						<div class="alert alert-success">
							<ul>
								<li style="font-size: 15px;">{!! \Session::get('message') !!}</li>
							</ul>
						</div>
						@endif
						<div class="changepassword">
							<form method="post" action="/user/password-change">
								{{ csrf_field() }}
								<div class="block">
									<label>Old Password : <strong style="color: red;">*</strong>  </label>
									<input type="password" name="oldpassword" value="" required="">
									@if ($errors->has('oldpassword'))
									<strong class="errors">{{ $errors->first('oldpassword') }}</strong>
									@endif
								</div>
								<br>
								<div class="block">
									<label>New Password : <strong style="color: red;">*</strong>  </label>
									<input type="password" name="password" value="" required="">
									@if ($errors->has('password'))
									<strong class="errors">{{ $errors->first('password') }}</strong>
									@endif
								</div>
								<br>
								<div class="block">
									<label>Confirm New Password : <strong style="color: red;">*</strong>  </label>
									<input type="password" name="password_confirmation"" value="" required="">
								</div>
								<br>

								<div class="block">
									<button type="submit" class="btn btn-info" style="margin-left:180px; ">Change Password</button> 
								</div>
							</form>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
	</div>

			
@endsection