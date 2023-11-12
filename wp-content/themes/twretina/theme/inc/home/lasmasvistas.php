<?php

/* Funciones que muestran las más vistas*/

function rl_muestra_las_mas_vistas() {
    $cat_archivo = categoria_archivo();
    $cuantas = get_field('r2_numero_masvistas', 'option');
    $texto = get_field('r2_texto_masvistas', 'option');
    $peliculas = get_field('r2_films_masvistos', 'option');

    if (!isset($cuantas) || !isset($texto) || !isset($peliculas)) {
        return null;
    }
    $films = [];
    foreach ($peliculas as $peli) {
        $existencia = has_term($cat_archivo, 'videos_categories', $peli);
        if (!$existencia) {
            $films[] = $peli;
        }
    }
    $films = array_slice($films, 0, $cuantas);



    return  rl_muestra_las_mas_vistas_html(count($films), array_slice($films, 0, $cuantas), $texto);
}

function rl_muestra_las_mas_vistas_html($numero, $peliculas, $texto) {

?>
    <div class="block md:flex gap-8 items-center ">
        <div class="text-left  w-full md:w-1/3 mb-4 md:mb-0  ">
            <div class="text-3xl"> Las <span class="font-bold"><?php echo $numero; ?></span> más vistas </div>
            <div class="text-xl mt-8"> <?php echo $texto; ?> </div>
        </div>
        <section class="w-2/3 splide mx-auto " id="js_lasmasvistas">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $indice = 1;

                    foreach ($peliculas as $peli) {
                        $poster = trae_poster(get_field('poster', $peli));
                        $pais_pelicula = muestra_codigopais(get_field('country_group', $peli));
                        $formato_pelicula = wp_get_post_terms($peli, 'videos_format', $peli)[0]->name;
                        $genero_pelicula = wp_get_post_terms($peli, 'videos_genres', $peli)[0]->name;
                        $duracion = get_field('duration', $peli);
                        $year = get_field('year',  $peli);
                        $enlace = get_post_permalink($peli);
                        $titulo = get_the_title($peli);
                        $resumen = traer_logline($peli);

                    ?>


                        <?php get_template_part(
                            'template-parts/posteres/poster',
                            'homesplide',
                            array(
                                'pais'      => $pais_pelicula,
                                'titulo'    => $titulo,
                                'duracion'  => $duracion,
                                'genero'    => $genero_pelicula,
                                'poster'    => $poster,
                                'logline'      => $resumen,
                                'enlace'    => $enlace,
                                'year'      => $year,
                                'activa'    => '',
                                'estreno'    => '',
                                'estilo' => 'masvistas',
                                'orden' => $indice
                            )
                        ); ?>

                    <?php
                        $indice++;
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>

<?php

}

/* 

$cat_archivo = categoria_archivo();

    $films = [];
    foreach ($peliculasrelacionadas as $film) {
        $existencia = has_term($cat_archivo, 'videos_categories', $film);
        if (!$existencia) {
            $films[] = $film;
        }
    }
*/