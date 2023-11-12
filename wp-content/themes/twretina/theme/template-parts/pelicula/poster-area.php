<?php
$poster = retlat_campo_pelicula('poster');
$salida = retlat_campo_pelicula('rl_fechasalida');
$archivo = $args['archivo'];
$fechasalida = explode('/', $salida);
$formato = retlat_tax_link('videos_format');
$genero = retlat_tax_link('videos_genres');
$edad = retlat_tax('videos_classification');
$es_animacion = get_field('animation');
$es_blancoynegro = get_field('color');
$idioma_pelicula = idiomas_pelicula(wp_get_post_terms(get_the_ID(), 'videos_language'));
$sitioweb = get_field('webpage');
$contacto = get_field('rl_contacto');

echo wp_get_attachment_image($poster, 'poster-mini', false, array(
    'class' => 'rounded-lg mx-auto border-2 border-retina-blanco p-1 lg:-mt-[100px]',
    'alt' => 'Afiche ' . get_the_title()
));
?>
<div class="mx-auto text-center text-red-400 dark: ">
    <?php
    if (!$archivo) {
        echo "Disponible hasta el " . $fechasalida[0] . " de " . retlat_mes($fechasalida[1]) . " de " . $fechasalida[2];
    } else {
        echo "Contenido no disponible";
    }
    ?>

</div>
<div class="p-4 text-md text-green-400 dark: ">
    <?php

    echo muestra_creditos('director');
    echo formato_dato($formato);
    echo formato_dato($genero);
    echo formato_dato($edad);

    echo $idioma_pelicula;
    echo "<div class=''>";
    echo $es_blancoynegro === 'Blanco y Negro' ? 'B/N' : 'Color';
    echo "</div>";
    echo muestra_creditos('cast');
    echo web($sitioweb);
    echo contacto_productora($contacto);
    ?>
</div>