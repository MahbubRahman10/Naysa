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
				<div class="">
					<div class="">

						<div class="padding_top10">
							<fieldset class="coment_box" id="bkash_ins">
								<legend>Rocket Payment instruction</legend>
								<div class="bKashinstruction">
									 <h3> You should follow these steps to fulfill the order using Rocket Payment Method </h3>
									<br>
									<ul>
										<li>Dial <strong>*322#</strong> from any operator except Citycell.(For Citycel just send an empty sms to 16216)</li>
										<li>Choose option 1 <span class="textStyle1">"payment"</span> from your mobile menu after dialing <strong>*322#</strong> (For Citycel, after send an empty sms to 16216)
										</li>
										<li>Enetr Biller ID</li>
										<li>Then Enetr Bill/Policy no.</li>
										<li>Enetr Your Pin no.</li>
										<li>Finally Enter your Amount</li>
										<li>Now fulfill the form "<span class="textStyle1">Your Transaction Id</span>" and <span class="textStyle1">Submit</span>.</li>
									</ul>
								</div>
							</fieldset> 
						</div> 	
						<br><br>
						<div class="padding_top10">
							<fieldset class="coment_box" id="bkash_ins">
								<legend>Transaction</legend>
								<div class="bKashpayment">
									<form method="POST" action="/checkout/rocket/payment">
										{{ csrf_field() }}
										<div class="form-group{{ $errors->has('transaction') ? ' has-error' : '' }}">
											<label for="transaction" class="">Your Transaction Id: </label>

											<input id="transaction" type="text" class="" name="transaction" value="{{ old('transaction') }}">
											@if ($errors->has('transaction'))
												<strong style="color: #a94442;">{{ $errors->first('transaction') }}</strong>
											@endif
										</div>
										<input type="submit" class="btn btn-success" name="submit" value="Submit">
									</form>
								</div>
							</fieldset> 
						</div> 	



					</div>
				</div>
			</div>
		</div>
@endsection