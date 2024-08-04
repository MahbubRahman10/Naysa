@extends('layouts.master')

@section('title')
	@if ($subcategory == null)
		<title>{{ $category->category_name }} Products | Naysabd</title>
	@else
		<title>{{ $subcategory->subcategory_name }} Products | Naysabd</title>
	@endif
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
	
		<div class="products-agileinfo">
			<h2 class="tittle">
				@if ($subcategory == null)
				{{ $category->category_name }}
				@else
				{{ $subcategory->subcategory_name }}
				@endif
			</h2>
			@php
			$str = ["/", " "];
			$repstr   = ["-", "-"];
			@endphp
			<div class="container">
				<div class="product-agileinfo-grids w3l">
					<div class="col-md-3 product-agileinfo-grid">
						<div class="categories">
							<h3>Categories</h3>
							<ul class="tree-list-pad">
								@foreach ($categories as $cat)
								<li><label class="categorychecked" data-id="{{$cat->id}}" for="item-{{$cat->id}}">   </label> <a class="category" href="/categories/{{ $cat->id }}/{{ str_replace($str, $repstr ,$cat->category_name ) }}"> {{ $cat->category_name }}</a> 
									<ul class="subcategoryview{{ $cat->id }}" id="subcategoryview" @if($subcategory != null && $subcategory->category_id == $cat->id) style="display: block;"  @endif >
										@foreach ($cat->subcategories as $subcat)									
											<li><a @if($subcategory != null && $subcategory->id == $subcat->id) style="text-decoration: underline;"  @endif  class="subcategory" href="/categories/{{ $subcat->id }}/{{ str_replace($str, $repstr ,$subcat->subcategory_name ) }}">{{ $subcat->subcategory_name }}</a></li>
										@endforeach
									</ul>
								</li>
								@endforeach
							</ul>
						</div>
						{{-- <div class="price">
							<h3>Price Range</h3>
							<ul class="dropdown-menu6">
								<li>                
									<div id="slider-range"></div>							
									<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
								</li>			
							</ul>
										<script type='text/javascript'>//<![CDATA[ 
										$(window).load(function(){
											$( "#slider-range" ).slider({
												range: true,
												min: 0,
												max: 9000,
												values: [ 1000, 7000 ],
												slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
											}
										});
											$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

										});//]]>  

									</script>
									<script type="text/javascript" src="js/jquery-ui.js"></script>
								</div> --}}
								<div class="top-rates">
									<h3>Top Rates products</h3>
									@php
									$str = ["/", " "];
									$repstr   = ["-", "-"];
									@endphp
									@foreach ($allproducts as $product)
									<div class="recent-grids">
										<div class="recent-left">
											@php $i= 1 @endphp
											@foreach ($product->productimage as $productimage)
											@if ($i == 1)
											<a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}" ><img alt="{{ $product->product_name }}" class="img-responsive " src="/{{ $productimage->image }}" /></a>
											@endif
											@php $i++ @endphp
											@endforeach	
										</div>
										<div class="recent-right">
											<h6 class="best2"><a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}"> {{ $product->product_name }} </a></h6>
											<p><del>Tk {{ $product->price }} </del> <em class="item_price">Tk {{ ceil(((100-$product->discount)/100)*$product->price) }} </em></p>
										</div>	
										<div class="clearfix"> </div>
									</div>
									<br>
									@endforeach
								</div>
								<div class="cat-img">
									<img class="img-responsive " src="/images/45.jpg" alt="">
								</div>
							</div>
							<div class="col-md-9 product-agileinfon-grid1 w3l" style="margin-top: -50px;">
								{{-- <div class="product-agileinfon-top">
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="/images/img1.jpg" alt="">
									</div>
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="/images/img2.jpg" alt="">
									</div>
									<div class="clearfix"></div>
								</div> --}}
								{{-- <div class="mens-toolbar">
									<form method="post" action="/products" >
										{{ csrf_field() }}
										<p >Showing 1–{{ $show }} of {{ $total }} results</p>
										<p class="showing">Sorting By
											<select  name="sort" onchange="submit()">
												<option @if($sort == 'product_name') selected="selected" @endif value="product_name"> Name</option>
												<option @if($sort == 'created_at') selected="selected" @endif value="created_at"> Date </option>
												<option @if($sort == 'price') selected="selected" @endif value="price"> Price </option>
											</select>
										</p> 
										<p>Show
											<select  name="show" onchange="submit()">
												<option @if($show == '10') selected="selected" @endif value="10"> 10 </option>
												<option @if($show == '20') selected="selected" @endif value="20"> 20 </option>
												<option @if($show == '30') selected="selected" @endif value="30"> 30 </option>
												<option @if($show == '40') selected="selected" @endif value="40"> 40 </option>
											</select>
										</p>
									</form>
									<div class="clearfix"></div>		
								</div> --}}
								<br><br><br>
								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
										<div id="myTabContent" class="tab-content">
											<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
												<div class="product-tab">
													@foreach ($products as $product)
													<div class="col-md-4 product-tab-grid simpleCart_shelfItem" style="margin-bottom:20px;">
														<div class="grid-arr">
															<div  class="grid-arrival">
																<figure>		
																	<a href="#" class="new-gri newgri" data-id="{{ $product->id }}" data-toggle="modal" data-target="#myModal1">
																		@foreach ($product->productimage as $productimage)
																			<div class="grid-img">
																				<img src="/{{ $productimage->image }}" class="img-responsive griimg{{ $product->id }}" alt="">
																			</div>
																		@endforeach			
																	</a>		
																</figure>	
															</div>
															{{-- <div class="ribben">
																<p>NEW</p>
															</div> --}}
															{{-- <div class="ribben1">
																<p>SALE</p>
															</div> --}}
															@for ($i=1; $i <= 5 ; $i++)
															<fieldset class="avgrating">
																<input type="radio" id="star" name="rating" value="5" />

																<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
															</fieldset>
															@endfor
															@php
																$str = ["/", " "];
																$repstr   = ["-", "-"];
															@endphp
															<div class="women">
																<h6><a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}" class="griname{{ $product->id }}"> {{ $product->product_name }}</a></h6>
																<span style="display: none;" class="grioverview{{ $product->id }}">{{ $product->overview }}</span>
																<span class="size grisize{{ $product->id }}"> 
																	@if (count($product->productsize) > 0)
																	@foreach ($product->productsize as $productsize)
																	<a href="" class="sizes sz{{ $productsize->id }}" id="sizes" data-id="{{ $productsize->id }}"> {{ $productsize->size_name }} </a>
																	@endforeach
																	@else
																	<div class="clear"></div>
																	@endif
																	<input type="hidden" class="sizedata" name="size" value="">
																</span>
																<span class="color gricolor{{ $product->id }}" style="padding-top: 10px;"> 
																	@if (count($product->productcolor) > 0)
																	@foreach ($product->productcolor as $productcolor)
																	<a href="" class="colors cz{{ $productcolor->id }}" id="sizes" data-id="{{ $productcolor->id }}"> {{ $productcolor->color_name }} </a>
																	@endforeach
																	@else
																	<div class="clear"></div>
																	@endif
																	<input type="hidden" class="colordata" name="color" value="">
																</span>
																<span class="qty" style="display: none;">1</span>
																@if ($product->discount == null)
																<p > <em class="item_price"> {{ $product->price }} tk  </em></p>
																@else
																<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} tk </em></p>
																@endif
																<img src="/images/loadings.gif" class="loaded cartloading{{ $product->id }}">
																<a href="" data-text="Add To Cart" class="my-cart-b item_add" data-id="{{ $product->id }}">Add To Cart</a>
																<p class="successmsg msg{{$product->id}}" > </p>
																<a href="" data-text="" class="my-wishlist-b wishlist_add" data-id="{{ $product->id }}">Add To Wishlist</a>
																<p class="wmsg{{$product->id}}" > </p>
															</div>
														</div>
													</div>
													@endforeach
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
		
			


@endsection