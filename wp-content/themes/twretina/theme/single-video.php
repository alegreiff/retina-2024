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

$peliculaActiva = !$archivo;
$peliculaSerie = $serie ? true : false;


?>

<div class="container mx-auto bg-rose-400 p-8">
    <?php echo $peliculaActiva ? 'ACTIVA' : 'INACTIVA'; ?>
    <?php echo $peliculaSerie ? 'SI SERIE' : 'NO SERIE' ?>
</div>

<div class="container mx-auto ">
    <?php get_template_part(
        'template-parts/pelicula/retinalatina',
        'video',
        array(
            'familia' => $geodatos['familia']
        )
    );  ?>
</div>



<div class="container mx-auto color3070 p-8">
    <?php get_template_part(
        'template-parts/pelicula/posternombre',
        '',

        array(
            'inactiva' => $inactiva,
            'serie' => $serie,
            'geo' => $geodatos,
        )
    ); ?>

</div>

<div class="container   mx-auto mt-0">


    <?php get_template_part(
        'template-parts/pelicula/datos',
        'adicionales',


    ); ?>



</div>

<?php get_footer(); ?>