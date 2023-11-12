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
			autoplay: true,
			interval: 10000,
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
