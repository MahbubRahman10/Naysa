@extends('layouts.master')

@section('title')
	<title>Wishlist | Naysabd</title>
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
							<legend> My Wishlist [{{ count($wishlists) }}] </legend>   
							<br>
							<br>
							@php
							$str = ["/", " "];
							$repstr   = ["-", "-"];
							@endphp

							@if(count($wishlists) == 0)
								<h4>Your wishlist is empty</h4>
							@else
							@foreach ($wishlists as $wishlist)
							<div class="col-md-3">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri newgri" data-id="{{ $wishlist->product_id }}" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													<a href="/product/{{ $wishlist->product_id}}/{{ str_replace($str, $repstr ,$wishlist->product_name ) }}" class="griname{{ $wishlist->product_id }}"><img src="/{{ $wishlist->product_image }}" class="img-responsive griimg" alt=""> </a>
												</div>		
											</a>		
										</figure>	
									</div>
									@php
									$str = ["/", " "];
									$repstr   = ["-", "-"];
									@endphp
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="/product/{{ $wishlist->product_id}}/{{ str_replace($str, $repstr ,$wishlist->product_name ) }}" class="griname{{ $wishlist->product_id }}"> {{ $wishlist->product_name }}</a></h6>

										<p > <em class="item_price"> {{ $wishlist->price }} Tk  </em></p>
									
										<a href="/user/wishlist/{{ $wishlist->id }}"  class="my-wishlist-b " >Remove</a>

									</div>
								</div>
							</div>
	                       @endforeach
	                       @endif
					</div>
				</div>
			</div>
		</div>
	</div>
			
@endsection