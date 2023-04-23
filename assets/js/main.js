 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
	
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 3
				},
				1000:{
					items: 3
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });



	var goHere = function() {

		$('.mouse-icon').on('click', function(event){
			
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $('.goto-here').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});
	};
	goHere();


	function makeTimer() {

		var endTime = new Date("21 December 2019 9:56:00 GMT+01:00");			
		endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
		now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400); 
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }

		$("#days").html(days + "<span>Days</span>");
		$("#hours").html(hours + "<span>Hours</span>");
		$("#minutes").html(minutes + "<span>Minutes</span>");
		$("#seconds").html(seconds + "<span>Seconds</span>");		

}

setInterval(function() { makeTimer(); }, 1000);








})(jQuery);


/*Count comments*/

var countComments= null ;


function getTotalComments() {

	 countComments=countComments+1;
	 $("#totalComments").html(countComments);
  
  
}

/*Output Comments and reply on comment*/

function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

 // запрос ajax при отправки

$('#formComment').on('submit', (e)=>{
	e.preventDefault(); /*отмена действия по умолчанию*/
	
	let form = $('#formComment');
	let str = form.serialize(); /* возвращает строку пригодную для передачи через URL строку- подходит для текстовых данных*/

 

	$.ajax({
	    url: '/modules/comment-add.php',         /* Куда отправить запрос */
	    method: 'POST',             /* Метод запроса (post или get) */
	    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	    processData: false,
	    /*contentType: false,*/
	    data: str,     /* Данные передаваемые в массиве */
	    success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
		   /* let ajaxStatus=$('#comment-list').prepend(response);*/ /* В переменной data содержится ответ от twit-add.php. Вставить ответ в список твитов */
		  var result = eval('(' + response + ')');
		   /*console.log(result);   */
            if (response)
                        {
                        	 
                            $("#name").val("");
                            $("#email").val("");
                            $("#message").val("");
                     	   getTotalComments();
                     	   listComment(); 
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }


		    
	    }
    });
	
})

$(document).ready(function () {
            	   listComment();
            });

 function listComment() {
                $.post("/modules/comment-list.php",
                        function (data) {
                           var data = JSON.parse(data);
                          

                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='comment-list' >");
                            var item = $("<li class='comment'>").html(comments);


                            for (var i = 0; (i < data.length); i++)
                            {

                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];
                                

                                if (parent == "0")
                                {
                                    comments =  "<div class='vcard bio'><img src='assets/images/person_1.jpg' alt='Image placeholder'></div><div class='comment-body'><h3>" + data[i]['comment_sender_name'] + "</h3>" +
                    "<div class='meta'>" + data[i]['comment_at'] + "</div><p>" + data[i]['comment'] + "</p><p><a  onClick='postReply(" + commentId + ")' class='reply'>Reply</a></p>"+
                  "</div> ";


                                    
                 

                                    var item = $("<li class='comment'>").html(comments);
                                    list.append(item);
                                    var reply_list = $("<ul class='children'>");
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            } 

function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='vcard bio'><img src='assets/images/person_1.jpg' alt='Image placeholder'></div><div class='comment-body'><h3>" + data[i]['comment_sender_name'] + "</h3>" +
                        "<div class='meta'>" + data[i]['comment_at'] + "</div><p>" + data[i]['comment'] + "</p><p><a  onClick='postReply(" + data[i]['comment_id'] + ")' class='reply'>Reply</a></p>"+
                       "</div> ";
                        var item = $("<li class='comment'>").html(comments);
                        var reply_list = $("<ul class='children'>");
                        list.append(reply_list);
                        reply_list.append(item);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }

          

/*quantity products in single-product*/

 $(document).ready(function(){
		
		    var quantitiy=0;
		       $('.quantity-right-plus').click(function(e){
		            
		            // Stop acting like a button
		            e.preventDefault();
		            // Get the field name
		            var quantity = parseInt($('#quantity').val());
		            
		            // If is not undefined
		                
		                $('#quantity').val(quantity + 1);
		
		              
		                // Increment
		            
		        });
		
		         $('.quantity-left-minus').click(function(e){
		            // Stop acting like a button
		            e.preventDefault();
		            // Get the field name
		            var quantity = parseInt($('#quantity').val());
		            
		            // If is not undefined
		          
		                // Increment
		                if(quantity>0){
		                $('#quantity').val(quantity - 1);
		                }
		        });

/*total price product in cart*/


                  /* function change($tr, val) {
				    var $input = $tr.find('.quantity');
				    var count = parseInt($input.val()) + val;
				    count = count < 1 ? 1 : count;
				    $input.val(count);
				    var $price = $tr.find('.count_price');
				    $price.text(count * $price.data('price'));
				  }
				  $('.minus').click(function() {
				    change($(this).closest('tr'), -1);
				  });
				  $('.plus').click(function() {
				    change($(this).closest('tr'), 1);
				  });*/


                  $('.quantity.form-control.input-number').on("change", function() {
                  	var $total = $(this).closest('tr').find('.totalPricel');
				    var $price = $(this).closest('tr').find('.priceItem');
				    var summ = 0;

				    if(Number($('.quantity.form-control.input-number').val()) >=1 && Number($('.quantity.form-control.input-number').val()) <=100 ) {
						 $total.text(this.value * $price.data('price'));
						 totalSummInCart();
						 
						} else {
						    $('.quantity.form-control.input-number').val('0');
						}
				    
				  });	
				
				  
				  $('.quantity.form-control.input-number').on("input", function() {
				  	var $total = $(this).closest('tr').find('.totalPrice');
				    var $price = $(this).closest('tr').find('.priceItem');
				    
				     if(Number($('.quantity.form-control.input-number').val()) >=1 && Number($('.quantity.form-control.input-number').val()) <=100 ) {
						 $total.text(this.value * $price.data('price'));
						 totalSummInCart();

						} else if($('.quantity.form-control.input-number').val()!==Number) {
								   alert('Введить число')
								} else {
						    $('.quantity.form-control.input-number').val('0');
						}
				  });


      function totalSummInCart(){
				var summ = 0;
				 
				$('.text-center.item').each(function(){
				     summ += parseInt($(this).find('.totalPrice').text()) ;
				});	
				$('#total-sum-all-items').text(summ);
               
				}

/*$('ul.product-category > li').on('click', function(e) {
	            e.preventDefault();
                $('a.product-category-sort.active').removeClass('active');                                            
               $(this).children('.product-category-sort').toggleClass('active');
               
           })*/

/*
ADD products to cart from page home*/

function showCartQty() {
	
	let cartQty =parseInt($('.mini-cart-qty').text());
	$('.mini-cart-qty').text(cartQty+1);
}

     $('.add-to-cart').on('click', function(e){
         e.preventDefault();
         let id=$(this).data('id');

         $.ajax({
         	url: '/partials/pages/my-cart.php',
         	type: 'GET',
         	data: {cart: 'add', id: id},
         	dataType: 'json',
         	success: function(response){
         		if(response.code == 'OK'){
         			alert('Ви додали товар до кошику');
         			showCartQty();
         		} else {
         			alert(response.answer);
         		}
         	},
         	error: function(){
         		console.log('Error');
         	}

         })
           })


    
});



function onChange() {
  const password = document.querySelector('input[name=password]');
  const confirm = document.querySelector('input[name=confirm]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}