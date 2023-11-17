document.addEventListener('DOMContentLoaded', function () {
	console.log('Va ca bal gan do 5');
	const contenedorMenu = document.querySelector('.pc_menu_header');
	const botonMenu = document.querySelector('.pc_menu_button');
	const pathSVG = document.getElementById('pathid1');

	const menuCerrado =
		'M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z';

	const menuAbierto =
		'M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z';
	console.log({ contenedorMenu, botonMenu });
	botonMenu.addEventListener('click', () => {
		console.log('Las tapas tan en el suelo');
		contenedorMenu.classList.toggle('hidden');
		if (contenedorMenu.classList.contains('hidden')) {
			console.log('OCULTISMO');
			pathSVG.setAttribute('d', menuAbierto);
		} else {
			console.log('EL VOYEUR');
			pathSVG.setAttribute('d', menuCerrado);
		}
	});
});
