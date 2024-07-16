
	
	{{-- Site tittle & Meta Tag --}}	
	@yield('title')

	<!-- Icon -->
	<link rel="icon" type="image/png" href="images/logo.jpg">

	<!-- Meta Tag -->
	<meta name="token" id="token" value="{{ Auth::check() ? Auth::id() : null }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!--css-->
	<link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />
	<link href="{{ asset('css/flexslider.css') }}" media="screen" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" />


	<!-- Script -->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
	{{-- <script src="{{ asset('js/simpleCart.min.js') }}"></script> --}}
	<script src="{{ asset('js/jstarbox.js') }}"></script>
	<script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('js/imagezoom.js') }}"></script>
	<script src="{{ asset('js/jstarbox.js') }}"></script>	
	<script src="{{ asset('js/owl.carousel.js') }}"></script>
	<script src="{{ asset('js/lightbox.js') }}"></script>

	@include('sections.script.headscript')

