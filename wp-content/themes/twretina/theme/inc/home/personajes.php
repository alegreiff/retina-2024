<?php

/**
 * 
 * Personajes del cine en home
 */
function personajes_cine_home() {
    $lista = get_field('r2_personajes', 'option');
    $texto = get_field('r2_texto_franja_personajes', 'option');
    $copy = get_field('r2_copy_franja_personajes', 'option');
    $botontexto = get_field('r2_boton_personajes', 'option');
    $botonenlace = get_field('r2_enlace_personajes', 'option');



?>
    <div class="">

        <h2 class="h2_home"><?php echo $texto; ?> </h2>
        <p class="p_copy "><?php echo $copy; ?></p>
        <section class="splide   p-1" id="js_retinapersonajes">

            <div class="splide__track">
                <ul class="splide__list space-x-0">


                    <?php
                    personajes_cine_loop($lista);
                    ?>
                </ul>

            </div>
            <div class="flex justify-center">
                <a href="#" class=" self-center retibutton mt-4"><?php echo $botontexto ?></a>
            </div>

        </section>

    </div><!--  FIN PELÍCULAS QUE SE VAN DE RETINA  -->

    <?php




    //return $salida;
}
function personajes_cine_loop($lista) {
    $size = "persona-mini";
    foreach ($lista as $item) {
        $titulo = get_the_title($item);
        $peliculas_director = get_field('videos', $item);

        $miniatura = get_the_post_thumbnail(end($peliculas_director), 'destacada-mini', array(
            'class' => 'rounded-t-xl grayscale mx-auto personaje w-full group-hover:grayscale-0 duration-500'
        ));

        $pais = get_field("citizenship_person", $item);
        if (!get_the_post_thumbnail($item)) {
            $imagenDIR = '<img class="rl_round_director" src=' . get_stylesheet_directory_uri() . '/assets/images/nodirector.png" width="160px" height="240px">';
        } else {
            $imagenDIR = get_the_post_thumbnail($item, $size, array(
                'class' => 'rl_round_director'
            ));
        }

    ?>
        <li class="splide__slide  duration-500 group pb-24   text-center bg-rl-moramedio  hover:bg-rl-morasuave rounded-t-2xl translate-y-24 ">
            <a href="<?php echo get_post_permalink($item); ?>" class="">

                <?php echo $imagenDIR; ?>
                <h3 class="text-white h-20 -translate-y-24  px-2  font-bold text-2xl sm:text-xl lg:text-2xl">
                    <?php echo $titulo; ?></h3>
                <span class="block text-white -translate-y-12 text-xl uppercase "><?php echo $pais; ?></span>

                <div class=" bg-transparent"><?php echo $miniatura; ?></div>


            </a>
        </li>

<?php

    }
}
