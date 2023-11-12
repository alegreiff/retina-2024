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
			const datos = JSON.parse(data);
			console.log('páginases', datos.tres);
			laspaginas = datos.tres;
			const boton = document.querySelector('#load-more');
			boton.dataset.maxPages = datos.tres;
			$('#totales').html(datos.uno);
			$('#load-more-content').html(datos.dos); // insert data
			//$('#contenedor_peliculas_pais').html(data);
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
				$('#totales').html(datos.uno);
				$('#load-more-content').html(datos.dos); // insert data
			},
			error: function (err) {
				console.log('jajajaja');
				console.log(err);
			},
		});
		return false;
	});
});

/*LOADMORE*/
(function ($) {
	/**
	 * Class Loadmore.
	 */
	class LoadMore {
		/**
		 * Contructor.
		 */
		constructor() {
			this.ajaxUrl = MyAjax?.ajaxurl ?? '';
			this.ajaxNonce = MyAjax?.security ?? '';
			this.loadMoreBtn = $('#load-more');
			this.loadingTextEl = $('#loading-text');
			this.boton = document.querySelector('#load-more');
			//this.numerodepaginas = $('#ttpages').text();

			this.isRequestProcessing = false;

			//ADDED JAIME

			this.options = {
				root: null,
				rootMargin: '0px',
				threshold: 1.0, // 1.0 means set isIntersecting to true when element comes in 100% view.
			};

			this.init();
		}

		init() {
			if (!this.loadMoreBtn.length) {
				return;
			}
			this.loadMoreBtn.on('click', () => this.handleLoadMorePosts());

			/* this.totalPagesCount = $('#post-pagination').data('max-pages'); */
			//this.totalPagesCount = $('#load-more').data('max-pages');

			this.totalPagesCount = this.boton.getAttribute('data-max-pages');

			console.log('EL BOTON ETSISTE', this.totalPagesCount);

			/**
			 * Add the IntersectionObserver api, and listen to the load more intersection status.
			 * so that intersectionObserverCallback gets called if the element intersection status changes.
			 *
			 * @type {IntersectionObserver}
			 */
			const observer = new IntersectionObserver(
				(entries) => this.intersectionObserverCallback(entries),
				this.options
			);
			observer.observe(this.loadMoreBtn[0]);
		}

		/**
		 * Gets called on initial render with status 'isIntersecting' as false and then
		 * everytime element intersection status changes.
		 *
		 * @param {array} entries No of elements under observation.
		 *
		 */
		intersectionObserverCallback(entries) {
			console.log('ObservaMMME');
			// array of observing elements

			// The logic is apply for each entry ( in this case it's just one loadmore button )
			entries.forEach((entry) => {
				console.log('ENTRY', entry);
				// If load more button in view.
				if (entry?.isIntersecting) {
					this.handleLoadMorePosts();
				}
			});
		}

		/*

*/

		/**
		 * Load more posts.
		 *
		 * 1.Make an ajax request, by incrementing the page no. by one on each request.
		 * 2.Append new/more posts to the existing content.
		 * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
		 * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
		 * there will be no further ajax request since there won't be any more posts available.
		 *
		 * @return null
		 */
		handleLoadMorePosts() {
			// Get page no from data attribute of load-more button.
			this.totalPagesCount = this.boton.getAttribute('data-max-pages');
			console.log('páginas 165: ', this.totalPagesCount);

			const categoria_mostrada = $(
				'input[name="categoria_mostrada"]:checked'
			).val();
			const formato = $('input[name="formato"]:checked').val();
			const genero = $('input[name="genero"]:checked').val();
			const boton = document.querySelector('#load-more');
			const page = boton.getAttribute('data-page');
			console.log('Paige', page);
			if (!page || this.isRequestProcessing) {
				return null;
			}

			const nextPage = parseInt(page) + 1; // Increment page count by one.
			this.isRequestProcessing = true;

			$.ajax({
				url: this.ajaxUrl,
				type: 'POST',
				data: {
					page: page,
					action: 'filtro_peliculas_retina',
					ajax_nonce: this.ajaxNonce,
					categoria_mostrada: categoria_mostrada,
					formato: formato,
					genero: genero,

					//jaime: 'de greiff',
				},

				beforeSend: function (xhr) {
					console.log('BeforeSend', categoria_mostrada);
				},
				success: (response) => {
					//this.loadMoreBtn.data('page', nextPage);
					const boton = document.querySelector('#load-more');
					boton.dataset.page = nextPage;
					const datos = JSON.parse(response);
					console.log({ datos });
					//$('#totales').html(datos.uno);
					$('#load-more-content').append(datos.dos); // insert data
					this.totalPagesCount = boton.getAttribute('data-max-pages');

					//$('#load-more-content').append(response);
					this.removeLoadMoreIfOnLastPage(nextPage);
					this.isRequestProcessing = false;
				},
				error: (response) => {
					console.log(response);
					this.isRequestProcessing = false;
				},
			});
		}

		/**
		 * Remove Load more Button If on last page.
		 *
		 * @param {int} nextPage New Page.
		 */
		removeLoadMoreIfOnLastPage(nextPage) {
			if (nextPage + 1 > this.totalPagesCount) {
				this.loadMoreBtn.remove();
			}
		}
	}

	new LoadMore();
})(jQuery);
