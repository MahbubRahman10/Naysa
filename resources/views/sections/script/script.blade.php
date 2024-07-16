
{{-- New Product Hover --}}
<script type="text/javascript">
	$(document).ready(function() {
		// $(document).on('mouseover', '.new_product', function() {
			
		// 	$(".rslides").responsiveSlides({
		// 		auto: true,             
		// 		speed: 500,            
		// 		timeout: 100000,         
		// 		pager: false,          
		// 		nav: false,            
		// 		random: false,         
		// 		pause: true,          
		// 		pauseControls: true,   
		// 		prevText: "Previous",  
		// 		nextText: "Next",       
		// 		maxwidth: "",           
		// 		navContainer: "",       
		// 		manualControls: "",    
		// 		namespace: "rslides",   
		// 		before: function(){},   
		// 		after: function(){}     
		// 	});

		// });
		// $(document).on('mouseout', '.new_product', function() {
				
		// 	$(".rslides").responsiveSlides({
		// 		auto: true,             
		// 		speed: 500,            
		// 		timeout: 4000,         
		// 		pager: false,          
		// 		nav: false,            
		// 		random: false,         
		// 		pause: false,          
		// 		pauseControls: true,   
		// 		prevText: "Previous",  
		// 		nextText: "Next",       
		// 		maxwidth: "",           
		// 		navContainer: "",       
		// 		manualControls: "",    
		// 		namespace: "rslides",   
		// 		before: function(){},   
		// 		after: function(){}     
		// 	});
			
		// });

		$('.new_product').mouseover(function() {	
			$(".rslides").responsiveSlides({
				auto: true,             
				speed: 500,            
				timeout: 4000,         
				pager: false,          
				nav: false,            
				random: false,         
				pause: true,          
				pauseControls: true,   
				prevText: "Previous",  
				nextText: "Next",       
				maxwidth: "",           
				navContainer: "",       
				manualControls: "",    
				namespace: "rslides",   
				before: function(){},   
				after: function(){}     
			});

		});

		// $('.new_product').mouseout(function() {
			
		// 	$(".rslides").responsiveSlides({
		// 		auto: true,             
		// 		speed: 500,            
		// 		timeout: 4000,         
		// 		pager: false,          
		// 		nav: false,            
		// 		random: false,         
		// 		pause: false,          
		// 		pauseControls: true,   
		// 		prevText: "Previous",  
		// 		nextText: "Next",       
		// 		maxwidth: "",           
		// 		navContainer: "",       
		// 		manualControls: "",    
		// 		namespace: "rslides",   
		// 		before: function(){},   
		// 		after: function(){}     
		// 	});

		// });


	});
</script>







{{-- Product Category/Subcategory --}}
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.categorychecked', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');
			var  display = $('.subcategoryview'+id).css('display');

			if (display == 'none') {
				$('.subcategoryview'+id).css('display', 'block');	
			}
			else{
				$('.subcategoryview'+id).css('display', 'none');
			}

		});
	});
</script>



{{-- Size Select --}}
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.sizes', function(event) {
			event.preventDefault();
			$( '.sizes').removeClass("sizeselect");
			var id  = $(this).attr('data-id');
			$( '.sz'+id).addClass("sizeselect");
			$( '.sizedata').val(id)
		});
	});
</script>


{{-- Color Select --}}
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.colors', function(event) {
			event.preventDefault();
			$( '.colors').removeClass("colorselect");
			var id  = $(this).attr('data-id');
			$( '.cz'+id).addClass("colorselect");
			$( '.colordata').val(id)
		});
	});
</script>


