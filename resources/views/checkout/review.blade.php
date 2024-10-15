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
		@php
			$str = ["/", " "];
			$repstr   = ["-", "-"];
		@endphp
		
		<div class="cart-items">
			<div class="container" id="container">
				<div class="address">
					<div class="payment_contain">
						{{-- <div class="title" style="color:#4c4c4c;font-size: 25px; font-weight: bold; padding-bottom:30px;">Order Review</div> --}}
						<fieldset class="coment_box display_none color_396b8b">
							<legend>Order Review</legend>
							<br>
							<table class="cart-table data-table border-bottom tableWidth">
								<thead>
									<tr class="first last">
										<th class="table_td_width5">&nbsp;</th>
										<th class="table_td_width50 color_396b8b"><span class="nobr">Name</span></th>
										<th class="a-center table_td_width20 color_396b8b"><span class="nobr">Unit Price(<span class="taka_style marginRightNone">BDT</span>)</span></th>
										<th class="a-center table_td_width10 color_396b8b"><span class="nobr">Qty</span></th>
										<th class="a-rights table_td_width15 color_396b8b">Subtotal(<span class="taka_style marginRightNone">BDT</span>)</th>
									</tr>
								</thead>
								<tbody>
									@foreach (Cart::content() as $item)
									<tr class="first  odd">
										<td>1.</td>
										<td>
											<b><a class="link" href="/product/{{ $item->id }}/{{ str_replace($str, $repstr ,$item->name ) }}" title="{{ $item->name }}"> {{ $item->name }} </a></b>
										</td>
										<td class="a-center price">
											<span class="cart-price">
												<span class="price color_396b8b">
													{{ $item->price }}                             
												</span>
											</span>
										</td>
										<td class="a-center">
											<span class="cart-price color_396b8b">
												<span class="price"> {{ $item->qty }} </span>
											</span>
										</td>
										<td class="a-rights">
											<span class="cart-price">
												<span class="price color_396b8b">
													{{ $item->qty * $item->price }}
												</span>
											</span>
										</td>
									</tr>
									@endforeach
									<tr class="border-top">
										<td colspan="4" class="a-rights color_396b8b" >Subtotal:</td>
										<td colspan="1" class="a-rights color_396b8b">
											{{ Cart::total() }}            
										</td>
									</tr>
									<tr>
										<td colspan="4" class="a-rights color_396b8b">Add VAT ≈ </td>
										<td colspan="1" class="a-rights color_396b8b">
										0.00            </td>
									</tr>
								{{-- <tr>
									@if (Session::get('shipping_method') == 'Courier Service')
									<td colspan="4" class="a-rights color_396b8b">Add Shipping "Courier Service" Charge:</td>
									<td colspan="1" class="a-rights color_396b8b"> {{ Session::get('service_charge')  }}</td>
									@else
									<td colspan="4" class="a-rights color_396b8b">Add Shipping "Express Delivery" Charge:</td>
									<td colspan="1" class="a-rights color_396b8b"> {{ Session::get('service_charge')  }}</td>
									@endif
								</tr> --}}
									<tr>
										<td colspan="4" class="a-rights color_396b8b">Add Shipping Charge:</td>
										<td colspan="1" class="a-rights color_396b8b"> {{  Session::get('service_charge') }} </td>
									</tr>
									{{-- <tr>
										<td colspan="4" class="a-rights color_396b8b">Add "
											bKash"  Charge :
										</td>
										<td colspan="1" class="a-rights color_396b8b">
										0.00            </td>
									</tr> --}}
									<tr>
										<td colspan="4" class="a-rights color_396b8b ">
											<strong class="font_size18 color_396b8b ">Grand Total</strong>≈
										</td>
										<td colspan="1" class="a-rights grandTotal color_396b8b">
											<strong> {{ str_replace(',', '', Cart::total() ) + Session::get('service_charge') }} </strong>
										</td>
									</tr>
									<tr class="couponTr display_none " style="display: none;">
										<td colspan="4" class="a-rights couponTitle color_396b8b"></td>
										<td colspan="1" class="a-rights couponAmount color_396b8b"></td>
									</tr>
									<tr>
										<td colspan="4" class="a-rights color_396b8b">
											<strong class="font_size18">Net Payable</strong>≈
										</td>
										<td colspan="1" class="a-rights floorGtotal color_396b8b">
											<h3>
												
											<strong> {{ round(str_replace(',', '', Cart::total() ) +  Session::get('service_charge')) }} </strong>
											</h3>
										</td>
									</tr>
								</tbody>
							</table>
						</fieldset>
						<br>
						<fieldset class="coment_box display_none color_396b8b">
							<legend>Payment method</legend>
							<div id="payment_methods">
								@if (Session::get('payment_method') == "bkash")
								<strong style="font-size:16px; margin-left: 5px;">bKash</strong>
								@elseif (Session::get('payment_method') == "rocket")
								<strong style="font-size:16px; margin-left: 5px;">Rocket</strong>
								@else
								<strong style="font-size:16px; margin-left: 5px;">Cash On Delivery</strong>
								@endif

								<br>
							</div>
						</fieldset>
						<br>
						<div class="paymen_button">
							@if (Session::get('payment_method') == "rocket")
							<button class="button_active btn-continue right" title="Place Order" type="button" onclick="window.location = '/checkout/rocket/payment'; return false;"><span><span>Place Order</span></span>
							</button>
							@elseif (Session::get('payment_method') == "bKash")
							<button class="button_active btn-continue right" title="Place Order" type="button" onclick="window.location = '/checkout/bKash/payment'; return false;"><span><span>Place Order</span></span>
							</button>
							@else
							<button class="button_active btn-continue right" title="Place Order" type="button" onclick="window.location = '/checkout/place-order'; return false;"><span><span>Place Order</span></span>
							</button>
							@endif
							<button style="margin-right:2%; background: #475EEB; border: 1px solid;" onclick="window.location = '/checkout';
							return false;" class="button_active " title="Update Shopping Cart" type="submit"><span>Edit Shopping Cart</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>			


@endsection