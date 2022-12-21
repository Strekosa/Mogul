jQuery(document).ready(() => {
	jQuery('.reviews-slider').slick({
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
				breakpoint: 1250,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
});
