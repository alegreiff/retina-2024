<?php

/** AJAX FILTER Better*/
function rl_catalogo_scripts() {
    if (is_page(array('catalogo')) || is_page_template('page-catalogo.php')) {
        /* print_r("<pre>");
        print_r(admin_url('admin-ajax.php'));
        print_r("</pre>"); */

        wp_enqueue_script('catalogos_script', get_template_directory_uri() . '/js/catalogosretina.min.js', array('jquery'), RL_VERSION, true);
        wp_localize_script('catalogos_script', 'MyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('estocreaunnonce'),
            'imagen' => get_stylesheet_directory_uri() . '/assets/images/diane.gif'
        ));
    }
}
add_action('wp_enqueue_scripts', 'rl_catalogo_scripts');

add_action('wp_ajax_filtro_peliculas_retina', 'filtro_peliculas_retina');
add_action('wp_ajax_nopriv_filtro_peliculas_retina', 'filtro_peliculas_retina');


function filtro_peliculas_retina() {

    $peliculasporpagina = 12;
    //https://rudrastyh.com/wordpress/ajax-post-filters.html
    $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
    $page_no = !empty($_POST['page']) ? filter_var($_POST['page'], FILTER_VALIDATE_INT) + 1 : $page_no;

    $args = array(
        'orderby' => 'date', // we will sort posts by date
        'order'    => 'DESC', // ASC or DESC
        'posts_per_page' => $peliculasporpagina,
        'post_type' => 'video',
        'post_status' => 'publish',
        'paged'          => $page_no,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'rl_esserie',
                'compare' => 'NOT EXISTS', // works!
                'value' => '' // This is ignored, but is necessary...
            ),
            array(
                'key' => 'rl_esserie',
                'value' => '0'
            )
        ),
        'fields'              => 'ids',

    );
    $cat_archivo = categoria_archivo();

    if (isset($_POST['categoria_mostrada']) && $_POST['categoria_mostrada'] > 0) {
        $cat_principal = $_POST['categoria_mostrada'];
    } else {
        $cat_principal = null;
    }

    if (isset($_POST['formato']) && $_POST['formato'] == '') {
        $categorias = $cat_principal;
    } else {
        $categorias = array($cat_principal, $_POST['formato']);
    }
    if ($cat_principal == categoria_archivo()) {
        $args['tax_query'] = array(
            'relation' => 'AND',

            array(
                'taxonomy' => 'videos_categories',
                'field' => 'id',
                'terms' => $categorias
            ),
            array(
                'taxonomy' => 'videos_format',
                'field'    => 'id',
                'terms' => $_POST['formato'],
                'operator' => 'AND'
            ),
            array(
                'taxonomy' => 'videos_genres',
                'field'    => 'id',
                'terms' => $_POST['genero'],
                'operator' => 'AND'
            )
        );
    } else {
        if (!empty($cat_principal)) {

            $args['tax_query'] = array(
                'relation' => 'AND',

                array(
                    'taxonomy' => 'videos_categories',
                    'field' => 'id',
                    'terms' => $categorias
                ),
                array(
                    'taxonomy' => 'videos_format',
                    'field'    => 'id',
                    'terms' => $_POST['formato'],
                    'operator' => 'AND'
                ),
                array(
                    'taxonomy' => 'videos_genres',
                    'field'    => 'id',
                    'terms' => $_POST['genero'],
                    'operator' => 'AND'
                ),
                array(
                    'taxonomy' => 'videos_categories',
                    'field'    => 'id',
                    'terms' => $cat_archivo,
                    'operator' => 'NOT IN'
                ),
            );
        } else {

            $args['tax_query'] = array(
                'relation' => 'AND',

                array(
                    'taxonomy' => 'videos_format',
                    'field'    => 'id',
                    'terms' => $_POST['formato'],
                    'operator' => 'AND'
                ),
                array(
                    'taxonomy' => 'videos_genres',
                    'field'    => 'id',
                    'terms' => $_POST['genero'],
                    'operator' => 'AND'
                ),
                array(
                    'taxonomy' => 'videos_categories',
                    'field'    => 'id',
                    'terms' => $cat_archivo,
                    'operator' => 'NOT IN'
                ),

            );
        }
    }
    $query = new WP_Query($args);
    $total = $query->found_posts;

    if ($query->have_posts()) :

        $uno = $total;

        //echo '<div class="peliculas grid grid-cols-6">';
        $salida = '';
        while ($query->have_posts()) : $query->the_post();
            //echo "<div>" . get_the_title() . " </div>";

            $esPartedeSerie = retlat_pertenece_serie();
            $esPartedeSerie = [];





            if (count($esPartedeSerie) === 0) {
                $poster = trae_poster(get_field('poster'));
                $pais = muestra_codigopais(get_field('country_group'));
                $formato = wp_get_post_terms(get_the_ID(), 'videos_format')[0]->name;
                $genero = wp_get_post_terms(get_the_ID(), 'videos_genres')[0]->name;
                $duracion = get_field('duration');
                $year = get_field('year');
                $enlace = enlace_relativo(get_post_permalink());
                $titulo = get_the_title();
                $logline = traer_logline(get_the_ID());
                $activa = '';
                $estreno = '';

                $salida .= '
                <div class="    dark:  group relative retina_poster ' . $activa . ' ' . $estreno . '">
                <div class="pt-2 pr-2">
            
                    <img class=" w-full object-cover group-hover:blur-[3px] group-hover:grayscale rounded-2xl" loading="lazy" src="' . $poster . '" alt="Afiche ' . $titulo . '" title="' . $titulo . '">
            
                </div>
                <a href="' . $enlace . '" class="absolute top-0 left-0 z-10 flex flex-col items-center justify-start w-full h-0 duration-500 opacity-0 rounded-2xl bg-slate-900 group-hover:h-full group-hover:opacity-70 group-hover:rounded-2xl ">
            
                    <div class="static p-1 ">
            
                        <h3>' . $titulo . '</h3>
                        <p class="pt-4 text-sm leading-4  ">' . $logline . '</p>
            
            
                        <div class="absolute left-0 w-full p-1 bottom-8">
                            <img src="' . get_stylesheet_directory_uri() . '/assets/images/play24.svg" alt="" class="w-8 h-8 mx-auto">
            
            
                        </div>
                        <span class="rl_year">' . $year . '</span>
                    </div>
                </a>
                <span class="absolute top-0 right-0 z-20 rl_pais ">
                ' . $pais . ' </span>
            
            
            
            </div>                
                ';
            }


        endwhile;
        //echo '</div>';
        wp_reset_postdata();

        $todos = [
            'registros' => $uno, //TOTAL REGISTROS
            'datos' => $salida, // PELICULAS
            'paginasresultado' => $query->max_num_pages, //NUM PÁGINAS
            'peliculasporconsulta' => $peliculasporpagina,
            'categoriaprincipal' => rl_mensajes_catalogo($cat_principal), //CONSTANTE LOCAL PELICULAS POR PÁGINA
        ];


        echo json_encode($todos);


    else :
        $todos = [
            'registros' => 0,
            'datos' => 'No hay resultados para esta consulta',
            'paginasresultado' => $query->max_num_pages,
            'peliculasporconsulta' => $peliculasporpagina,
            'categoriaprincipal' => rl_mensajes_catalogo($cat_principal),
        ];
        echo json_encode($todos);
    endif;

    wp_die();
}
