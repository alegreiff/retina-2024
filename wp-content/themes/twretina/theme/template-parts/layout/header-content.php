<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package twretina
 */

?>

<header id="masthead" class=" bg-pink-500">
	<?php
	if (has_custom_logo()) {
		$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
		$logo_imagen_src = $image[0];
		$imagen_alt = get_bloginfo();
	} else {
		echo "imagine all";
	}
	?>
	<header class="container mx-auto md:flex md:justify-between md:items-center md:px-4 md:py-3">
		<div class="flex items-start justify-between px-4 py-3 md:p-0">
			<div class="shrink-0">
				<a href="/">
					<img class="" src="<?php echo $logo_imagen_src ?>" alt="<?php echo $imagen_alt; ?>">
				</a>
			</div>

			<div class="md:hidden">
				<button type="button block" class="pc_menu_button text-fugamora-dark focus:text-fugamora-dark focus:outline-none hover:text-fugaazul ">
					<svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">

						<path id="pathid1" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />


					</svg>
				</button>
			</div>
		</div>
		<div class="hidden md:block pc_menu_header">
			<?php
			//echo creaMenuUsuariosRetina();
			wp_nav_menu(array(
				'theme_location' => 'Primary Retina 2025',
				/* 'menu_class'      => 'footer-top',
				'add_a_class'     => 'nav-link bg-lime-500' */
				'container'       => FALSE,
				'container_id'    => FALSE,
				'menu_class'      => 'px-2 py-3  md:flex sm:p-0',
				'menu_id'         => FALSE,
				'depth'           => 2,
				'walker'          => new Description_Walker
			));
			?>
			<!-- <div class="inline-flex site-header__util">
            <a href="#" title="BuxKame" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div> -->
		</div>

	</header>
</header><!-- #masthead -->