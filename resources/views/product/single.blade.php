@extends('layouts.master')

@section('title')
	<title>{{ $product->product_name }} | Naysabd</title>
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
	
	<div class="single-wl3">
		<div class="container">
			<div class="single-grids">
				<div class="col-md-9 single-grid">
					<div clas="single-top">
						<div class="single-left">
							<div class="flexslider">
								<ul class="slides">
									@foreach ($product->productimage as $productimage)
									<li data-thumb="/{{ $productimage->image }}">
										<div class="thumb-image"><img class="img-responsive" data-imagezoom="true" src="/{{ $productimage->image }}" /></div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="single-right simpleCart_shelfItem">
							<h4> {{ $product->product_name }} </h4>

							 @for ($i=1; $i <= 5 ; $i++)
							 <fieldset class="avgrating">
							 	<input type="radio" id="star" name="rating" value="5" />
							 	
							 	<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
							 </fieldset>
							 @endfor

							@if ($product->discount == null)
								<p class="price item_price">Tk {{ $product->price }}</p>
							@else
								<p class="price item_price">Tk {{ ceil(((100-$product->discount)/100)*$product->price) }}</p>
							@endif

							<div class="description">
								<p><span>Quick Overview : </span> {!! $product->overview !!} </p>
							</div>

							<div class="color-quality">
								<h6>Quality :</h6>

								<div class="quantity">
									<div class="quantity-select">
										<div class="entry value-minus1"></div>

										<div class="entry value1"><span class="qty">1</span></div>

										<div class="entry value-plus1 active"></div>
									</div>
								</div>
								<!--quantity--><script>
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

							<div class="women">
								<br>
								<h6>Size :</h6>
								<span class="size grisize{{ $product->id }}"> 
									@if (count($product->productsize) > 0)
									@foreach ($product->productsize as $productsize)
									<a href="" class="sizes sz{{ $productsize->id }}" id="sizes" data-id="{{ $productsize->id }}"> {{ $productsize->size_name }} </a>
									@endforeach
									@endif
									<input type="hidden" class="sizedata" name="size" value="">
								</span>
								<br>
								<h6>Color :</h6>
								<span class="color gricolor{{ $product->id }}" > 
									@if (count($product->productcolor) > 0)
									@foreach ($product->productcolor as $productcolor)
									<a href="" class="colors cz{{ $productcolor->id }}" id="sizes" data-id="{{ $productcolor->id }}"> {{ $productcolor->color_name }} 
									</a>
									@endforeach
									@endif
									<input type="hidden" class="colordata" name="color" value="">
								</span>
								<br>
								 <a class="my-cart-b item_add" data-text="Add To Cart" href="" data-id="{{ $product->id }}">Add To Cart</a>
								 <p class="successmsg msg{{$product->id}}">  </p>
							</div>
							<div class="social-icon"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				@php
				$str = ["/", " "];
				$repstr   = ["-", "-"];
				@endphp
				<div class="col-md-3 single-grid1">
					<h3>Recent Products</h3>
					@foreach ($products as $product)
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
							<h6 class="best2">								
								<a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}"> {{ $product->product_name }}  
								</a>
							</h6>
							@for ($i=1; $i <= 5 ; $i++)
							<fieldset class="avgrating">
								<input type="radio" id="star" name="rating" value="5" />

								<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
							</fieldset>
							@endfor
							@if ($product->discount == null)
								<span class="price-in1">Tk {{ $product->price }}</span>
							@else
								<span class="price-in1">Tk {{ ceil(((100-$product->discount)/100)*$product->price) }}  </span>
							@endif
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"></div>
			</div>
								<!--Product Description-->

			<div class="product-w3agile">
				<h3 class="tittle1">Product Description</h3>

				<div class="product-grids">
					<div class="col-md-4 product-grid">
						<div class="owl-carousel" id="owl-demo">
							<div class="item">
								@foreach ($products as $product)
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
											<h6 class="best2">								
												<a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}"> {{ $product->product_name }}  
												</a>
											</h6>
											@for ($i=1; $i <= 5 ; $i++)
											<fieldset class="avgrating">
												<input type="radio" id="star" name="rating" value="5" />

												<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
											</fieldset>
											@endfor
											@if ($product->discount == null)
											<span class="price-in1">Tk {{ $product->price }}</span>
											@else
											<span class="price-in1">Tk {{ ceil(((100-$product->discount)/100)*$product->price) }}  </span>
											@endif
										</div>
										<div class="clearfix"></div>
									</div>
								@endforeach	
							</div>

							<div class="item">
								@foreach ($products as $product)
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
										<h6 class="best2">								
											<a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}"> {{ $product->product_name }}  
											</a>
										</h6>
										@for ($i=1; $i <= 5 ; $i++)
										<fieldset class="avgrating">
											<input type="radio" id="star" name="rating" value="5" />

											<label  class="glyphicon glyphicon-star{{ ($i <= floor($product->averageRating)) ? '' : '-empty'}}" for="star"></label>
										</fieldset>
										@endfor
										@if ($product->discount == null)
										<span class="price-in1">Tk {{ $product->price }}</span>
										@else
										<span class="price-in1">Tk {{ ceil(((100-$product->discount)/100)*$product->price) }}  </span>
										@endif
									</div>
									<div class="clearfix"></div>
								</div>
								@endforeach						
							</div>
						</div>
						<img alt="" class="img-responsive " src="/images/woo2.jpg" /></div>

						<div class="col-md-8 product-grid1">
							<div class="tab-wl3">
								<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs" role="tabpanel">
									<ul class="nav nav-tabs left-tab" id="myTab" role="tablist">
										<li class="active" role="presentation"><a aria-controls="home" aria-expanded="true" data-toggle="tab" href="#home" id="home-tab" role="tab">Description</a></li>
										<li role="presentation"><a aria-controls="reviews" data-toggle="tab" href="#reviews" id="reviews-tab" role="tab">Reviews (1)</a></li>
									</ul>

									<div class="tab-content" id="myTabContent">
										<div aria-labelledby="home-tab" class="tab-pane fade in active" id="home" role="tabpanel">
											<div class="descr">
												{!! $product->description !!}
											</div>
										</div>

										<div aria-labelledby="reviews-tab" class="tab-pane fade" id="reviews" role="tabpanel">
											<div class="descr">
												<div class="reviews-top">
													@foreach ($product->productreview as $productreview)
													<div class="reviews-left"><img alt=" " class="img-responsive" src="/images/default-user.png" /></div>

													<div class="reviews-right">
														

														<ul>
															<li><a>{{ $productreview->name }}</a></li>
															{{-- <li><a href="#">Reply</a></li> --}}
														</ul>

														<p>{{ $productreview->review }}</p>
													</div>

													<div class="clearfix"></div>
													<br>
													@endforeach
												</div>

												<div class="reviews-bottom">
													<h4>Add Reviews</h4>

													<p>Your email address will not be published. Required fields are marked *</p>

													<form action="/product/review" method="post">
													{{ csrf_field() }}
													
													<input type="hidden" name="id" value="{{ $product->id }}">

													<p>Your Rating</p>
		
													<div class="block">
														<fieldset class="rating">
															<input type="radio" id="star5" name="rating" class="ratings" value="5" />
															<label class = "full" for="star5" title="5 stars"></label>
															<input type="radio" id="star4" name="rating" class="ratings" value="4" />

															<label class = "full" for="star4" title="4 stars"></label>
															<input type="radio" id="star3" name="rating" class="ratings" value="3" />
															<label class = "full" for="star3" title="3 stars"></label>
															<input type="radio" id="star2" name="rating"  class="ratings" value="2" />
															<label class = "full" for="star2" title="2 stars"></label>
															<input type="radio" id="star1" name="rating" class="ratings" value="1" />
															<label class = "full" for="star1" title="1 star"></label>
														</fieldset>

														@if ($errors->has('rating'))
														<br>
														<strong class="errors">{{ $errors->first('rating') }}</strong>
														<br>
														<br>
														@endif
													</div>

													<label>Your Review </label><textarea name="message" onblur="if (this.value == '') {this.value = 'Message...';}" onfocus="this.value = '';" required="" type="text">Message...</textarea>
														@if ($errors->has('message'))
														<strong>{{ $errors->first('message') }}</strong>
														@endif		
														<div class="row">
															<div class="col-md-6 row-grid"><label>Name</label> <input name="name" onblur="if (this.value == '') {this.value = 'Name';}" onfocus="this.value = '';" required="" type="text" value="Name" />
																@if ($errors->has('name'))
																<strong>{{ $errors->first('name') }}</strong>
																@endif
															</div>

															<div class="col-md-6 row-grid"><label>Email</label> <input name="email" onblur="if (this.value == '') {this.value = 'Email';}" onfocus="this.value = '';" required="" type="email" value="Email" />
																@if ($errors->has('email'))
																<strong>{{ $errors->first('email') }}</strong>
																@endif
															</div>
															

															<div class="clearfix"></div>
														</div>
														<input type="submit" value="SEND" />
													</form>
												</div>
											</div>
										</div>
										<div aria-labelledby="custom-tab" class="tab-pane fade" id="custom" role="tabpanel"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--Product Description-->
			</div>
		</div>

		<!--single-->
		<div class="new-arrivals-w3agile">
			<div class="container">
				<h3 class="tittle1">Best Sellers</h3>
				<div class="arrivals-grids">
					@foreach ($products as $product)
					<div class="col-md-3 arrival-grid simpleCart_shelfItem">
						<div class="grid-arr">
							<div class="grid-arrival">
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

							<div class="ribben">
								<p>NEW</p>
							</div>

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
								<h6><a href="/product/{{ $product->id}}/{{ str_replace($str, $repstr ,$product->product_name ) }}"> {{ $product->product_name }} </a></h6>								
								<span class="size grisize{{ $product->id }}"> 
									@if (count($product->productsize) > 0)
									@foreach ($product->productsize as $productsize)
									<a href="" class="sizes sz{{ $productsize->id }}" id="sizes" data-id="{{ $productsize->id }}"> {{ $productsize->size_name }} </a>
									@endforeach
									@else
									<div class="clear"></div
									@endif
									<input type="hidden" class="sizedata" name="size" value="">
								</span>
								<span class="color gricolor{{ $product->id }}" style="padding-top: 10px;"> 
									@if (count($product->productcolor) > 0)
									@foreach ($product->productcolor as $productcolor)
									<a href="" class="colors cz{{ $productcolor->id }}" id="sizes" data-id="{{ $productcolor->id }}"> {{ $productcolor->color_name }} </a>
									@endforeach
									@else
									<div class="clear"></div
									@endif
									<input type="hidden" class="colordata" name="color" value="">
								</span>
								@if ($product->discount == null)
								<p > <em class="item_price"> {{ $product->price }} Tk  </em></p>
								@else
								<p ><del class="griprice{{ $product->id }}">  {{ $product->price }} Tk </del>  <em class="item_price gridiscount{{ $product->id }}">  {{ ceil(((100-$product->discount)/100)*$product->price) }} tk </em></p>
								@endif
								<a class="my-cart-b item_add" data-id="{{ $product->id }}" data-text="Add To Cart" href="#">Add To Cart</a>
								<p class="successmsg msg{{$product->id}}">  </p>
							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

@endsection