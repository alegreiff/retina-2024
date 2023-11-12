<?php

/**
 * Franja principal
 */

function retlat_franja_principal_spslider() {
    $texto = get_field('r2_texto_franja_principal', 'option');
    $categoria = get_field('r2_cat_franja_principal', 'option');
    $numero = get_field('r2_num_films_franja_principal', 'option');
    $copy = get_field('r2_copy_franja_principal', 'option');


?>
    <div class="">
        <h1 class="h2_home"><?php echo $texto; ?> en Retina Latina</h1>
        <!-- <h2 class="h2_home "><?php echo $texto; ?> </h2> -->
        <p class="p_copy"><?php echo $copy; ?></p>
        <section class="splide" id="retinaxios">


            <div class="splide__track">
                <ul class="grid grid-cols-3 splide__list">
                    <?php
                    rl_loop_peliculas_inicio_splide($numero, $categoria);
                    ?>
                </ul>

            </div>

        </section>

    </div>

<?php
}


function rl_loop_peliculas_inicio_splide($numero_de_peliculas, $categoria) {
    global $tiempoTransientesRetina;

    if (false === ($loop = get_transient('rc_peliculas_inicio_retina'))) {
        /*
        Si el transient no existía ejecutamos la query y generamos el transient
        */
        $args = array(
            'posts_per_page' => $numero_de_peliculas,
            'post_type' => 'video',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'videos_categories',
                    'field'    => 'id',
                    //'terms' => array($categoria, 99),
                    'terms' => array($categoria),
                    'operator' => 'IN'
                ),
                array(
                    'taxonomy' => 'videos_categories',
                    'field'    => 'id',
                    'terms' => categoria_archivo(),
                    'operator' => 'NOT IN'
                ),
            ),
            'orderby' => 'date',
        );
        $loop = new WP_Query($args);

        //Guardamos el resultado de la query en un transient válido por 1 hora
        set_transient('rc_peliculas_inicio_retina', $loop, 85000);
    }


    if ($loop->have_posts()) :

        while ($loop->have_posts()) : $loop->the_post();
            global $post;


            $poster = trae_poster(get_field('poster'));
            $pais_pelicula = muestra_codigopais(get_field('country_group'));
            $formato_pelicula = wp_get_post_terms(get_the_ID(), 'videos_format')[0]->name;
            $genero_pelicula = wp_get_post_terms(get_the_ID(), 'videos_genres')[0]->name;
            $duracion = get_field('duration');
            $year = get_field('year');
            $enlace = get_post_permalink();
            $titulo = get_the_title();
            $resumen = traer_logline(get_the_ID());
            //echo "<h2 class='swiper-slide retina_poster'>PELÍCULA</h2>";
            //echo "<li class='splide__slide'>alegreiff</li>";
            rl_muestra_poster_home_splide($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, null, get_the_ID());
        endwhile;
    endif;
    wp_reset_query();
}
