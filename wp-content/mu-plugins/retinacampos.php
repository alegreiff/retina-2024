<?php

/**
 * Plugin Name: customretina2021
 * Plugin URI: http://touchsize.com/
 * Description: This plugin adds custom posts types.
 * Version: 1.0.1.
 * Author: Touchsize
 * Author URI: http://touchsize.com/
 * Text Domain:
 * Domain Path:
 * License: GPL2
 */

$theme = wp_get_theme();
define('THEMENAME', strtolower($theme->Name));

define('IMAGES_CAMPOS', plugins_url('retinacampos/images/', __FILE__));
function jaja() {
    return plugins_url('retinacampos/images/', __FILE__);
}

/*
add_action( 'init', 'ts_'. $custom_post );
add_action( 'init', 'ts_taxonomy_'. $custom_post, 0 );

add_action( 'init', 'ts_'. 'video' );
add_action( 'init', 'ts_taxonomy_'. 'video', 0 );

 */


function ts_custom_posts_active() {
    add_action('init', 'ts_' . 'video');
    add_action('init', 'ts_taxonomy_' . 'video', 0);
    add_action('init', 'ts_' . 'person');
    add_action('init', 'ts_taxonomy_' . 'person', 0);
}
register_activation_hook(__FILE__, 'ts_custom_posts_active');


//$custom_posts = get_option('theme-custom-posts');

add_action('init', 'ts_' . 'video');
add_action('init', 'ts_taxonomy_' . 'video', 0);
add_action('init', 'ts_' . 'person');
add_action('init', 'ts_taxonomy_' . 'person', 0);


/**
 * Video
 */
