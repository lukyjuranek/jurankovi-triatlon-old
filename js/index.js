// Internet Explorer 6-11
var isIE = /*@cc_on!@*/false || !!document.documentMode;

if(isIE){
	console.log("IE is not supported");
	window.location.replace("/ie");
}





$(document).ready(function () {
	
	//Contact scroll
	if (window.location.pathname.endsWith("/index") || window.location.pathname.endsWith("/")) {
		$('#contact-link').click(function () {
			$('html, body').animate({
				scrollTop: $("footer").offset().top - 650
			}, 1000);
			// Zavře navbar pouze když je collapsed
			if (window.innerWidth <= 767) {
				$('.navbar-toggler').click();
			};

		});
	};
	// //Contact scroll
	// if (window.location.pathname.endsWith("/gallery_training") || window.location.pathname.endsWith("/gallery_races")) {
	// 	$('.dropdown-item').click(function () {
	// 		// Zavře navbar pouze když je collapsed
	// 		if (window.innerWidth <= 767) {
	// 			$('.navbar-toggler').click();
	// 		};

	// 	});
	// };


	//Odtsraní mezeru v dropdown menu v navigaci společně s css styly
	// .open>.dropdown-menu{
	// 	margin-top: initial;
	// }
	const menu = $("li.dropdown");
	menu.on("mouseenter mouseleave", function() {
		menu.toggleClass("open");
	});


	if (window.location.pathname.endsWith("/index") || window.location.pathname.endsWith("/")) {
		$(window).scroll(function (e) {
			var scrolled = $(window).scrollTop();
			$('body').css('background-position-y', -(scrolled * 0.2) + 'px');
		});
	}
	
	
	
	
	
	
	//Schová navbar v gallery při scrollování
	if (window.location.pathname.endsWith("/gallery_training") || window.location.pathname.endsWith("/gallery_races") || window.location.pathname.endsWith("/gallery_video")) {
		
		lazyload();
		
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
				$(".fixed-top").css("top", "0");
			} else {
				if (currentScrollPos > 82){
					$(".fixed-top").css("top", "-82px");
				}
			}
			prevScrollpos = currentScrollPos;
		};


		// [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
		// 	img.setAttribute('src', img.getAttribute('data-src'));
		// 	img.onload = function() {
		// 		img.removeAttribute('data-src');
		// 		console.log(img);
		// 	};
		// });
	
	
	
	
		// $(function () {
		// 	var lastScrollTop = 0;
		// 	var $navbar = $('.navbar');
		// 	var navbarHeight = $navbar.outerHeight();
		// 	var movement = 0;
		// 	var lastDirection = 0;
	
		// 	$(window).scroll(function (event) {
		// 		var st = $(this).scrollTop();
		// 		movement += st - lastScrollTop;
	
		// 		if (st > lastScrollTop) { // scroll down
		// 			if (lastDirection != 1) {
		// 				movement = 0;
		// 			}
		// 			var margin = Math.abs(movement);
		// 			if (margin > navbarHeight) {
		// 				margin = navbarHeight;
		// 			}
		// 			margin = -margin;
		// 			$navbar.css('margin-top', margin + "px")
	
		// 			lastDirection = 1;
		// 		} else { // scroll up
		// 			if (lastDirection != -1) {
		// 				movement = 0;
		// 			}
		// 			var margin = Math.abs(movement);
		// 			if (margin > navbarHeight) {
		// 				margin = navbarHeight;
		// 			}
		// 			margin = margin - navbarHeight;
		// 			$navbar.css('margin-top', margin + "px")
	
		// 			lastDirection = -1;
		// 		}
	
		// 		lastScrollTop = st;
		// 		// console.log(margin);
		// 	});
		// });
	};


});

