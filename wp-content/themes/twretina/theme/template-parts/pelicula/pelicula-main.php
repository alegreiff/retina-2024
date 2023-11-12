<?php
$serie = $args['serie'];
$inactiva = $args['inactiva'];
$otronombre = get_field('rl_otrosnombres');
$galeria = get_field('gallery', null, false);
$contenido = get_the_content();
$claseserie = $serie ? 'rl_serie' : 'rl_serie2';






?>
<div class="p-8 ">
    <?php
    if ($inactiva) {
    ?>
        <div class="p-2 text-2xl rounded-lg bg-amber-300 text-red-300">La película <span class="font-bold uppercase text-green-400"><?php the_title() ?></span> no
            está disponible pero hizo parte de nuestro catálogo. La información que encuentras publicada en Retina Latina,
            queda
            a disposición del público con fines de consulta y fortalecimiento de una base de datos del cine latinoamericano
            en
            internet.
        </div>
    <?php
    }
    ?>
    <div class="<?php echo $claseserie; ?>">
        <h1 class="rl_nombrepeli"> <?php the_title(); ?> </h1>
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

    </div>
    <div class="max-w-[800px] mt-6  prose lg:prose-xl  ">
        <?php echo $contenido; ?>
    </div>
    <span class="hidden md:block ">
        <?php //echo rl_galeria($galeria); 
        ?>
    </span>

    <?php get_template_part(
        'template-parts/pelicula/creditos',
        'centrales',

    ); ?>



</div>

<!-- 

[su_custom_gallery source="media: 2212,2211,2210,2209,2208,2207,2206,2205,2204,2203,2202" link="lightbox" width="120" height="120"]
[su_custom_gallery source="media: 983,982,981,980,987,986,985,984" link="lightbox" width="120" height="120"][/su_custom_gallery]
-->