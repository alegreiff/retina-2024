<?php
/* 
Códugo común de algunos elementos del home y carga de las diferentes secciones / funcionalidades del home
*/

function rl_muestra_poster_home_splide($poster, $pais_pelicula, $duracion, $year, $genero_pelicula, $enlace, $titulo, $resumen, $roles = null, $id = null, $estreno = null, $fechasalida = null) {
    $activa = 'activa';
    $estreno = '';
    if ($id) {
        $activa = (has_term('archivo', 'videos_categories', $id));
        $estreno = (has_term('estreno', 'videos_categories', $id));
        if ($activa) {
            $activa = 'inactiva';
        }
        if ($estreno) {
            $estreno = 'estrenorl';
        }
    }
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
            'activa'    => $activa,
            'estreno'    => $estreno,
            'fechasalida' => $fechasalida,
            'estilo' => ''
        )
    ); ?>


<?php
}



require get_template_directory() . '/inc/home/carrusel.php';
require get_template_directory() . '/inc/home/franjaprincipal.php';
require get_template_directory() . '/inc/home/lasmasvistas.php';
require get_template_directory() . '/inc/home/series.php';
require get_template_directory() . '/inc/home/salidasproximas.php';
require get_template_directory() . '/inc/home/entendencia.php';
require get_template_directory() . '/inc/home/personajes.php';
require get_template_directory() . '/inc/home/seleccionados.php';
require get_template_directory() . '/inc/home/blogentradas.php';
require get_template_directory() . '/inc/home/trailer.php';
