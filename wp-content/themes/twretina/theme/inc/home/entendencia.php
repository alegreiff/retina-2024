<?php

/**
 * Código que carga las películas en tendencia
 */

function retlat_franja_entendencia() {
    $texto = get_field('r2_texto_franja_tendencia', 'option');
    $peliculas = get_field('r2_films_tendencia', 'option');
    $copy = get_field('r2_copy_franja_tendencia', 'option');

?>
<div class="">

    <h2 class="h2_home"><?php echo $texto; ?> </h2>
    <p class="p_copy"><?php echo $copy; ?></p>
    <section class="splide" id="js_retinaentendencia">

        <div class="splide__track">
            <ul class="grid grid-cols-3 splide__list">
                <?php
                    r2_muestra_posteresTendencia($peliculas);
                    ?>
            </ul>

        </div>

    </section>

</div><!--  FIN PELÍCULAS QUE SE VAN DE RETINA  -->

<?php
}

function r2_muestra_posteresTendencia($peliculas, $clase = 'nueva') {


    foreach ($peliculas as $film) {
        $ID = $film;
        $poster = trae_poster(get_field('poster', $ID));
        $pais_pelicula = muestra_codigopais(get_field('country_group', $ID));
        $genero_pelicula = wp_get_post_terms($ID, 'videos_genres')[0]->name;
        $duracion = get_field('duration', $ID);
        $year = get_field('year', $ID);
        $enlace = enlace_relativo(get_post_permalink($ID));
        $titulo = get_the_title($ID);
        //echo '<div class="' . $clase . '">';
        $resumen = traer_logline($ID);


        //echo "<li class='splide__slide'>Me voy</li>";
        rl_muestra_poster_home_splide($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, null, get_the_ID(), null);


        /* rl_muestra_poster_home_salidas($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, null, $ID, $film[1]); */
    }
}