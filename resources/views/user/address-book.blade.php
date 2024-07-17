@extends('layouts.master')

@section('title')
	<title>Address Book | Naysabd</title>
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
	
	<div class="user-profile">
		<div class="container clearfix">
			<div class="col-md-3">
				<div class="sidebar">
					@include('user.nav')
				</div>
			</div>
			<div class="col-md-9">
				<div id="usercontent">
					<div id="users">
						<fieldset class="orders margin-top-10">
							<legend> Account Book </legend>   
							<br><br>
							@if (\Session::has('message'))
							<div class="alert alert-success">
								<ul>
									<li style="font-size: 15px;">{!! \Session::get('message') !!}</li>
								</ul>
							</div>
							@endif
							<div class="addressbooks">
								<form method="post" action="/user/update/address">
									{{ csrf_field() }}
									<div class="block">
										<label>Address : </label>
										<input type="text" name="address" value="{{ Auth::user()->address }}"
										@if ($errors->has('address'))
										<strong>{{ $errors->first('address') }}</strong>
										@endif
									</div>
									<br><br>
									<div class="block">
										<label>City : </label>
										<input type="text" name="city" value="{{ Auth::user()->city }}" required="">
										@if ($errors->has('city'))
										<strong>{{ $errors->first('city') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<label>Postal Code : </label>
										<input type="text" name="postal" value="{{ Auth::user()->postal }}" required="">
										@if ($errors->has('postal'))
										<strong>{{ $errors->first('postal') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<label>Country : </label>
										<input type="text" name="country" value="{{ Auth::user()->country }}" required="">
										@if ($errors->has('country'))
										<strong>{{ $errors->first('country') }}</strong>
										@endif
									</div>
									<br><br>

									<div class="block">
										<label><button type="submit" class="btn btn-primary" style="margin-left:150px; ">Update Address</button> </label>
									</div>
								</form>
							</div>


						</fieldset>
						<br>
						
					</div>
				</div>
			</div>
		</div>
	</div>
			
@endsection