<?php

/* ACF OPTIONS PAGE*/
function register_acf_options_pages() {

    // Check function exists.
    if (!function_exists('acf_add_options_page'))
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Opciones globales de Retina Latina'),
        'menu_title'    => __('Retina CONFIG'),
        'menu_slug'     => 'retina-latina-conf',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position' => 2,
        'icon_url' => plugins_url('images/', __FILE__) . 'custom.retina.png',



    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Retina - FOOTER',
        'menu_title'    => 'Retina Footer',
        'parent_slug'    => 'retina-latina-conf',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Retina - películas LIBRES',
        'menu_title'    => 'Libres de registro',
        'parent_slug'    => 'retina-latina-conf',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'RetinAPP - Configuración HOME',
        'menu_title'    => 'RetinAPP Home',
        'parent_slug'    => 'retina-latina-conf',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'RetinAPP - Configuración MENÚ',
        'menu_title'    => 'RetinAPP Menú',
        'parent_slug'    => 'retina-latina-conf',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'RetinAPP - Configuración COLECCIONES',
        'menu_title'    => 'RetinAPP Colecciones',
        'parent_slug'    => 'retina-latina-conf',
    ));
    //2022 INICIO
    acf_add_options_sub_page(array(
        'page_title'     => 'Retina - Opciones formulario de contacto',
        'menu_title'    => 'Retina CONTACTO',
        'parent_slug'    => 'retina-latina-conf',
    ));
    //2022 FIN
}
add_action('acf/init', 'register_acf_options_pages');


function jdg_archivos() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'jdg_archivos');

add_image_size('poster-mini', 230, 325, true);
add_image_size('persona-mini', 160, 240, true);
add_image_size('serie-main', 1200, 450, true);
add_image_size('destacada-mini', 300, 215, true);
add_image_size('galerias', 300, 300, true);
