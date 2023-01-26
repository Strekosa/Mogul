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

	$('.header-menu .menu-item-has-children .nav-desc').click(function (event) {

		if ($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		} else {
			event.preventDefault();
			$(this).parent().addClass('open');
		}


	});

	// $('.sub-menu .sub-menu-item').each(function () {
	// 	if (!$(this).hasClass('open')) {
	// 		$(this).removeClass('hover')
	// 	}
	//
	// });



});

$(".menu-item").attr("tabindex", 0);