function ts_taxonomy_video() {
    $slug = get_option(THEMENAME . '_general');
    $slug = (isset($slug['slug_video_taxonomy'])) ? $slug['slug_video_taxonomy'] : 'videos_categories';

    $labels = array(
        'name' => __('Category', 'ts-custom-posts'),
        'singular_name' => __('Video', 'ts-custom-posts'),
        'search_items' => __('Search Videos', 'ts-custom-posts'),
        'popular_items' => __('Popular Videos', 'ts-custom-posts'),
        'all_items' => __('All Videos', 'ts-custom-posts'),
        'parent_item' => __('Parent Videos', 'ts-custom-posts'),
        'parent_item_colon' => __('Parent Videos:', 'ts-custom-posts'),
        'edit_item' => __('Edit Videos', 'ts-custom-posts'),
        'update_item' => __('Update Videos', 'ts-custom-posts'),
        'add_new_item' => __('Add New Videos', 'ts-custom-posts'),
        'new_item_name' => __('New Videos Name', 'ts-custom-posts'),
    );
    register_taxonomy('videos_categories', array('videos_categories'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    ));

    $slug = 'genero';

    $labels = array(
        'name' => __('Genre', 'ts-custom-posts'),
        'singular_name' => __('Genre', 'ts-custom-posts'),
        'search_items' => __('Search Genres', 'ts-custom-posts'),
        'popular_items' => __('Popular Genres', 'ts-custom-posts'),
        'all_items' => __('All Genres', 'ts-custom-posts'),
        'parent_item' => __('Parent Genres', 'ts-custom-posts'),
        'parent_item_colon' => __('Parent Genres:', 'ts-custom-posts'),
        'edit_item' => __('Edit Genres', 'ts-custom-posts'),
        'update_item' => __('Update Genres', 'ts-custom-posts'),
        'add_new_item' => __('Add New Genres', 'ts-custom-posts'),
        'new_item_name' => __('New Genres Name', 'ts-custom-posts'),
    );
    register_taxonomy('videos_genres', array('videos_genres'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_in_rest' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    ));

    $slug = 'videos_classification';
    $labels = array(
        'name' => __('Public Classification', 'ts-custom-posts'),
        'singular_name' => __('Public Classification', 'ts-custom-posts'),
        'search_items' => __('Search Public Classification', 'ts-custom-posts'),
        'popular_items' => __('Popular Public Classification', 'ts-custom-posts'),
        'all_items' => __('All Public Classification', 'ts-custom-posts'),
        'parent_item' => __('Parent Public Classification', 'ts-custom-posts'),
        'parent_item_colon' => __('Parent Public Classification:', 'ts-custom-posts'),
        'edit_item' => __('Edit Public Classification', 'ts-custom-posts'),
        'update_item' => __('Update Public Classification', 'ts-custom-posts'),
        'add_new_item' => __('Add New Public Classification', 'ts-custom-posts'),
        'new_item_name' => __('New Public Classification Name', 'ts-custom-posts'),
    );
    register_taxonomy('videos_classification', array('videos_classification'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    ));

    $slug = 'idioma';
    $labels = array(
        'name' => __('Language', 'ts-custom-posts'),
        'singular_name' => __('Language', 'ts-custom-posts'),
        'search_items' => __('Search Language', 'ts-custom-posts'),
        'popular_items' => __('Popular Language', 'ts-custom-posts'),
        'all_items' => __('All Language', 'ts-custom-posts'),
        'parent_item' => __('Parent Language', 'ts-custom-posts'),
        'parent_item_colon' => __('Parent Language:', 'ts-custom-posts'),
        'edit_item' => __('Edit Language', 'ts-custom-posts'),
        'update_item' => __('Update Language', 'ts-custom-posts'),
        'add_new_item' => __('Add New Language', 'ts-custom-posts'),
        'new_item_name' => __('New Public Language', 'ts-custom-posts'),
    );
    register_taxonomy('videos_language', array('videos_language'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    ));

    $slug = 'duracion';
    $labels = array(
        'name' => __('Formato', 'ts-custom-posts'),
        'singular_name' => __('Formato', 'ts-custom-posts'),
        'search_items' => __('Busqueda de Formato', 'ts-custom-posts'),
        'popular_items' => __('Formato Popular', 'ts-custom-posts'),
        'all_items' => __('Todos los formatos', 'ts-custom-posts'),
        'parent_item' => __('Formato Padre', 'ts-custom-posts'),
        'parent_item_colon' => __('Formato Padre:', 'ts-custom-posts'),
        'edit_item' => __('Editar Formato', 'ts-custom-posts'),
        'update_item' => __('Actualizar Formato', 'ts-custom-posts'),
        'add_new_item' => __('Agregar Nuevo Formato', 'ts-custom-posts'),
        'new_item_name' => __('Nuevo Formato', 'ts-custom-posts'),
    );
    register_taxonomy('videos_format', array('videos_format'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_in_rest' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    ));
}

function ts_video() {
    $slug = get_option(THEMENAME . '_general');
    $slug = (isset($slug['slug_video'])) ? $slug['slug_video'] : 'video';

    $labels = array(
        'name' => __('Películas de Retina Latina', 'ts-custom-posts'),
        'singular_name' => __('Película', 'ts-custom-posts'),
        'add_new' => __('Nueva película', 'ts-custom-posts'),
        'add_new_item' => __('Agregar nueva película', 'ts-custom-posts'),
        'edit_item' => __('Editar película', 'ts-custom-posts'),
        'new_item' => __('Nueva película', 'ts-custom-posts'),
        'all_items' => __('Todas las películas', 'ts-custom-posts'),
        'view_item' => __('Ver película', 'ts-custom-posts'),
        'search_items' => __('Buscar película', 'ts-custom-posts'),
        'not_found' => __('Película no encontrada', 'ts-custom-posts'),
        'not_found_in_trash' => __('Película no encontrada en la papelera', 'ts-custom-posts'),
        'parent_item_colon' => '',
        'menu_name' => __('Películas', 'ts-custom-posts')
    );

    $args = array(
        'labels' => $labels,
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt',
            'comments'
        ),
        //'menu_icon' => plugins_url('retinacampos/images/custom.video.png'),
        'menu_icon' => IMAGES_CAMPOS . 'peliculas.svg',
        'menu_position'         => 4,
        'taxonomies' => array(
            'videos_categories',
            'post_tag',
            'videos_genres',
            'videos_classification',
            'videos_language',
            'videos_format'
        ),
        'has_archive'           => true,
        'rewrite' => array('slug' => $slug),
    );

    register_post_type('video', $args);
}

function ts_video_messages($messages) {
    global $post, $post_ID;

    $messages['video'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('Information about video updated. <a href="%s">View video</a>', 'ts-custom-posts'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'ts-custom-posts'),
        3 => __('Custom field deleted.', 'ts-custom-posts'),
        4 => __('Video updated.', 'ts-custom-posts'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Videos restored to revision from %s', 'ts-custom-posts'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6 => sprintf(__('Video published. <a href="%s">View video</a>', 'ts-custom-posts'), esc_url(get_permalink($post_ID))),
        7 => __('Video saved.', 'ts-custom-posts'),
        8 => sprintf(__('Video submitted. <a target="_blank" href="%s">Preview Video</a>', 'ts-custom-posts'), esc_url(add_query_arg('preview', 'true', esc_url(get_permalink($post_ID))))),
        9 => sprintf(
            __('Video scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview video</a>', 'ts-custom-posts'),
            // translators: Publish box date format, see http://php.net/date
            date_i18n(__('M j, Y @ G:i', 'ts-custom-posts'), strtotime($post->post_date)),
            esc_url(get_permalink($post_ID))
        ),
        10 => sprintf(__('Video draft updated. <a target="_blank" href="%s">Preview video</a>', 'ts-custom-posts'), esc_url(add_query_arg('preview', 'true', esc_url(get_permalink($post_ID))))),
    );

    return $messages;
}

/**
 * Persons
 */

function ts_taxonomy_person() {
    $slug = get_option(THEMENAME . '_general');
    $slug = (isset($slug['slug_person_taxonomy'])) ? $slug['slug_person_taxonomy'] : 'persons_category';

    $labels = array(
        'name' => __('Category', 'ts-custom-posts'),
        'singular_name' => __('Category', 'ts-custom-posts'),
        'search_items' => __('Search Categories', 'ts-custom-posts'),
        'popular_items' => __('Popular Categories', 'ts-custom-posts'),
        'all_items' => __('All Categories', 'ts-custom-posts'),
        'parent_item' => __('Parent Categories', 'ts-custom-posts'),
        'parent_item_colon' => __('Parent Categories:', 'ts-custom-posts'),
        'edit_item' => __('Edit Category', 'ts-custom-posts'),
        'update_item' => __('Update Category', 'ts-custom-posts'),
        'add_new_item' => __('Add New Category', 'ts-custom-posts'),
        'new_item_name' => __('New Category Name', 'ts-custom-posts'),
    );
    register_taxonomy('persons_categories', array('persons_categories'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
        'show_in_rest' => true,
    ));
}

function ts_person() {
    $slug = get_option(THEMENAME . '_general');
    $slug = (isset($slug['slug_person'])) ? $slug['slug_person'] : 'person';

    $labels = array(
        'name' => __('Person', 'ts-custom-posts'),
        'singular_name' => __('Person', 'ts-custom-posts'),
        'add_new' => __('New Person', 'ts-custom-posts'),
        'add_new_item' => __('Add New Person', 'ts-custom-posts'),
        'edit_item' => __('Edit Person', 'ts-custom-posts'),
        'new_item' => __('New Person', 'ts-custom-posts'),
        'all_items' => __('All Persons', 'ts-custom-posts'),
        'view_item' => __('View Person', 'ts-custom-posts'),
        'search_items' => __('Search Persons', 'ts-custom-posts'),
        'not_found' => __('No Person found', 'ts-custom-posts'),
        'not_found_in_trash' => __('No Person found in Trash', 'ts-custom-posts'),
        'parent_item_colon' => '',
        'menu_name' => __('Personajes CINE', 'ts-custom-posts')
    );

    $args = array(
        'labels' => $labels,
        'show_in_rest' => true,
        'map_meta_cap' => true,
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
        'menu_icon' => IMAGES_CAMPOS . 'personas.svg',
        'menu_position'         => 6,
        'taxonomies' => array(
            'persons_categories',
            'post_tag'
        ),
        'rewrite' => array('slug' => $slug),
    );

    register_post_type('person', $args);
}

function ts_person_messages($messages) {
    global $post, $post_ID;

    $messages['person'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('Information about person updated. <a href="%s">View person</a>', 'ts-custom-posts'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'ts-custom-posts'),
        3 => __('Custom field deleted.', 'ts-custom-posts'),
        4 => __('Person updated.', 'ts-custom-posts'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Persons restored to revision from %s', 'ts-custom-posts'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6 => sprintf(__('Person published. <a href="%s">View person</a>', 'ts-custom-posts'), esc_url(get_permalink($post_ID))),
        7 => __('Person saved.', 'ts-custom-posts'),
        8 => sprintf(__('Person submitted. <a target="_blank" href="%s">Preview Person</a>', 'ts-custom-posts'), esc_url(add_query_arg('preview', 'true', esc_url(get_permalink($post_ID))))),
        9 => sprintf(
            __('Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview person</a>', 'ts-custom-posts'),
            // translators: Publish box date format, see http://php.net/date
            date_i18n(__('M j, Y @ G:i', 'ts-custom-posts'), strtotime($post->post_date)),
            esc_url(get_permalink($post_ID))
        ),
        10 => sprintf(__('Person draft updated. <a target="_blank" href="%s">Preview person</a>', 'ts-custom-posts'), esc_url(add_query_arg('preview', 'true', esc_url(get_permalink($post_ID))))),
    );

    return $messages;
}

if (!function_exists('add_seriesretina')) {

    // Register Custom Post Type
    function add_seriesretina() {

        $labels = array(
            'name'                  => 'Series',
            'singular_name'         => 'Serie',
            'menu_name'             => 'Series',
            'name_admin_bar'        => 'Series',
            'archives'              => 'Archivo de series',
            'attributes'            => 'Atributos de serie',
            'all_items'             => 'Todas las series',
            'add_new_item'          => 'Add New Item',
            'add_new'               => 'Añadir nueva serie',
            'new_item'              => 'Nueva serie',
            'edit_item'             => 'Editar serie',
            'update_item'           => 'Actualizar serie',
            'view_item'             => 'Ver serie',
            'view_items'            => 'Ver series',
            'search_items'          => 'Buscar series',
            'not_found'             => 'Not found',
            'not_found_in_trash'    => 'Not found in Trash',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into item',
            'uploaded_to_this_item' => 'Uploaded to this item',
            'items_list'            => 'Items list',
            'items_list_navigation' => 'Items list navigation',
            'filter_items_list'     => 'Filter items list',
        );
        $args = array(
            //'menu_icon'             => 'dashicons-table-col-after',
            'menu_icon' => IMAGES_CAMPOS . 'series.svg',
            'label'                 => 'Serie',
            'description'           => 'Series Retina Latina',
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
            //'taxonomies'            => array('category', ' post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'series',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'query_var'             => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type('series', $args);
    }
    add_action('init', 'add_seriesretina', 0);
}

function namespace_share_category_with_pages() {
    register_taxonomy_for_object_type('videos_categories', 'series');
}

add_action('init', 'namespace_share_category_with_pages');