{{-- Add To Cart --}}
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.item_add', function(event) {
			event.preventDefault();

			var id  = $(this).attr('data-id');



			var qty = $('.qty').html();
			var size = $('.sizedata').val();
			var color = $('.colordata').val();

			var model = $(this).attr('data-model');

			$('.msg'+id).html('');
			$('.msg'+id).css('display', 'block');
			$('.msg').html('');
			$('.msg').css('display', 'block');


			$.ajax({
				url : "/cart/add-to-cart",
				type: "GET",
				data: {'id':id, 'quantity':qty, 'size':size,'color':color},
				dataType: "JSON",
				success: function (data) {
					if (model == "yes") {
						$(".mcartloading").css('display', 'block');
					}
					else{
						$(".cartloading"+id).css('display', 'block');
					}
					if(data.status == 'failed'){
						if (model =="yes") {
							setTimeout(function(){
								$(".mcartloading").css('display', 'none');            
								$('.msg').html("Sorry, Out of Stock")
								$('.msg').html("Item added Successfully")
								$('.msg').css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg").html('');
							}, 3000);
						}
						else{
							setTimeout(function(){
								$(".cartloading"+id).css('display', 'none');            
								$('.msg'+id).html("Sorry, Out of Stock")
								$('.msg'+id).html("Item added Successfully")
								$('.msg'+id).css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg"+id).css('display', 'none');
							}, 3000);
						}
					}
					else if(data.status == 'failedsize'){
						if (model == "yes") {
							setTimeout(function(){
								$(".mcartloading").css('display', 'none');            
								$('.msg').html("Please select product size")
								$('.msg').html("Please select the size")
								$('.msg').css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg").html('');
							}, 3000);
						}
						else{
							setTimeout(function(){
								$(".cartloading"+id).css('display', 'none');            
								$('.msg'+id).html("Please select product size")
								$('.msg'+id).html("Please select the size")
								$('.msg'+id).css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg"+id).html('');
							}, 3000);
						}
					}
					else if(data.status == 'failedcolor'){
						if (model == "yes") {
							setTimeout(function(){
								$(".mcartloading").css('display', 'none');            
								$('.msg').html("Please select product color")
								$('.msg').html("Please select the color")
								$('.msg').css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg").html('');
							}, 3000);
						}
						else{
							setTimeout(function(){
								$(".cartloading"+id).css('display', 'none');            
								$('.msg'+id).html("Please select product color")
								$('.msg'+id).html("Please select the color")
								$('.msg'+id).css({
									'color': 'red',
									'font-weight': 'bold'
								});
							}, 500);
							setTimeout(function(){            
								$(".msg"+id).html('');
							}, 3000);
						}
					}
					else if(data.status == 'success'){
						if (model == "yes") {
							setTimeout(function(){
								$(".mcartloading").css('display', 'none');            
								$('.msg').html("Item added Successfully")
								$('.msg').css({
									'color': 'green',
									'font-weight': 'bold'
								});
							}, 100);
							setTimeout(function(){            
								$('.msg').html('');
							}, 3000);

							$('.simpleCart_total').html(data.totals)        
							$('.simpleCart_quantity').html(data.items)
						}
						else{
							setTimeout(function(){
								$(".cartloading"+id).css('display', 'none');            
								$('.msg'+id).html("Item added Successfully")
								$('.msg'+id).css({
									'color': 'green',
									'font-weight': 'bold'
								});
							}, 100);
							setTimeout(function(){            
								$('.msg'+id).html('');
							}, 3000);

							$('.simpleCart_total').html(data.totals)        
							$('.simpleCart_quantity').html(data.items) 
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 
		});
	});
</script>


{{-- Update Cart --}}
<script type="text/javascript">
		
	$(document).ready(function() {
		$(document).on('click', '.pls', function(event) {
			event.preventDefault();
			var id =  $(this).attr('data-id')
			var rowId = $(this).attr('data-row')
			var qty = $('.qty').html()

			$('.msg'+id).css('display', 'block');

			$(this).update(id, rowId, qty);

		});
		$(document).on('click', '.mns', function(event) {
			event.preventDefault();
			var id =  $(this).attr('data-id')
			var rowId = $(this).attr('data-row')
			var qty = $('.qty').html()

			$('.msg'+id).css('display', 'block');
			$(this).update(id, rowId, qty);
		});

		$.fn.update = function(id, rowId, qty) { 
			$.ajax({
				url : "/cart/update-cart",
				type: "GET",
				data: {'id':id, 'rowId':rowId, 'quantity':qty},
				dataType: "JSON",
				success: function (data) {
					if (data.status == 'success') {
						// setTimeout(function(){            
						// 	$(".msg"+id).html("Updated your product quantity.")
						// 	$(".msg"+id).css('color', 'green');
						// }, 500);

						// setTimeout(function(){            
						// 	$(".msg"+id).css('display', 'none');
						// }, 3000);

						alert("Updated your product quantity Successfully")

		                // Update all Data
		                $('.simpleCart_total').html(data.totals)        
						$('.simpleCart_quantity').html(data.items) 

            		}
		            else if(data.status == 'failed'){
		            	// setTimeout(function(){            
		            	// 	$(".msg"+id).html("Too much quantity")
		            	// 	$(".msg"+id).css('color', 'red');
		            	// }, 500);

		            	// setTimeout(function(){            
		            	// 	$(".msg"+id).css('display', 'none');
		            	// }, 3000);

		            	alert("Soory, Out of Stock")

		            }

        		},
        		error: function (textStatus, errorThrown) {
        		}
    		}); 
		}
	});
</script>

{{-- Remove Single Item From Cart --}}
<script>$(document).ready(function(c) {
	$('.close1').on('click', function(c){
			// $('.cart-header2').fadeOut('slow', function(c){
			// 	$('.cart-header2').remove();
			// });
			var id =  $(this).attr('data-id')
			var rowId = $(this).attr('data-row')
			
			var checkstr =  confirm('Are you want to remove this product from cart?');
			if(checkstr == true){
				$.ajax({
				url : "/cart/remove-from-cart",
					type: "GET",
					data: {'id':rowId},
					dataType: "JSON",
					success: function (data) {
						if(data.status == 'success'){							
							$('.simpleCart_total').html(data.totals)        
							$('.simpleCart_quantity').html(data.items) 
							$('.totalcart').html(data.items) 
							$('.carthead'+id).fadeOut('slow', function(c){
								$('.carthead'+id).remove();
							});
							if (data.items == 0) {
								$('.cart-footer').css('display', 'none');
								
								setTimeout(function(){            
									$('#container').append("<h4 style=color: #4c4c4c;>Your shopping cart is empty. <a href='\'>&nbsp;Continue Shopping</a></h4>")
								}, 500);
							}
						}
					},
					error: function (textStatus, errorThrown) {
						alert("Somethimg Error")
					}
				}); 
			}else{
				
			}

		});	  
	});
</script>



{{-- Add To Wishlist --}}
<script type="text/javascript">
	$(document).ready(function(){
		$(".wishlist_add").click(function(event) {
			event.preventDefault();

			var id = $(this).attr('data-id');

			var model = $(this).attr('data-model');

			if (model == 'yes') {
				$(".mcartloading").css('display', 'block');
			}
			else{
				$(".cartloading"+id).css('display', 'block');
			}

			$(".wmsg"+id).css('display', 'block');
			$(".wmsg"+id).html('');
			$(".msg").css('display', 'block');
			$(".msg").html('');

			var user = $('meta[name=token]').attr("value");

			if (user == '') {
				setTimeout(function(){  
					if (model == 'yes') {
						$(".mcartloading").css('display', 'none');
					}
					else{
						$(".cartloading"+id).css('display', 'none');
					} 
					// if (model == 'yes') {
					// 	$(".msg").html("Please sign in to add this item")
					// 	$(".msg").css({
					// 		'color': 'red',
					// 		'font-weight': 'bold'
					// 	})
					// }
					// else{
					// 	$(".wmsg"+id).html("Please sign in to add this item")
					// 	$(".wmsg"+id).css({
					// 		'color': 'red',
					// 		'font-weight': 'bold'
					// 	});
					// }

					var checkstr =  confirm('You need to Sign in to add this item.');
					if (checkstr == true) {
						window.location.href = '/login';
					}
					else{
						return false;
					}

				}, 500);
				setTimeout(function(){            
					$(".wmsg"+id).html('');
								$(".msg").html('');
				}, 5000);
			}
			else{
				$.ajax({
					url : "/cart/add-to-wishlist",
					type: "GET",
					data: {'id':id},
					dataType: "JSON",
					success: function (data) {
						if (data == 200) {
							setTimeout(function(){  
								if (model == 'yes') {
									$(".mcartloading").css('display', 'none');
								}
								else{
									$(".cartloading"+id).css('display', 'none');
								}          
								if (model == 'yes') {
									$(".msg").html("The product is added successfully.")
									$(".msg").css({
										'color': 'green',
										'font-weight': 'bold'
									});
								}
								else{
									$(".wmsg"+id).html("The product is added successfully.")
									$(".wmsg"+id).css({
										'color': 'green',
										'font-weight': 'bold'
									});
								}
							}, 500);

							setTimeout(function(){            
								$(".wmsg"+id).html('');
								$(".msg").html('');
							}, 5000);
						}
						else if(data == 401){
							setTimeout(function(){  
								if (model == 'yes') {
									$(".mcartloading").css('display', 'none');
								}
								else{
									$(".cartloading"+id).css('display', 'none');
								}          
								if (model == "yes") {
									$(".msg").html("This product is already in your wishlist")
									$(".msg").css({
										'color': 'green',
										'font-weight': 'bold'
									});
								}
								else{
									$(".wmsg"+id).html("This product is already in your wishlist")
									$(".wmsg"+id).css({
										'color': 'green',
										'font-weight': 'bold'
									});
								}
							}, 500);

							setTimeout(function(){            
								$(".wmsg"+id).html('');
								$(".msg").html('');
							}, 5000);
						}
					},
					error: function (textStatus, errorThrown) {
					}
				}); 
			}
		})
	})
</script>