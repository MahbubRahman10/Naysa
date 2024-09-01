@extends('layouts.master')

@section('title')
	<title>Gallery | Nayasabd</title>
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

		<div class="products-agileinfo">
			<h2 class="tittle">Gallery</h2>
			<div class="container">
				<div class="product-agileinfo-grids w3l">
					<div class="col-md-12 product-agileinfon-grid1 w3l">
						<div class="product-agileinfon-top gallery">
							<div class="row">
								@foreach($galleries as $gallery)
									<div class="col-md-3 gal_pic" >
										<a href="/{{ $gallery->image }}" data-lightbox="1">
											<img src="/{{ $gallery->image }}" alt="" class="img-responsive" style="width: 100%; height: 190px;">
										</a>
										<br>
									</div>
								@endforeach
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
			
@endsection