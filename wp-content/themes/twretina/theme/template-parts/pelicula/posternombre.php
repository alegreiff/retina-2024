<?php
$poster = retlat_campo_pelicula('poster');
$salida = retlat_campo_pelicula('rl_fechasalida');
$inactiva = $args['inactiva'];
$fechasalida = explode('/', $salida);
$formato = retlat_tax_simple('videos_format');
$genero = retlat_tax_simple('videos_genres');
$otronombre = get_field('rl_otrosnombres');
$serie = $args['serie'];
$contenido = get_the_content();
$claseserie = $serie ? 'rl_serie' : 'rl_serie2';
$pais = retlat_campo_pelicula('country_group');
$year = retlat_campo_pelicula('year');
$duracion = retlat_campo_pelicula('duration');
$geo = $args['geo'];
$edad = retlat_tax('videos_classification');
$es_animacion = get_field('animation');
$es_blancoynegro = get_field('color');
$idioma_pelicula = idiomas_pelicula(wp_get_post_terms(get_the_ID(), 'videos_language'));
$sitioweb = get_field('webpage');
$contacto = get_field('rl_contacto');
$galeria = get_field('gallery', null, false);

$duracion = '<svg class="inline" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" fill="#f8f8f8" viewBox="0 0 64 64">
<path d="M 32 6.8007812 C 18.1 6.8007812 6.8007813 18.1 6.8007812 32 C 6.8007812 45.9 18.1 57.300781 32 57.300781 C 45.9 57.300781 57.300781 45.9 57.300781 32 C 57.300781 18.1 45.9 6.8007813 32 6.8007812 z M 32 9.8007812 C 44.2 9.8007812 54.300781 19.799609 54.300781 32.099609 C 54.300781 44.399609 44.3 54.300781 32 54.300781 C 19.7 54.300781 9.6992188 44.3 9.6992188 32 C 9.6992188 19.7 19.8 9.8007812 32 9.8007812 z M 31.976562 15.478516 A 1.50015 1.50015 0 0 0 30.5 17 L 30.5 29.40625 A 3 3 0 0 0 32 35 A 3 3 0 0 0 34.59375 33.5 L 42 33.5 A 1.50015 1.50015 0 1 0 42 30.5 L 34.597656 30.5 A 3 3 0 0 0 33.5 29.404297 L 33.5 17 A 1.50015 1.50015 0 0 0 31.976562 15.478516 z">
</path>
</svg> ' . $duracion . ' min.';
$microdatos = array($pais, $year, $duracion, $genero);


$muestraposter = wp_get_attachment_image($poster, 'poster-mini', false, array(
    'class' => 'rounded-lg',
    'alt' => 'Afiche ' . get_the_title()
));
?>

<div class=" md:flex">
    <div class="hidden md:block md:w-[250px] md:shrink-0 ">
        <?php echo $muestraposter; ?>
    </div>

    <?php
    if ($inactiva) {
    ?>
        <div class="">PELICULA INACTIVÉ
        </div>
    <?php
    }
    ?>
    <div class="<?php echo $claseserie; ?> mx-auto max-w-[800px] px-1 md:px-12">
        <h1 class="font-bold text-4xl"> <?php the_title(); ?> </h1>
        <?php
        if ($otronombre) {
        ?>
            <h3 class="rl_otronombre"><?php echo $otronombre; ?></h3>
        <?php
        }
        ?>
        <?php
        if ($serie) {
            echo $serie;
        }
        ?>
        <div class=" mt-6 text-rl-blanco prose lg:prose-xl  ">
            <?php echo $contenido; ?>
        </div>

        <div class="pt-8 flex flex-wrap justify-around font-medium text-xl">


            <?php
            foreach ($microdatos as $dato) {
                echo "<div class=''>";
                echo $dato;

                echo "</div>";
                if (next($microdatos)) {
                    echo "|";
                }
            }
            ?>

        </div>

    </div>
</div>
<div class="container mx-auto">
    <div class="p-4 text-md rl_single_video_personajes">
        <?php

        echo muestra_creditos('director');
        echo formato_dato($formato);
        echo formato_dato($genero);
        echo "<span>Público: </span>" . formato_dato($edad);
        echo $idioma_pelicula;

        echo $es_blancoynegro === 'Blanco y Negro' ? '<span class="font-bold"> B/N </span>' : '<span class="font-bold"> Color </span>';

        echo "<div class=''>";
        echo muestra_creditos('cast');
        echo "</div>";
        echo web($sitioweb);
        echo contacto_productora($contacto);
        ?>
    </div>
</div>
<div class="container mx-auto">
    <span class="hidden md:block ">
        <?php echo rl_galeria($galeria);
        ?>
    </span>
</div>

<!-- 

-->