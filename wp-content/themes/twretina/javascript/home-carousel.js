console.log('funcionamiento del carrusel de eventos OK con delay');

var swiper = new Swiper('.carrus', {
	effect: 'cube',
	loop: true,
	centeredSlides: true,
	slidesPerView: 'auto',

	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});

var swiper = new Swiper('.hrcarrusel-retinamain', {
	grabCursor: true,
	slidesPerView: 7,
	loop: true,
	spaceBetween: 40,
	navigation: {
		nextEl: '#slider-principal-next',
		prevEl: '#slider-principal-prev',
	},
	breakpoints: {
		1290: {
			slidesPerView: 'auto',
			spaceBetween: 30,
		},
	},
});

var swiper = new Swiper('.hrcarrusel-retinasalidas', {
	grabCursor: true,
	slidesPerView: 'auto',
	loop: true,
	spaceBetween: 30,
	navigation: {
		nextEl: '#slider-salidas-next',
		prevEl: '#slider-salidas-prev',
	},
});
