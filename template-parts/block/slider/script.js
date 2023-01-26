jQuery(document).ready(() => {
	const swiper = new Swiper('.swiper', {
		// Optional parameters

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			// dynamicBullets: true,
			// renderBullet: function (index, className) {
			// 	return '<span class="' + className + '" >' + (index + 1) + '</span >';
			// },
			type: "fraction",
			renderFraction: function (currentClass, totalClass) {
				return 'Photo <span class="' + currentClass + '" ></span>' + 'out of' + ' <span class="' + totalClass + '" ></span>';
			},
			//type: "progressbar",
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
			draggable: true,
		},
		slideToClickedSlide: true,
		grabCursor: true,
		keyboard: {
			enabled: true,
			onlyInViewport: true,
			pageUpDown: true,
		},
		mousewheel: {
			sensitivity: 1,
			eventsTarget: '.swiper',
		},
		autoHeight: false,
		slidesPerView: 1,
		slidesPerGroup: 1,
		initialSlide: 0,
		centeredSlides: false,
		watchOverflow: true,
		spaceBetween: 30,
		//slidesPerColumn: 2,
		loop: true,
		freeMode: true,
		// autoplay: {
		// 	delay: 0,
		// 	stopOnLastSlide: false,
		// 	disableOnInteraction: false,
		// },
		speed: 2000,
		direction: "vertical",
		effect: "cube",
		cubeEffect: {
			slideShadows: true,
			shadow: true,
			shadowOffset: 20,
			shadowScale: 0.94,
		},
		preloadImages: false,
		lazy: {
			loadOnTransitionStart: false,
			loadPrevNext: false,
		},
		watchSlidesProgress: true,
		watchSlidesVisibility: true,
		zoom: {
			maxRatio: 5,
			minRatio:1,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
		},
	});
});
