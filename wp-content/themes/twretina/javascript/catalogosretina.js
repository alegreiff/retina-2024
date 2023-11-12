//https://www.youtube.com/watch?v=XySLI8YIRqQ

jQuery(function ($) {
	let laspaginas;
	const botoncarga = $('#rl_loadmore');

	//ajaxLoadMore();
	var filter = $('#filter');
	console.log('======AAA1');
	console.log(filter.serialize());
	console.log('======');
	let img = MyAjax.imagen;

	$.ajax({
		url: MyAjax.ajaxurl,
		data: filter.serialize(),
		type: 'POST',
		beforeSend: function (xhr) {
			$('#load-more-content').html(
				'<img class="rl_imagen_load" alt="" src="' + img + '" />'
			);
		},
		success: function (data) {
			//console.log(data);
			const datos = JSON.parse(data);

			console.log('páginases', datos.paginasresultado);

			const boton = document.querySelector('#carga-contenidos');
			let page = parseInt(boton.getAttribute('data-page'));
			paginador(datos.paginasresultado, page, 1);
			boton.dataset.maxPages = datos.paginasresultado;
			datos.registros > 0
				? $('#rl_maincategory').html(datos.categoriaprincipal)
				: $('#rl_maincategory').html('');
			$('#totales').html(
				'Películas disponibles: ' +
					datos.registros +
					' - ' +
					datos.paginasresultado
			);

			//.html(datos.paginasresultado);
			$('#load-more-content').html(datos.datos); // insert data
			//$('#contenedor_peliculas_pais').html(data);
			checkeoBoton(datos.registros, datos.peliculasporconsulta);
		},
		error: function (err) {
			console.log('001 err net');
			console.log(err);
		},
	});
	return false;
});

jQuery(function ($) {
	//$('#filter').submit(function(){
	$('#filter').on('change', function () {
		var filter = $('#filter');
		console.log(filter.serialize());
		$.ajax({
			url: MyAjax.ajaxurl,
			data: filter.serialize(),
			type: 'POST',
			beforeSend: function (xhr) {
				filter.find('.mensaje').text('cargando películas...'); // changing the button label
				console.log('BeforeSend');
			},
			success: function (data) {
				filter.find('.mensaje').text('Mensaje'); // changing the button label back
				//$('#contenedor_peliculas_pais').html(data); // insert data
				const datos = JSON.parse(data);
				const boton = document.querySelector('#carga-contenidos');
				let page = parseInt(boton.getAttribute('data-page'));
				paginador(datos.paginasresultado, page, 1);

				boton.dataset.maxPages = datos.paginasresultado;
				datos.registros > 0
					? $('#rl_maincategory').html(datos.categoriaprincipal)
					: $('#rl_maincategory').html('');
				$('#totales').html(
					'Películas disponibles: ' +
						datos.registros +
						' - ' +
						datos.paginasresultado
				);
				//.html(datos.paginasresultado);

				$('#load-more-content').html(datos.datos); // insert data
				console.log(
					'CAMBIO EN FILTROS',
					datos.registros,
					datos.peliculasporconsulta
				);
				checkeoBoton(datos.registros, datos.peliculasporconsulta);
			},
			error: function (err) {
				console.log('jajajaja');
				console.log(err);
			},
		});
		return false;
	});
});

const paginador = (veces, actual, estado) => {
	actual = parseInt(actual);
	const el = document.getElementById('rlpaginador');
	el.innerHTML = '';
	console.log(veces, actual);

	if (veces > 1) {
		for (let i = 1; i <= veces; i++) {
			const box = document.createElement('button');

			console.log('compara', actual, i);
			box.innerHTML = i;
			box.setAttribute('data-max-pages', veces);
			box.setAttribute('data-page', i);
			let classesToAddNormal = [
				'btn',
				'btn-primary',
				'm-2',
				'text-3xl',
				'loadmoreDin',
			];
			let classesToAddCurrent = [
				'btn',
				'btn-secondary',
				'm-2',
				'text-3xl',
				'loadmoreDin',
			];
			let diff;
			if (estado === 1) {
				diff = 0;
			} else {
				diff = 1;
			}

			if (actual === i - diff) {
				console.log('ACTUALLL', actual, i);
				box.classList.remove(...classesToAddCurrent);
				box.classList.add(...classesToAddNormal);
			} else {
				/* console.log('DIFF', actual, i); */
				box.classList.remove(...classesToAddNormal);
				box.classList.add(...classesToAddCurrent);
			}

			el.appendChild(box);
		}
	}

	activaBotones();
};

