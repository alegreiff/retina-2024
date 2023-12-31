(() => {
	// javascript/home-carousel.splide.js
	document.addEventListener('DOMContentLoaded', function () {
		function getRandomInt(max) {
			return Math.floor(Math.random() * max);
		}
		let slides = this.getElementsByClassName('rl_slide_home');
		const inicioSlide = getRandomInt(slides.length);
		console.log('INICIO', inicioSlide);

		const carruselInicio = this.getElementById('js_carruselinicio');

		if (carruselInicio) {
			new Splide('#js_carruselinicio', {
				perPage: 1,
				type: 'loop',
				rewind: true,
				pagination: true,
				start: inicioSlide,
				autoplay: true,
				interval: 7000,
				arrows: false,
			}).mount();
		}

		/* const blogInicio = this.getElementById('js_retinablog');

		if (blogInicio) {
			new Splide('#js_retinablog', {
				perPage: 1,
				perMove: 1,
				arrows: true,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 15,

				mediaQuery: 'min',
				breakpoints: {
					1023: {
						type: 'loop',
						perPage: 1,
						perMove: 1,
						arrows: true,
						rewind: true,
						pagination: false,
						
					},
					1024: {
						
						destroy: true,
					},
				},
				
			}).mount();
		} */

		const peliculasBase = this.getElementById('retinaxios');
		if (peliculasBase) {
			new Splide('#retinaxios', {
				perPage: 6,
				perMove: 1,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 25,
				autoplay: true,
				interval: 10000,
				//start: inicioSlide,
			}).mount();
		}

		const personajesRetina = this.getElementById('js_retinapersonajes');
		if (personajesRetina) {
			new Splide('#js_retinapersonajes', {
				perPage: 1,
				perMove: 1,
				arrows: true,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 15,

				mediaQuery: 'min',
				breakpoints: {
					640: {
						perPage: 2,
						arrows: true,
						//destroy: true,
					},
					1024: {
						perPage: 4,
						arrows: false,
						//destroy: true,
					},
				},
				//start: inicioSlide,
			}).mount();
		}

		const seleccionadosRetina = this.getElementById(
			'js_retinaseleccionados'
		);
		if (seleccionadosRetina) {
			new Splide('#js_retinaseleccionados', {
				perPage: 1,
				perMove: 1,
				arrows: true,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 15,

				mediaQuery: 'min',
				breakpoints: {
					640: {
						perPage: 2,
						arrows: true,
						//destroy: true,
					},
					1024: {
						perPage: 3,
						arrows: false,
						//destroy: true,
					},
				},
				//start: inicioSlide,
			}).mount();
		}

		const peliculasSalidas = this.getElementById('js_retinasalidas');
		if (peliculasSalidas) {
			new Splide('#js_retinasalidas', {
				perPage: 6,
				perMove: 1,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 25,
				autoplay: true,
				interval: 10000,
				//start: inicioSlide,
			}).mount();
		}
		const peliculasTendencia = this.getElementById('js_retinaentendencia');
		if (peliculasTendencia) {
			new Splide('#js_retinaentendencia', {
				perPage: 6,
				perMove: 1,
				type: 'loop',
				rewind: true,
				pagination: false,
				gap: 25,
				autoplay: true,
				interval: 10000,
				/* mediaQuery: 'min',
				breakpoints: {
					640: {
						destroy: true,
					},
				}, */
				//start: inicioSlide,
			}).mount();
		}

		const z = new Splide('#js_lasmasvistas', {
			perPage: 4,
			perMove: 1,
			type: 'loop',
			rewind: false,
			pagination: false,
			gap: 25,
			/* autoplay: true,
			interval: 10000, */
		}).mount();
	});
})();

function SlideNumber(Splide, Components) {
	const { track } = Components.Elements;

	let elm;

	function mount() {
		elm = document.createElement('div');
		elm.style.textAlign = 'center';
		elm.style.marginTop = '0.5em';

		track.parentElement.insertBefore(elm, track.nextSibling);

		update();
		Splide.on('move', update);
	}

	function update() {
		elm.textContent = `${Splide.index + 1}/${Splide.length}`;
	}

	return {
		mount,
	};
}
