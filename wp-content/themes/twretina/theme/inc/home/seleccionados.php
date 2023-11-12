<?php

/**
 * 
 * Contenidos seleccionados
 * En espera de una definición más amplia por parte de Dalieth
 */

function retlat_franja_seleccionados() {
    $texto = get_field('r2_texto_seleccionados', 'option');
    $copy = get_field('r2_copy_seleccionados', 'option');
    $contenidos = get_field('r2_seleccionados', 'option');

?>
    <h2 class="h2_home"><?php echo $texto; ?> </h2>

    <p class="p_copy"><?php echo $copy; ?></p>
    <section class="splide" id="js_retinaseleccionados">

        <div class="splide__track">
            <ul class="splide__list">
                <?php
                retlat_html_seleccionados($contenidos);
                ?>
            </ul>

        </div>

    </section>
    <?php

}

function retlat_html_seleccionados($contenidos) {

    foreach ($contenidos as $cont) {
        $titulo = get_the_title($cont);
        if (!get_the_post_thumbnail($cont)) {
            $imagenBlog = '<img class="rounded-xl block mx-auto w-full" src=' . get_stylesheet_directory_uri() . '/assets/images/no-destacada.png" width="300" height="215px">';
        } else {
            $imagenBlog = get_the_post_thumbnail($cont, 'destacada-mini', array(
                'class' => 'rounded-xl block mx-auto w-full'
            ));
        }
    ?>
        <li class=" splide__slide">
            <a href="<?php echo get_post_permalink($cont); ?>" class="">


                <div class="relative bg-gradient-to-b from-rl-moramedio to-rl-morafuerte p-4 rounded-xl">



                    <div class="flex flex-col  justify-between">
                        <?php echo $imagenBlog; ?>
                        <img class="opacity-80 absolute top-5 left-5" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/triangulo-blanco-mini.svg" alt="">
                        <h3 class="font-bold text-2xl my-4"><?php echo $titulo; ?></h3>
                        <p class="mb-2">Conoce lo maravilloso de este contenido que te traemos en este mes Conoce lo
                            maravilloso
                            de este contenido que te traemos en este mes</p>
                    </div>

                </div>


            </a>


        </li>
<?php

    }
}