const activaBotones = () => {
	var cards = document.querySelectorAll('.loadmoreDin');
	for (var j = 0; j < cards.length; j++) {
		var card = cards[j];
		let page = parseInt(card.getAttribute('data-page')) - 1;
		let cuantaspelis = card.getAttribute('data-max-pages');

		card.onclick = function () {
			const categoria_mostrada = jQuery(
				'input[name="categoria_mostrada"]:checked'
			).val();
			const formato = jQuery('input[name="formato"]:checked').val();
			const genero = jQuery('input[name="genero"]:checked').val();
			console.log(page, cuantaspelis);

			jQuery.ajax({
				url: MyAjax.ajaxurl,
				type: 'POST',
				data: {
					page: page,
					action: 'filtro_peliculas_retina',
					ajax_nonce: MyAjax.ajaxNonce,
					categoria_mostrada: categoria_mostrada,
					formato: formato,
					genero: genero,
				},

				beforeSend: function (xhr) {},
				success: (response) => {
					const datos = JSON.parse(response);
					jQuery('#load-more-content').html(datos.datos); // insert data

					paginador(cuantaspelis, page, 0);
				},
				error: (response) => {
					console.log(response);
				},
			});
		};
	}
};
const checkeoBoton = (cuantaspelis, pelisporpagina) => {
	activaBotones();

	//let button = document.getElementById('carga-contenidos');

	const boton = document.querySelector('#carga-contenidos');
	boton.dataset.page = 1;
	let totalPagesCount = parseInt(boton.getAttribute('data-max-pages'));

	const categoria_mostrada = jQuery(
		'input[name="categoria_mostrada"]:checked'
	).val();
	const formato = jQuery('input[name="formato"]:checked').val();
	const genero = jQuery('input[name="genero"]:checked').val();
	let page = boton.getAttribute('data-page');

	if (cuantaspelis === 0) {
		boton.textContent = '';
		boton.classList.remove('bg-red-400');
		boton.classList.add('bg-lime-400');
		boton.disabled = true;
	} else {
		boton.textContent = '';
		boton.classList.remove('bg-red-400');
		boton.classList.add('bg-lime-400');
		boton.disabled = true;
	}

	restantes =
		parseInt(cuantaspelis) - parseInt(page) * parseInt(pelisporpagina);
	console.log('DOES NOT UPDATE RESTANTES', restantes);

	if (restantes > 0) {
		boton.disabled = false;
		boton.classList.remove('bg-lime-400');
		boton.classList.add('bg-red-400');
		boton.textContent = 'Cargar más películas: ' + restantes;
	}

	if (totalPagesCount > page) {
		boton.disabled = false;
	}
	const disableboton = () => {
		/* boton.classList.remove('bg-red-400');
		boton.classList.add('bg-lime-400'); */
		boton.disabled = true;
	};

	boton.onclick = () => {
		const restantes =
			parseInt(cuantaspelis) -
			(parseInt(page) + 1) * parseInt(pelisporpagina);

		if (restantes > 0) {
			boton.textContent = 'Cargar más películas: ' + restantes;
		} else {
			boton.textContent = '';
			boton.classList.remove('bg-red-400');
			boton.classList.add('bg-lime-400');
			boton.disabled = true;
		}

		boton.disabled = true;
		jQuery.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {
				page: page,
				action: 'filtro_peliculas_retina',
				ajax_nonce: MyAjax.ajaxNonce,
				categoria_mostrada: categoria_mostrada,
				formato: formato,
				genero: genero,
			},

			beforeSend: function (xhr) {
				console.log('BeforeSend', categoria_mostrada);
				console.log(totalPagesCount, page);
				console.log({ categoria_mostrada, formato, genero });
			},
			success: (response) => {
				const datos = JSON.parse(response);
				//console.log({ datos });

				jQuery('#load-more-content').html(datos.datos); // insert data
				const nuevapagina = parseInt(page) + 1;
				page++;
				boton.dataset.page = nuevapagina;
				console.log(page, ' vs ', totalPagesCount);
				boton.disabled = false;
				if (page === totalPagesCount) {
					disableButton();
				}
				paginador(totalPagesCount, page, 0);
			},
			error: (response) => {
				console.log(response);
			},
		});
	};

	/* button.onclick = () => {
		
	}; */
};
