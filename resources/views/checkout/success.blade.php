@extends('layouts.master')

@section('title')
	<title>Checkout | Naysabd</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">

	<style type="text/css">

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
		
		<div class="cart-items">
			<div class="container" id="container">
				<div class="address">
					<div class="shipping">
					
						<div class="title padding_top10 padding_bottom10" style="font-size: 35px;">Your Order has been Received.</div>

						<div style="color: #4c4c4c; font-size: 15px;">
							<h2>Thank you for your purchase.</h2>
							<h3 style="color: #4c4c4c; font-size: 15px;">Your Voucher No is : <strong style="color: green;">{{ session()->get('voucherno') }}</strong></h3>
							<br>
							<h3 style="color: #4c4c4c; font-size: 15px;">You will receive an order confirmation message with details of your order.</h3>
						</div>
						<br>
						<a href="/user/my-orders" style="color: #595AB8; text-decoration: underline;font-size: 17px;"> See your order history </a>
					</div>
				</div>
			</div>
		</div>
@endsection