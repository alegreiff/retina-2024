<?php

/** 
 * Blog entradas para el home
 */

function retlat_franja_blogentradas() {
    $texto = get_field('r2_texto_franja_conexion', 'option');
    $blogs = get_field('r2_listaconexion', 'option');
    $copy = get_field('r2_copy_conexion', 'option');
    $botontexto = get_field('r2_textoenlace_conexion', 'option');
    $botonenlace = get_field('r2_enlace_conexion', 'option');


?>

    <div>
        <section class="pr-8 grid  grid-cols-12  space-x-4 bg-no-repeat bg-center bg-[length:900px_900px]  bg-opacity-25 bg-[url('./assets/images/square2.svg')]" id="">
            <h2 class="mt-12 h2_home col-span-full place-self-center row-start-1 text-rl-blanco "><?php echo $texto; ?>
            </h2>
            <p class="p_copy col-span-12 row-start-2 place-self-center text-rl-blanco"><?php echo $copy; ?></p>






            <?php

            blogs_inicio_loop($blogs);
            ?>



            <a href="<?php echo $botonenlace; ?>" class="col-span-12 text-center w-[200px] mx-auto order-last retibutton mt-4 lg:-mt-8 place-self-center mb-14"><?php echo $botontexto ?></a>

        </section>


    </div>

    <?php
}

function blogs_inicio_loop($blogs) {

    $index = 0;
    foreach ($blogs as $blog) {

        $titulo = get_the_title($blog);
        if (!get_the_post_thumbnail($blog)) {
            $imagenPost = '<img class="rounded-xl block mx-auto" src=' . get_stylesheet_directory_uri() . '/assets/images/no-destacada.png" width="300" height="215px w-full">';
        } else {
            $imagenPost = get_the_post_thumbnail($blog, 'destacada-mini', array(
                'class' => 'rounded-t-xl   w-full '
            ));
        }


        $order = '';
        $inicio = '';
        $imagen = '';
        $contenido = '';
        if ($index === 1) {
            $order = 'order-8';
            $inicio = 'lg:row-start-4 lg:col-start-1 lg:row-end-7 col-span-full lg:col-span-4 md:col-span-6 md:col-start-7 md:row-start-3 md:row-end-4 lg:place-self-end place-self-auto flex lg:block';
            $imagen = 'hidden lg:block  lg:w-full';
            $contenido = 'md:mb-2';
        } else if ($index === 0) {
            $order = 'order-5';
            $inicio = ' lg:row-start-3 lg:col-start-5 lg:row-end-6 col-span-full lg:col-span-4 md:col-span-6 md:col-start-1 md:row-start-3 md:row-end-5 lg:place-self-center place-self-auto flex md:block';
            $imagen = 'hidden md:block  md:w-full';
            $contenido = 'md:-mt-4';
        } else {
            $order = 'order-10';
            $inicio = ' lg:row-start-4 lg:col-start-9 lg:row-end-7 col-span-full lg:col-span-4 md:col-span-6 md:col-start-7 md:row-start-4 md:row-end-5 lg:place-self-start place-self-auto flex lg:block';
            $imagen = ' hidden lg:block  lg:w-full';
            $contenido = 'md:mb-2';
        }
        $titulo = get_the_title($blog);
    ?>
        <div class=" <?php echo $order; ?> <?php echo $inicio; ?> 
 text-rl-morafuerte max-w-full lg:max-w-sm bg-transparent  w-full 
  md:w-auto">


            <div class="<?php echo $imagen; ?>"><?php echo $imagenPost; ?></div>
            <div class="<?php echo $contenido; ?> py-12 px-4 bg-rl-blanco  rounded-xl lg:rounded-b-xl font-bold text-xl  w-full my-2  lg:my-0 lg:-mt-4">
                <?php echo $titulo; ?>
                <?php echo $order; ?>
            </div>


        </div>
<?php
        $index++;
    }
}



/* 




*/