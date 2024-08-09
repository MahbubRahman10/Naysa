@extends('layouts.master')

@section('title')
	<title>Contact | Naysabd</title>
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

		<div class="mail-w3ls">
			<div class="container">
				<h2 class="tittle">Mail Us</h2>
				<div class="mail-grids">
					<div class="mail-top">
						<div class="col-md-4 mail-grid">
							<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
							<h5>Address</h5>
							<p>House No. 34 (2nd Floor), Road No. 20, Sector. 11, Uttara, Dhaka-1230, Bangladesh</p>
						</div>
						<div class="col-md-4 mail-grid">
							<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
							<h5>Phone</h5>
							<p>Telephone:  +88 000 111 333</p>
						</div>
						<div class="col-md-4 mail-grid">
							<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
							<h5>E-mail</h5>
							<p>E-mail:<a href="mailto:example@mail.com"> info@naysabd.com</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="map-w3">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.4160028763513!2d90.3855085145645!3d23.874862884528152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c41169229cd5%3A0x4d84095ee34c2775!2s34+Rd+No+20%2C+Dhaka+1230!5e0!3m2!1sen!2sbd!4v1518851323000" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
						<!-- <div id="map"></div>					   -->
					</div>
					<div class="mail-bottom" id="contacts">
						@if (\Session::has('message'))
						<div class="alert alert-success" style="text-align: center;">
							<ul>
								<li style="font-size: 20px;">{!! \Session::get('message') !!}</li>
							</ul>
						</div>
						@endif
						<br>
						<h4>Get In Touch With Us</h4>
						<form action="/contact" method="post">
							{{ csrf_field() }}
							<input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
							@if ($errors->has('name'))
								<strong>{{ $errors->first('name') }}</strong>
							@endif
							<input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							@if ($errors->has('email'))
								<strong>{{ $errors->first('email') }}</strong>
							@endif
							<input type="text" name="telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
							<textarea  name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
							@if ($errors->has('message'))
								<strong>{{ $errors->first('message') }}</strong>
							@endif
							<input type="submit" value="Submit" >
							<input type="reset" value="Clear" >

						</form>
					</div>
				</div>
			</div>
		</div>
@endsection