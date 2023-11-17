<?php

use q\eud\core\get;

/**
 * Cargamos las series etiquetadas con HOME
 * 
 * 
 * 
 */

function retlat_franja_series() {

    $texto = get_field('r2_texto_franja_series', 'option');
    $copy = get_field('r2_copy_series', 'option');
    $contenidos = get_field('r2_cat_franja_series', 'option');
?>
    <h2 class="h2_home"><?php echo $texto; ?> </h2>

    <p class="p_copy"><?php echo $copy; ?></p>
    <section class="splide " id="js_retinaseries">

        <div class="splide__track ">
            <ul class="splide__list flex flex-row">
                <?php
                return retlat_series_query($contenidos);
                ?>
            </ul>

        </div>

    </section>
    <?php

    //return retlat_series_query($contenidos);
}


function retlat_series_query($categoria) {
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'series',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'videos_categories',
                'field'    => 'id',
                'terms' => $categoria,
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
    if ($loop->have_posts()) :
        $salida = [];

        while ($loop->have_posts()) : $loop->the_post();
            global $post;

            //$poster = trae_poster_serie(get_field('rl_series_poster'));

            $pais_pelicula = muestra_codigopais(get_field('rl_series_pais'));
            $imagen_serie = get_field('rl_series_imagen');
            $imagen_mostrar = wp_get_attachment_image_src($imagen_serie, 'full');



            $formato_pelicula = 'Serie';
            $genero_pelicula = 'Ficción';
            $duracion = '';
            $year = get_field('rl_series_year');
            $temporadas = get_field('rl_series_temporadas');
            $episodios = 0;
            foreach ($temporadas as $temp) {
                if ($temp['temporada_episodios']) {
                    $episodios = $episodios + count($temp['temporada_episodios']);
                }
            }

            $enlace = get_post_permalink();
            $titulo = get_the_title();
            $resumen = traer_logline(get_the_ID());
            if (!get_the_post_thumbnail()) {
                $imagenPost = '<img class="rounded-xl block mx-auto" src=' . get_stylesheet_directory_uri() . '/assets/images/no-destacada.png" width="400px" height="150px w-full">';
            } else {
                $imagenPost = "<img class='w-full rounded-lg' src='" . $imagen_mostrar[0] . "'>";
            }

    ?>
            <li class=" splide__slide">
                <a href="<?php echo $enlace; ?>" class="">


                    <div class="">



                        <div class="flex flex-col  justify-between">
                            <?php echo $imagenPost; ?>

                            <h3 class="font-bold text-2xl my-4"><?php echo $titulo; ?></h3>
                            <?php
                            if ($episodios) {
                            ?>
                                <h4><?php echo $episodios; ?> episodios</h4>
                            <?php
                            }
                            ?>

                        </div>

                    </div>


                </a>


            </li>
<?php

        endwhile;
    endif;
    wp_reset_query();
}
