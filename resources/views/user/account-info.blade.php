@extends('layouts.master')

@section('title')
	<title>Account Info | Naysabd</title>
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
					<div id="users">
						@if (\Session::has('message'))
						<div class="alert alert-success">
							<ul>
								<li style="font-size: 15px;">{!! \Session::get('message') !!}</li>
							</ul>
						</div>
						@endif
						<fieldset class="orders margin-top-10">
							<legend> Account basic Info </legend>   
							<br><br>
							<div class="accountinformation info">
								<div class="block">
									<label>Name : </label>
									<strong >  {{ Auth::user()->name }} </strong>
								</div>
								<br>
								<div class="block">
									<label>Email : </label>
									<strong >{{ Auth::user()->email }}</strong>
								</div>
								<br>
								<div class="block">
									<label>Mobile No : </label>
									<strong >{{ Auth::user()->phone }}</strong>
								</div>
								<br>
								{{-- <div class="block">
									<label>Mobile No* : </label>
									<strong >   </strong>
								</div> --}}
								<div class="block">
									<label>Join Date : </label>
									<strong > {{ Carbon\Carbon::parse(Auth::user()->created_at )->format('d F , Y') }} </strong>
								</div>
								<br>
								<br>
								<div class="block">
									<label><button type="submit" class="btn btn-primary updateinfo" style="margin-left:150px; ">Update Information</button> </label>
								</div>
								<br>

								{{-- <div class="block">
									<label><a href="" class="btn btn-primary " id="accountinformationbtn">Update Information</a> </label>
								</div> --}}
							</div>

							<div class="updateaccountinformation">
								<form method="post" action="/user/update/info">
									{{ csrf_field() }}
									<div class="block">
										<label>Name : </label>
										<input type="text"  name="name" value="{{ Auth::user()->name }}">
										@if ($errors->has('name'))
										<strong>{{ $errors->first('name') }}</strong>
										@endif
									</div>
									<br>
									{{-- <div class="block">
										<label>Email : </label>
										<input type="text" name="email" value="{{ Auth::user()->email }}">
										@if ($errors->has('email'))
										<strong>{{ $errors->first('email') }}</strong>
										@endif
									</div> --}}
									<br>
									<div class="block">
										<label>Mobile No : </label>
										<input type="text" name="phone" value="{{ Auth::user()->phone }}">
										@if ($errors->has('phone'))
										<strong>{{ $errors->first('phone') }}</strong>
										@endif
									</div>
								{{-- <div class="block">
									<label>Mobile No* : </label>
									<input type="text" name="{{ Auth::user()->name }}">
								</div> --}}
									<br>
									<div class="block">
										<button type="submit" class="btn btn-success " style="margin-left:150px; ">Save</button>
										<button type="cancel" class="btn btn-warning cancelinfo" style="margin-left:0px; ">Cancel</button> 
									</div>
									<br>
								</form>

								{{-- <div class="block">
									<label><a href="" class="btn btn-primary " id="accountinformationbtn">Update Information</a> </label>
								</div> --}}
							</div>

						</fieldset>
						<br>
						<fieldset class="orders margin-top-10">
							<legend> Address Info </legend>   
							<br><br>
							<div class="accountinformation address">
								<div class="block">
									<label>Address : </label>
									<strong >  {{ Auth::user()->address }} </strong>
								</div>
								<br>
								<div class="block">
									<label>City : </label>
									<strong >{{ Auth::user()->city }}</strong>
								</div>
								<br>
								<div class="block">
									<label>Postal Code : </label>
									<strong >{{ Auth::user()->postal }}</strong>
								</div>
								<br>
								<div class="block">
									<label>Country : </label>
									<strong >{{ Auth::user()->country }}</strong>
								</div>
								<br>
								<br>

								<div class="block">
									<label><button type="submit" class="btn btn-primary updateaddress" style="margin-left:150px; ">Update Address</button> </label>
								</div>
								<br>
							</div>

							
							<div class="updateaddressbook">
								<form method="post" action="/user/update/address">
									{{ csrf_field() }}
									<div class="block">
										<label>Address : </label>
										<input type="text"  name="address" value="{{ Auth::user()->address }}">
										@if ($errors->has('address'))
										<strong>{{ $errors->first('address') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<label>City : </label>
										<input type="text" name="city" value="{{ Auth::user()->city }}">
										@if ($errors->has('city'))
										<strong>{{ $errors->first('city') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<label>Postal Code : </label>
										<input type="text" name="postal" value="{{ Auth::user()->postal }}">
										@if ($errors->has('postal'))
										<strong>{{ $errors->first('postal') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<label>Country : </label>
										<input type="text" name="country" value="{{ Auth::user()->country }}">
										@if ($errors->has('country'))
										<strong>{{ $errors->first('country') }}</strong>
										@endif
									</div>
									<br>
									<div class="block">
										<button type="submit" class="btn btn-success " style="margin-left:150px; ">Save</button>
										<button type="cancel" class="btn btn-warning canceladdress" style="margin-left:0px; ">Cancel</button> 
									</div>
									<br>
								</form>

								{{-- <div class="block">
									<label><a href="" class="btn btn-primary " id="accountinformationbtn">Update Information</a> </label>
								</div> --}}
							</div>

						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '.updateinfo', function(event) {
				event.preventDefault();
				/* Act on the event */
				$(".info").css('display', 'none');
				$(".updateaccountinformation").css('display', 'block');

			});

			$(document).on('click', '.cancelinfo', function(event) {
				event.preventDefault();
				/* Act on the event */
				$(".info").css('display', 'block');
				$(".updateaccountinformation").css('display', 'none');

			});



			$(document).on('click', '.updateaddress', function(event) {
				event.preventDefault();
				/* Act on the event */
				$(".address").css('display', 'none');
				$(".updateaddressbook").css('display', 'block');

			});

			$(document).on('click', '.canceladdress', function(event) {
				event.preventDefault();
				/* Act on the event */
				$(".address").css('display', 'block');
				$(".updateaddressbook").css('display', 'none');

			});

		});
	</script>
			
@endsection