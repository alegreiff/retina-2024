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

$duracion = '<svg class="text-rl-blanco  stroke-current fill-transparent w-8 h-8 inline"  viewBox="0 0 24 24" >
<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
' . $duracion . ' min.';
$microdatos = array("🇨🇴 " . $pais, $year, $duracion, $genero);


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
                echo "<span class='text-2xl'>" . $dato . "</span>";

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
<div class="container mx-auto  p-8">
    <span class="hidden md:block">
        <?php echo rl_galeria($galeria);
        ?>
    </span>
</div>


<!-- 

-->