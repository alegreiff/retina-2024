<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package twretina
 */

?>

<footer id="colophon">

    <?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside role="complementary" aria-label="<?php esc_attr_e('Footer', 'twretina'); ?>">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
    <?php endif; ?>

    <?php if (has_nav_menu('menu-2')) : ?>
    <nav aria-label="<?php esc_attr_e('Footer Menu', 'twretina'); ?>">
        <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_class'     => 'footer-menu',
					'depth'          => 1,
				)
			);
			?>
    </nav>
    <?php endif; ?>

    <div>
        <?php
		$rl_blog_info = get_bloginfo('name');
		if (!empty($rl_blog_info)) :
		?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
        <?php
		endif;

		/* translators: 1: WordPress link, 2: WordPress. */
		printf(
			'<a href="%1$s">proudly powered by %2$s</a>.',
			esc_url(__('https://wordpress.org/', 'twretina')),
			'WordPress'
		);
		?>
    </div>
    <?php

	

	$wp_roles = new WP_Roles();
	$names = $wp_roles->get_names();
	print_r($names);
	?>

</footer><!-- #colophon -->