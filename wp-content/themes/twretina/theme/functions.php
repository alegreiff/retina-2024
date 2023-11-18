<?php

/**
 * twretina functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twretina
 */

if (!defined('RL_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('RL_VERSION', '0.1.0');
}

if (!defined('RL_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `rl_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'RL_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('rl_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on twretina, use a find and replace
		 * to change 'twretina' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('twretina', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		/* register_nav_menus(
			array(
				'menu-1' => __('Primary Retina', 'twretina'),
				'menu-2' => __('Footer Menu', 'twretina'),
			)
		); */
		register_nav_menu('Primary Retina 2025', 'Menú principal en el Header');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		//add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'rl_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rl_widgets_init() {
	register_sidebar(
		array(
			'name'          => __('Footer', 'twretina'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'twretina'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'rl_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function rl_scripts() {
	wp_enqueue_style('twretina-style', get_stylesheet_uri(), array(), RL_VERSION);
	wp_enqueue_script('twretina-script', get_template_directory_uri() . '/js/script.min.js', array(), RL_VERSION, true);
	wp_enqueue_script('twreinta-menu', get_template_directory_uri() . '/js/menuretina.min.js', array(), RL_VERSION, false);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'rl_scripts');

/**
 * Enqueue the block editor script.
 */
function rl_enqueue_block_editor_script() {
	wp_enqueue_script(
		'twretina-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		RL_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'rl_enqueue_block_editor_script');

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from RL_TYPOGRAPHY_CLASSES.
 */
function rl_enqueue_typography_script() {
	if (is_admin()) {
		wp_enqueue_script(
			'twretina-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			RL_VERSION,
			true
		);
		wp_add_inline_script('twretina-typography', "tailwindTypographyClasses = '" . esc_attr(RL_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'rl_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function rl_tinymce_add_class($settings) {
	$settings['body_class'] = RL_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'rl_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


//FUNCIONES ADICIONALES RETINA LATINA

//OPCIONES DE CONFIGURACIÓN DE RETINA LATINA

require get_template_directory() . '/inc/funciones/config/carga_javascript.php';
//require get_template_directory() . '/inc/funciones/config/retina.php';

//FUNCIONES AUXILIARES DEL HOME
require get_template_directory() . '/inc/home.php';

//FUNCIONES AUXILIARES  CATÁLOGOS RETINA LATINA
require get_template_directory() . '/inc/catalogos/catalogosretina.php';
require get_template_directory() . '/inc/catalogos/catalogo-conf.php';


//FUNCIONES AUXILIARES BUSCADOR DINÁMICO EN RETINA LATINA
require get_template_directory() . '/inc/buscador/buscador-live.php';


//FUNCIONES UTILITARIAS
//require get_template_directory() . '/inc/funciones/utils/salidas_proximas.php';

//require get_template_directory() . '/inc/funciones/utils/retina_utils.php';

//FUNCIONES RELACIONADAS CON LA VITA DE PELÍCULAS DETALLE Y SERIES
//ESTAS FUNCIONES PASARON AL PLUGIN retinabasics
//require get_template_directory() . '/inc/funciones/peliculas/main.php';

/* add_action('enqueue_block_editor_assets', 'block_editor_enqueue_scripts', 9999);

function block_editor_enqueue_scripts() {
	wp_deregister_style('wp-reset-editor-styles');
	wp_register_style('wp-reset-editor-styles', get_template_directory_uri() . '/style-editor.css');
}
 */

function themename_custom_logo_setup() {
	$defaults = array(
		'height'      => 34,
		'width'       => 180,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array('site-title', 'site-description'),
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

//FUNCIONES AUXILIARES BUSCADOR DINÁMICO EN RETINA LATINA
require get_template_directory() . '/inc/funciones/menu/menu-personalizado.php';







add_filter('wp_nav_menu_items', 'add_search_to_nav', 10, 2);

function add_search_to_nav($items, $args) {
	$buscaUrl = esc_url(site_url('/busca'));
	$items .= '<div class="inline-flex site-header__util">
	<a href="' . $buscaUrl . '" title="Buscador" class="search-trigger js-search-trigger"><i class="fa fa-search pc_busca" aria-hidden="true"></i></a>
  </div>';
	return $items;
}


/* 
AYUDA

¿Cómo hago para que wordpress internamente redirija
/catalogo/peru
a la página page-catalogo.php

*/