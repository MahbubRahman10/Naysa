		<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					<div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +88 88 000 111 333</a>
					</div>
					<div class="top-right">
						<ul>
							<li><a href="/checkout">Checkout</a></li>
							@if (Auth::user())
								<li><a href="/user/profile">Hello [{{ Auth::user()->name }}]</a></li>
								<li><a href="/logout">Logout</a></li>
							@else
								<li><a href="/login">Login</a></li>
								<li><a href="/register"> Create Account </a></li>
							@endif
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="/"><img height="80" width="auto" src="/images/logo-01.jpg" alt="logo" class="logo_img"></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div> 
								<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
									<ul class="nav navbar-nav">
										<li class="active"><a href="\" class="act">Home</a></li>	

										<li><a href="/products">Products</a></li>
										<li><a href="/about">About</a></li>
										<li><a href="/gallery">Gallery</a></li>
										<li><a href="/contact-us">Contact</a></li>
									</ul>
								</div>
							</nav>
						</div>
						<div class="logo-nav-right search_icon">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
							<div id="cd-search" class="cd-search">
								<form action="/search" method="post">
								{{ csrf_field() }}
									<input name="search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						<div class="header-right2">
							<div class="cart box_1">
								<a href="/checkout">
									{{-- {{ Cart::content() }} --}}
             {{-- {{ Cart::remove("12ac20109df74f387f28a11b0ba14d46") }} --}}
									<h3> 
										<div class="total">
											<span class="simpleCart_total"> {{ str_replace(',', '' , Cart::total()) }}  </span> Tk (<span id="simpleCart_quantity" class="simpleCart_quantity">{{ Cart::count() }} </span>  items)
										</div>
										<img src="/images/bag.png" alt="" />
									</h3>
								</a>
								<p><a href="/cart/empty-cart" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--header-->