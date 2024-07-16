	<!--search jQuery-->
	<script>
	    $(function () {
	      $("#slider").responsiveSlides({
	      	auto: true,
	      	nav: true,
	      	speed: 500,
	        namespace: "callbacks",
	        pager: true,
	      });
	    });
	 </script>


	<!--start-rate-->
	 <script type="text/javascript">
	 	jQuery(function() {
	 		jQuery('.starbox').each(function() {
	 			var starbox = jQuery(this);
	 			starbox.starbox({
	 				average: starbox.attr('data-start-value'),
	 				changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
	 				ghosting: starbox.hasClass('ghosting'),
	 				autoUpdateAverage: starbox.hasClass('autoupdate'),
	 				buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
	 				stars: starbox.attr('data-star-count') || 5
	 			}).bind('starbox-value-changed', function(event, value) {
	 				if(starbox.hasClass('random')) {
	 					var val = Math.random();
	 					starbox.next().text(' '+val);
	 					return val;
	 				} 
	 			})
	 		});
	 	});
	 </script>

	 <!-- Single Product View -->
	<script>
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<script type="text/javascript">
		jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
				starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
						var val = Math.random();
						starbox.next().text(' '+val);
						return val;
					} 
				})
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 1,
				lazyLoad : true,
				autoPlay : true,
				navigation : false,
				navigationText :  false,
				pagination : true,
			});
		});
	</script>