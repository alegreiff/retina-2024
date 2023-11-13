<?php get_header(); ?>
<?php
$episodiodeserie = retlat_pertenece_serie();
$geo = retlat_campo_pelicula('rl_geobloqueo');
$geodatos = retlat_geo($geo)[0];
$img = get_the_post_thumbnail_url(null, 'full');
$inactiva = get_field('msg_custom');
$archivo = has_term(categoria_archivo(), 'videos_categories') ? true : false;



if ($episodiodeserie) {

    $serie = contenidoSerie($episodiodeserie);
} else {
    $serie = null;
}
?>

<div class="p-0 md:p-8">
    <div class="lg:grid lg:grid-cols-5">
        <div class="bg-no-repeat bg-cover lg:col-span-5 lg:grid lg:grid-cols-5"
            style="background-image: url(<?php echo $img; ?>);   background-blend-mode: multiply;">
            <div class="hidden lg:col-span-1 md:block">

                <?php get_template_part(
                    'template-parts/pelicula/ficha',
                    'mini',
                    array(
                        'geo' => $geodatos['nombre'],

                    )
                ); ?>
            </div>
            <div class="lg:col-span-4">
                <?php get_template_part(
                    'template-parts/pelicula/retinalatina',
                    'video',
                    array(
                        'familia' => $geodatos['familia']
                    )
                ); ?>
            </div>

        </div>
        <div class="lg:col-span-4 md:hidden">
            <?php get_template_part(
                'template-parts/pelicula/ficha',
                'mini',
                array(
                    'geo' => $geodatos['nombre'],

                )
            ); ?>
        </div>
        <div
            class="lg:col-span-1 dark:bg-gradient-to-b dark:from-green-300 dark:to-red-400 bg-gradient-to-b from-yellow-200 to-green-300 ">
            <?php get_template_part(
                'template-parts/pelicula/poster',
                'area',
                array(
                    'archivo' => $archivo,
                )
            ); ?>
        </div>


        <div class="p-2 lg:col-span-4 bg-amber-300 bg-opacity-5">
            <?php get_template_part(
                'template-parts/pelicula/pelicula',
                'main',
                array(
                    'serie' => $serie,
                    'inactiva' => $inactiva
                )
            ); ?>

            <div class="h-[450px]">

            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>