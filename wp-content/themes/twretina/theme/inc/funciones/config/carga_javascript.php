<?php

function rl_carga_swiper() {
    if (is_front_page()) {


        wp_register_style('swippercss', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
        wp_enqueue_style('swippercss');

        wp_register_script("swipperjs", 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '15.4', true);

        wp_enqueue_script(
            'pcswipperhome',
            get_template_directory_uri() . '/js/home-carousel.min.js',
            array('swipperjs'),
            RL_VERSION,
            true
        );
        wp_enqueue_script('youtube-light', get_template_directory_uri() . '/js/light-youtube-embedd.min.js', array(), RL_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'rl_carga_swiper');



function rl_carga_splide() {
    if (is_front_page()) {


        wp_register_style('spslidecss', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
        wp_enqueue_style('spslidecss');

        wp_register_script("spslidejs", 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true);

        wp_enqueue_script(
            'pcsplidehome',
            get_template_directory_uri() . '/js/home-carousel.splide.min.js',
            array('spslidejs'),
            RL_VERSION,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'rl_carga_splide');



function retlat_single_video_js() {
    if (is_singular('video')) {
        wp_enqueue_script('singlevideotabs', get_template_directory_uri() . '/js/single-video-tabs.min.js', array(), RL_VERSION, true);
        wp_enqueue_script('youtube-light', get_template_directory_uri() . '/js/light-youtube-embedd.min.js', array(), RL_VERSION, true);
    }
}

add_action('wp_enqueue_scripts', 'retlat_single_video_js');


function rl_buscador_peliculas() {
    if (is_page(array('buscador-peliculas'))) {
        wp_enqueue_script('buscador_pelis_script', get_template_directory_uri() . '/js/buscadorpelis.min.js', array('jquery'), RL_VERSION, true);
        /* wp_localize_script('buscador_pelis_script', 'MyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('estocreaunnonce'),
        'imagen' => get_stylesheet_directory_uri() . '/assets/images/diane.gif'
    )); */
    }
}
add_action('wp_enqueue_scripts', 'rl_buscador_peliculas');


function temporal_js() {

    wp_register_style('temposwippercss', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_style('temposwippercss');

    wp_register_script("temposwipperjs", 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '15.4', true);

    wp_enqueue_script(
        'temporalswipper',
        get_template_directory_uri() . '/js/temporal.min.js',
        array('temposwipperjs'),
        RL_VERSION,
        true
    );
    /* wp_enqueue_script('temporal', get_template_directory_uri() . '/js/temporal.min.js', array(), RL_VERSION, true); */
}

add_action('wp_enqueue_scripts', 'temporal_js');
