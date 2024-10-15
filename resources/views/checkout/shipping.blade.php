@extends('layouts.master')

@section('title')
	<title>Checkout | Naysabd</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">

	<style type="text/css">

		.address {
			border: 1px solid #eee;
			padding: 30px 40px;
		}
		div#editaddrs{
			display: none;
		}
		#editaddrs label {
			display: inline-block;
			width: 170px;
			font-weight: normal;
			text-align: right;
			font-size:20px;
		}​
		.block input{
			width: 300px;
			height: 40px;
		}
		.payment_method {
			border: 1px solid #eee;
			padding: 20px 0px;
		}
		div#payment_methods {
			align-content: center;
			margin: 0% 10%;
		}
		label.cursor_pointer {
			padding-right: 10px;
		}
		.btn{
			margin-left: 170px;
		}
	</style>

@endsection

@section('banner')
	<!--banner-->
	<div class="banner1">
		<div class="container">
		</div>
	</div>
@endsection

@section('content')
		@php
			$str = ["/", " "];
			$repstr   = ["-", "-"];
		@endphp
		
		<div class="cart-items">
			<div class="container" id="container">
				<div class="address">
					<div class="shipping">
						<h2 class="tittle">Shipping to : </h2>

						<div class="block">
							<label>Mobile No : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;"> {{ Auth::user()->phone }} </strong>
						</div>
						<br>
						<div class="block">
							<label>Mobile No* : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;"> +88{{ Auth::user()->phone2 }} </strong>
						</div>
						<br>
						<div class="block">
							<label>Address : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;">{{ Auth::user()->address }}</strong>
						</div>
						<br>
						<div class="block">
							<label>City : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;">{{ Auth::user()->city }}</strong>
						</div>
						<br>
						<div class="block">
							<label>Postal Code : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;">{{ Auth::user()->postal }}</strong>
						</div>
						<br>
						<div class="block">
							<label>Country : </label>
							<strong style="font-size: 20px;padding-left: 10px;font-weight: normal;">{{ Auth::user()->country }}</strong>
						</div>
						<br><br>

						<div class="block">
							<label><a href="" class="btn btn-primary editaddress">Edit Address</a> </label>
						</div>
					</div>
					<div id="editaddrs">
						<h2 class="tittle">Shipping to : </h2>

						<form method="post" action="/user/update/address">
							{{ csrf_field() }}
							<div class="block">
								<label>Mobile No* : </label>
								<input type="text" name="mobile" value="{{ Auth::user()->phone2 }}">
							</div>
							<br>
							<div class="block">
								<label>Address : </label>
								<input type="text" name="address" value="{{ Auth::user()->address }}" required="">
								@if ($errors->has('address'))
									<strong>{{ $errors->first('address') }}</strong>
								@endif
							</div>
							<br>
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
								<label><button type="submit" class="btn btn-primary">Update Address</button> </label>
							</div>
						</form>
					</div>
				</div>

				<br><br>
				{{-- Payment Method --}}
				<form method="post" action="/checkout/review">
					{{ csrf_field() }}
					<div>
						<div class="payment_method">
							<div class="coment_box ">
								<h2 class="tittle">Payment method</h2>
								<div id="payment_methods">
									<input name="payment_method" class="payment_method_id_value cursor_pointer" type="radio" checked="" value="1" id="payment_method_2">
									<label class=" cursor_pointer" for="payment_method_2"><strong>Cash On Delivery</strong></label>
									<input name="payment_method" class="payment_method_id_value cursor_pointer" type="radio" value="2" id="payment_method_4">
									<label class=" cursor_pointer" for="payment_method_4"><strong>bKash</strong></label>
									<input name="payment_method" class="payment_method_id_value cursor_pointer" type="radio" value="3" id="payment_method_4">
									<label class=" cursor_pointer" for="payment_method_4"><strong>Rocket</strong></label>
								</div>
								<br><br>
							</div>
						</div>
					</div>
					<br><br>
					<div class="cart-footer">
						<div id="checkout">
							<a href="/checkout" class="btn dbtn">Edit Shopping Cart</a>
							<input type="submit" class="cbtn" value="Continue">
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$(document).on('click', '.editaddress', function(event) {
					event.preventDefault();

					$('.shipping').css('display', 'none');
					$('#editaddrs').css('display', 'block');

				});
			});
		</script>
		

@endsection