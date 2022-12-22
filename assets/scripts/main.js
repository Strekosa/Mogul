// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"

// Import Slick
import 'slick-carousel';

jQuery(document).ready(() => {
	$('.nav-tgl').click(function () {
		$('.nav-tgl,.header-menu').toggleClass('active');
		$('body').toggleClass('lock');
	});

	$('.reviews-slider').slick({
		dots: false,
		arrows: true,
		autoplay: false,
		autoplaySpeed: 2000,
		infinite: true,
		speed: 500,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});
});

$(".menu-item").attr("tabindex",0);

