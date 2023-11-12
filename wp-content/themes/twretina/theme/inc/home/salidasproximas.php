<?php

/**
 * Funciones relacionadas con las salidas próximas de Retina Latina
 */

function retlat_franja_salidasproximas() {
    $texto = get_field('r2_texto_franja_salidas', 'option');
    $numero = get_field('r2_num_films_salidas', 'option');
    $copy = get_field('r2_copy_franja_salidas', 'option');


?>
    <div class="">

        <h2 class="h2_home"><?php echo $texto; ?> </h2>
        <p class="p_copy"><?php echo $copy; ?></p>
        <section class="splide" id="js_retinasalidas">

            <div class="splide__track">
                <ul class="grid grid-cols-3 splide__list">
                    <?php
                    r2_muestra_posteresProximasSalidas($peliculas = r2_salidas_proximas($numero));
                    ?>
                </ul>

            </div>

        </section>

    </div><!--  FIN PELÍCULAS QUE SE VAN DE RETINA  -->

<?php
}

/** 
 * FUNCIONES AUXILIARES
 * 
 */
function r2_muestra_posteresProximasSalidas($peliculas, $clase = 'nueva') {
    /* print_r("<pre>");
    print_r($peliculas);
    print_r("</pre>"); */
    foreach ($peliculas as $film) {
        $ID = $film[0];
        $poster = trae_poster(get_field('poster', $ID));
        $pais_pelicula = muestra_codigopais(get_field('country_group', $ID));
        $genero_pelicula = wp_get_post_terms($ID, 'videos_genres')[0]->name;
        $duracion = get_field('duration', $ID);
        $year = get_field('year', $ID);
        $enlace = enlace_relativo(get_post_permalink($ID));
        $titulo = get_the_title($ID);
        //echo '<div class="' . $clase . '">';
        $resumen = traer_logline($ID);
        $fechasalida = $film[1];

        //echo "<li class='splide__slide'>Me voy</li>";
        rl_muestra_poster_home_splide($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, null, get_the_ID(), null, $fechasalida);


        /* rl_muestra_poster_home_salidas($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, null, $ID, $film[1]); */
    }
}


function retlat_proximas_salidas() {
    $texto = get_field('r2_texto_franja_salidas', 'option');
    $cuantas = get_field('r2_num_films_salidas', 'option');

?>
    <div class="z-50 hr-salidas">
        <!--  INICIO PELÍCULAS QUE SE VAN DE RETINA -->
        <h2 class="home_subt"><?php echo $texto; ?> </h2>
        <div class="contieneslider">

            <div class="z-50 swiper hrcarrusel-retinasalidas">
                <div class="z-50 swiper-wrapper">
                    <?php

                    r2_muestra_posteresProximasSalidas($peliculas = r2_salidas_proximas($cuantas));
                    ?>
                </div>
                <div class='swiper-button-prev' id="slider-salidas-prev"></div>
                <div class='swiper-button-next' id="slider-salidas-next"></div>
            </div>

        </div>
    </div><!--  FIN PELÍCULAS QUE SE VAN DE RETINA  -->


<?php


}


function mes_salida_pelicula($mes) {
    if ($mes === '01') return 'enero';
    if ($mes === '02') return 'febrero';
    if ($mes === '03') return 'marzo';
    if ($mes === '04') return 'abril';
    if ($mes === '05') return 'mayo';
    if ($mes === '06') return 'junio';
    if ($mes === '07') return 'julio';
    if ($mes === '08') return 'agosto';
    if ($mes === '09') return 'septiembre';
    if ($mes === '10') return 'octubre';
    if ($mes === '11') return 'noviembre';
    if ($mes === '12') return 'diciembre';
}
