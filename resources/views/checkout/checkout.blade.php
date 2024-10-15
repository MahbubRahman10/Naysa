@extends('layouts.master')

@section('title')
	<title>Checkout | Naysabd</title>
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
		@php
		$str = ["/", " "];
		$repstr   = ["-", "-"];
		@endphp
		<div class="cart-items">
			<div class="container" id="container">
				<h2>My Shopping Bag ( <span class="totalcart">{{ count(Cart::content()) }}</span> )</h2>
					
				@if (count(Cart::content()) == 0)
					<h4 style="color: #4c4c4c;">Your shopping cart is empty. <a href="\">&nbsp;Continue Shopping</a></h4>
				@else

					@foreach (Cart::content() as $item)
					<div class="cart-header carthead{{ $item->id }}">
						<div class="close1 ser{{ $item->id }}" data-id="{{ $item->id }}" data-row="{{ $item->rowId }}"> </div>
						<div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								<img src="{{ $item->options->image }}" class="img-responsive" alt="">
							</div>
							<div class="cart-item-info">
								<h3><a href="/product/{{ $item->id}}/{{ str_replace($str, $repstr ,$item->name ) }}"> {{ $item->name }} </a></h3>
								<ul >
									{{-- <li><p>Min. order value:</p></li>
										<li><p>FREE delivery</p></li> --}}
										<br>
										<p>   <em class="item_price"> Price : {{ $item->price }} Tk  </em></p><br>
										<p>  <em class="item_price"> Size :  {{ $item->options->has('size') ? $item->options->size : 'N/A' }}  </em></p><br>
										<p>  <em class="item_price"> Color :  {{ $item->options->has('color') ? $item->options->color : 'N/A' }}  </em></p>
									</ul>
									<br>
									<h6><strong style="font-size:15px;">Quantity :</strong></h6>
									<br>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus1 mns" data-id="{{ $item->id }}" data-row="{{ $item->rowId }}">&nbsp;</div>
											<div class="entry value1"><span class="qty">{{ $item->qty }}</span></div>
											<div class="entry value-plus1 pls" data-id="{{ $item->id }}" data-row="{{ $item->rowId }}">&nbsp;</div>
										</div>
									</div>
									<!--quantity-->
									<script>
										$('.value-plus1').on('click', function(){
											var divUpd = $(this).parent().find('.qty'), newVal = parseInt(divUpd.text(), 10)+1;
											divUpd.text(newVal);
										});

										$('.value-minus1').on('click', function(){
											var divUpd = $(this).parent().find('.qty'), newVal = parseInt(divUpd.text(), 10)-1;
											if(newVal>=1) divUpd.text(newVal);
										});
									</script>
									<!--quantity-->
									<div class="delivery">
										{{-- <p>Service Charges : $10.00</p> --}}
										{{-- <span>Delivered in 1-1:30 hours</span> --}}
										<div class="clearfix"></div>
									</div>	
								</div>
								<div class="clearfix"></div>
							</div>
						</div>	
						@endforeach	

						<div class="cart-footer">
							<div id="checkout">
								<a href="/checkout/shipping" class="btn cbtn">Continue</a>
								<br><br>
								<a href="/cart/empty-cart" class="btn dbtn">Remove All</a>
							</div>
						</div>

				@endif

			</div>
		</div>	
			
@endsection