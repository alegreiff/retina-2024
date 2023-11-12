<?php get_header(); ?>
<?php
$episodiodeserie = retlat_pertenece_serie();
$geo = retlat_campo_pelicula('rl_geobloqueo');
$geodatos = retlat_geo($geo)[0];
$img = get_the_post_thumbnail_url(null, 'full');


?>
<!-- <div class="bg-cover bg-no-repeat bg-retina-morado bg-opacity-40" style="background-image: url(<?php echo $img; ?>);   background-blend-mode: multiply;
"> -->
<div>
    <div class="md:grid md:grid-cols-3 md:grid-rows-6  p-4 gap-2 text-retina-blanco">
        <div class="md:col-span-2 md:row-span-2 h-[400px] sm:order-1 md:order-2 bg-cover bg-no-repeat bg-retina-morado bg-opacity-40"
            style="background-image: url(<?php echo $img; ?>);   background-blend-mode: multiply;
">

            <?php get_template_part(
                'template-parts/pelicula/retinalatina',
                'video'
            ); ?>

        </div>
        <div class="bg-retina-morado bg-opacity-70 md:row-span-2 sm:order-2 md:order-3">
            <?php get_template_part(
                'template-parts/pelicula/poster',
                'area'
            ); ?>
        </div>
        <div class=" h-[150px] sm:order-3 md:order-1">
            <?php get_template_part(
                'template-parts/pelicula/ficha',
                'mini',
                array(
                    'geo' => $geodatos['nombre'],

                )
            ); ?>
        </div>


        <div class=" md:row-span-3 md:col-span-2 md:grid grid-cols-2 sm:order-4 md:order-4">
            <div class=" col-span-2">Ficha general</div>
            <div class="">Equipo técnico 1</div>
            <div class="">Equipo técnico 2</div>

        </div>
        <div class=" md:row-span-2 sm:order-5 md:order-5">FICHA AUTORES</div>


        <div class=" md:col-span-3 sm:order-6 md:order-6">
            <?php
            if ($episodiodeserie) {
                echo "SI hace parte de una serie";
            } else {
                echo "NO hace parte de una serie";
            }; ?>

        </div>
        <div class="bg-sky-400 md:col-span-3 sm:order-6 md:order-6">Comentarios</div>


    </div>

</div>
<?php get_footer(); ?>


<!-- 
<div class="h-96 bg-blue-300 flex p-4 gap-28">
        <div class="h-40 w-1/4  bg-amber-200">fdf</div>
        <div class="w-3/4 bg-pink-400"></div>
    </div>
Notice: La función register_rest_route ha sido llamada de forma incorrecta. El namespace no debe empezar o acabar con una barra inclinada. Por favor, ve depuración en WordPress para más información. (Este mensaje fue añadido en la versión 5.4.2). in /Users/alegreiff/Local Sites/latin23/app/public/wp-includes/functions.php on line 5905

-->