@extends('layouts.master')

@section('title')
	<title>Home | Naysabd</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('banner')
	@include('sections.banner')
@endsection

@section('content')

			<!--banner-bottom-->
			<div class="ban-bottom-w3l">
				<div class="container">
					@php $i = 0; $a = array(); @endphp
					@foreach ($customs as $custom)
					@if ($custom->category == 'headerimg' && $i < 4)
					@if($i == 0)
					@php $i++; array_push($a,$custom->id);@endphp
					<div class="col-md-6 ban-bottom">
						<div class="ban-top first_pic">
							<img src="/{{ $custom->image }}" class="img-responsive" alt="" style="width: 100%; height: 625px;"/>
							<div class="ban-text">
								<h4>{{ $custom->tag }}</h4>
							</div>
							@if ($custom->discount != null)
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>{{ $custom->discount }} <span>Off/-</span></h4>
								</div>
							@endif
						</div>
					</div>
					@endif
					@if($i < 2)
					<div class="col-md-6 ban-bottom3">
					@endif
						@if($i == 1)
							@if(in_array($custom->id, $a) == false)
								@php $i++; array_push($a,$custom->id);@endphp
								<div class="ban-top">
									<img src="/{{ $custom->image }}"  class="img-responsive" height="100px" alt=""/>
									<div class="ban-text1">
										<h4>{{  $custom->tag }} </h4>
									</div>
									@if ($custom->discount != null)
									<div class="ban-text2 hvr-sweep-to-top">
										<h4>{{ $custom->discount }} <span>Off/-</span></h4>
									</div>
									@endif
								</div>
							@endif
						@endif
						@if($i > 1)
						<div class="ban-img">
							@if(in_array($custom->id, $a) == false)
								@php $i++; array_push($a,$custom->id);@endphp
								<div class="ban-bottom1">
									<div class="ban-top">
										<img src="/{{ $custom->image }}" alt=""/ style="height: 250px;">
										<div class="ban-text1 ban-text11">
											<h4>{{ $custom->tag }}</h4>
										</div>
									</div>

								<div class="clearfix"></div>
								</div>						
							@endif
						</div>						 
						@endif
						@if($i <2)
					</div>
					@endif
					@endif
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
			<div class="new-arrivals-w3agile">
				<div class="container">
					<h2 class="tittle">New Arrivals</h2>
					<div class="arrivals-grids">	
						@foreach ($products as $product)
						<div class="col-md-3 arrival-grid simpleCart_shelfItem" style="margin-bottom: 20px;">
							<div class="grid-arr">
								<div  class="grid-arrival">
									<figure>		
										<a href="#" class="new-gri newgri" data-id="{{ $product->id }}" data-toggle="modal" data-target="#myModal1">
											@foreach ($product->productimage as $productimage)
												<div class="grid-img">
													<img src="{{ $productimage->image }}" class="img-responsive griimg{{ $product->id }}" alt="">
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
								@php
									$str = ["/", " "];
									$repstr   = ["-", "-"];
								@endphp								
								@for ($i=1; $i <= 5 ; $i++)
								<fieldset class="avgrating">
									<input type="radio" id="star" name="rating" value="5" />

									<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
								</fieldset>
								@endfor
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
									@if ($product->discount == null)
									<p > <em class="item_price"> {{ $product->price }} Tk  </em></p>
									@else
									<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} Tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} Tk </em></p>
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
			<!--new-arrivals-->
			<!--accessories-->
			<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="/products" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			<!--Products-->
			<div class="product-agile">
				<div class="container">
					<h3 class="tittle1"> New Products</h3>
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides" id="slider">
								<li>	 
									<div class="caption">
										@php $l = 0; @endphp
										@foreach ($products as $product)
										@php $l++; @endphp
										@if($l < 5)
										<div class="col-md-3 arrival-grid simpleCart_shelfItem" style="padding-bottom: 30px;">
											<div class="grid-arr new_product">
												<div  class="grid-arrival">
													<figure>		
														<a href="#" class="new-gri newgri" data-id="{{ $product->id }}" data-toggle="modal" data-target="#myModal1">
															@foreach ($product->productimage as $productimage)
																<div class="grid-img">
																	<img src="{{ $productimage->image }}" class="img-responsive griimg{{ $product->id }}" alt="">
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
													@if ($product->discount == null)
													<p > <em class="item_price"> {{ $product->price }} Tk  </em></p>
													@else
													<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} Tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} Tk </em></p>
													@endif
													<img src="/images/loadings.gif" class="loaded cartloading{{ $product->id }}">
													<a href="" data-text="Add To Cart" class="my-cart-b item_add" data-id="{{ $product->id }}">Add To Cart</a>
													<p class="successmsg msg{{$product->id}}" > </p>
													<a href="" data-text="" class="my-wishlist-b wishlist_add" data-id="{{ $product->id }}">Add To Wishlist</a>
													<p class="wmsg{{$product->id}}" > </p>
												</div>
											</div>
										</div>
										@endif
										@endforeach
										<div class="clearfix"></div>
									</div>
								</li>
								<li>	 
									<div class="caption">
										@php $l = 0; @endphp
										@foreach ($products as $key => $product)
										@if($key > 4)
										@php $l++; @endphp
										@if($l < 5)
										<div class="col-md-3 arrival-grid simpleCart_shelfItem" style="padding-bottom: 20px;">
											<div class="grid-arr new_product">
												<div  class="grid-arrival">
													<figure>		
														<a href="#" class="new-gri newgri" data-id="{{ $product->id }}" data-toggle="modal" data-target="#myModal1">
															@foreach ($product->productimage as $productimage)
																<div class="grid-img">
																	<img src="{{ $productimage->image }}" class="img-responsive griimg{{ $product->id }}" alt="">
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
													@if ($product->discount == null)
													<p > <em class="item_price"> {{ $product->price }} Tk  </em></p>
													@else
													<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} Tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} Tk </em></p>
													@endif
													<img src="/images/loadings.gif" class="loaded cartloading{{ $product->id }}">
													<a href="" data-text="Add To Cart" class="my-cart-b item_add" data-id="{{ $product->id }}">Add To Cart</a>
													<p class="successmsg msg{{$product->id}}" > </p>
													<a href="" data-text="" class="my-wishlist-b wishlist_add" data-id="{{ $product->id }}">Add To Wishlist</a>
													<p class="wmsg{{$product->id}}" > </p>
												</div>
											</div>
										</div>
										@endif
										@endif
										@endforeach
										<div class="clearfix"></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						@foreach($customs as $custom)
						@if($custom->category == 'footerimg')
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="/{{ $custom->image }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>{{ $custom->tag }}</h4>
								</div>
								@if($custom->discount != null)
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
								@endif
							</div>
							<br>
						</div>
						@endif
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="new-arrivals-w3agile">
				<div class="container">
					<h3 class="tittle1">Best Sellers</h3>
					<div class="arrivals-grids">
						@foreach ($products as $product)
						<div class="col-md-3 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr">
								<div  class="grid-arrival">
									<figure>		
										<a href="#" class="new-gri newgri" data-id="{{ $product->id }}" data-toggle="modal" data-target="#myModal1">
											@foreach ($product->productimage as $productimage)
												<div class="grid-img">
													<img src="{{ $productimage->image }}" class="img-responsive griimg{{ $product->id }}" alt="">
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
									@if ($product->discount == null)
									<p > <em class="item_price"> {{ $product->price }} Tk  </em></p>
									@else
									<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} Tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} Tk </em></p>
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
			<!--new-arrivals-->



			{{-- Model --}}
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
							<div class="news-gr">
								<div class="col-md-5 new-grid1">
									<img id="pimg" src="" class="img-responsive" alt="">
								</div>
								<div class="col-md-7 new-grid">
									<h5 id="pname"></h5>
									<h6>Quick Overview</h6>
									<span id="poverview"></span>
									<div class="color-quality">
										<h6>Color : </h6>
										<div class="color-quality-left" id="pcolor">

										</div>
										<div class="color-quality-right">
											<h6>Quantity :</h6>
											<div class="quantity"> 
												<div class="quantity-select">                           
													<div class="entry value-minus1">&nbsp;</div>
													<div class="entry value1"><span class="qty">1</span></div>
													<div class="entry value-plus1 active">&nbsp;</div>
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
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="women">
										<h6>Size : </h6>
										<span class="size" id="psize"> </span>
										<p ><del id="pprice"></del>   <em class="item_price" id="pdiscount"></em></p>
										<img src="/images/loadings.gif" class="mloaded mcartloading">
										<div class="add">
											<button class="btn btn-danger my-cart-btn oka my-cart-b item_add" data-id="" data-model="yes">Add to Cart</button>
											<button class="btn btn-danger my-cart-btn oka my-cart-b wishlist_add" data-id="" data-model="yes">Add to Wishlist</button>
										</div>
										<p class="successmsg msg" > </p>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

			{{-- Model Script --}}
			<script type="text/javascript">
				$(document).ready(function() {
					$(document).on('click', '.newgri', function(event) {
						event.preventDefault();
						var id  = $(this).attr('data-id');
						var image = $('.griimg'+id).attr('src');
						var name = $('.griname'+id).html();
						var overview = $('.grioverview'+id).html();
						var price = $('.griprice'+id).html();
						var size = $('.grisize'+id).html();
						var color = $('.gricolor'+id).html();
						var discount = $('.gridiscount'+id).html();

						$('#pname').html(name)
						$('#poverview').html(overview)
						$('#pprice').html(price)
						$('#pdiscount').html(discount)
						$('#psize').html(size)
						$('#pcolor').html(color)
						$('#pimg').attr('src', image);
						$('.oka').attr('data-id',id);

					});
				});
			</script>
			
@endsection