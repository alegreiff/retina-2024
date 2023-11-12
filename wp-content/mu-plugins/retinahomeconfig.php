<?php

/**
 * Plugin Name: Retina Latina Funciones auxiliares INICIO
 * Plugin URI: https://wordpress.alegreiff.com
 * Description:  Funciones que complementan las opciones de Retina CONFIG
 * Version: 1.2
 * Creado el 02 de noviembre de 2023
 * @package RetinaLatina24
 */

//DOCUMENTACION
//https://github.com/AdvancedCustomFields/docs/blob/master/filters/acf-fields-relationship-result.md

/**
 * Función que filtra los tráileres en la página de opciones para que solo aparezcan películas ACTIVAS y que tengan su respectivo trailer
 */
function rl_filtro_home_traileres($args, $field, $post_id) {
    $args['post_status'] = 'publish';
    $args['meta_query'] = array(
        array(
            'key' => 'trailer', // name of custom field
            'value' => array(''),
            'compare' => 'NOT IN'
        )
    );
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'videos_categories',

            'terms' => categoria_archivo(),
            'operator' => 'NOT IN'
        )
    );

    return $args;
}
add_filter('acf/fields/relationship/query/name=r2_listatraileres', 'rl_filtro_home_traileres', 10, 3);

/**
 * Función que filtra los tráileres en la página de opciones para que solo aparezcan películas ACTIVAS y que tengan su respectivo trailer
 */
function rl_filtro_home_masvistas($args, $field, $post_id) {
    $args['post_status'] = 'publish';

    $args['tax_query'] = array(
        array(
            'taxonomy' => 'videos_categories',

            'terms' => categoria_archivo(),
            'operator' => 'NOT IN'
        )
    );

    return $args;
}
add_filter('acf/fields/relationship/query/name=r2_films_masvistos', 'rl_filtro_home_masvistas', 10, 3);


//Filtra la lista de películas MUNDO mostrando solo las PUBLICADAS y ACTIVAs
function rl_filtro_home_mundo($args, $field, $post_id) {
    $args['post_status'] = 'publish';

    $args['tax_query'] = array(
        array(
            'taxonomy' => 'videos_categories',

            'terms' => categoria_archivo(),
            'operator' => 'NOT IN'
        ),
        array(
            'taxonomy' => 'videos_categories',

            'terms' => categoria_mundo(),
            'operator' => 'IN'
        )
    );
    return $args;
}
add_filter('acf/fields/relationship/query/name=r2_listamundo', 'rl_filtro_home_mundo', 10, 3);


function rl_filtro_home_director($args, $field, $post_id) {
    $args['post_status'] = 'publish';

    $args['tax_query'] = array(
        array(
            'taxonomy' => 'persons_categories',

            'terms' => rl_cat_persona_director(),
            'operator' => 'IN'
        )
    );

    return $args;
}
add_filter('acf/fields/relationship/query/name=r2_personajes', 'rl_filtro_home_director', 10, 3);


/**
 * Función para traer el título de la películas más reciente que hayamos cargado de un director
 */
function rl_filtro_home_directores_pelicula($title, $post, $field, $post_id) {

    $res = get_field('videos', $post->ID);


    //debugpress_rs($field, true);
    do_action('inspect', ['FILMS', get_the_title($res[0])]);
    return $title . ' / ' . get_the_title(end($res));

    //return $title;
}

add_filter('acf/fields/relationship/result/name=r2_personajes', 'rl_filtro_home_directores_pelicula', 10, 4);

function rl_filtro_home_tendencia($args, $field, $post_id) {
    $args['post_status'] = 'publish';

    $args['tax_query'] = array(
        array(
            'taxonomy' => 'videos_categories',

            'terms' => categoria_archivo(),
            'operator' => 'NOT IN'
        )
    );
    return $args;
}
add_filter('acf/fields/relationship/query/name=r2_films_tendencia', 'rl_filtro_home_tendencia', 10, 3);