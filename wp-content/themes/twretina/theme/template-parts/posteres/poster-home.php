<?php
$pais = $args['pais'];
$titulo = $args['titulo'];
$duracion = $args['duracion'];
$genero = $args['genero'];
$poster = $args['poster'];
$logline = $args['logline'];
$enlace = $args['enlace'];
$year = $args['year'];
$activa = $args['activa'];
$estreno = $args['estreno'];

?>
<div class="  dark:  group relative swiper-slide retina_poster <?php echo $activa; ?> <?php echo $estreno; ?>">
    <div class="">

        <img class="w-full object-cover " loading="lazy" src="<?php echo $poster; ?>" alt="Afiche <?php echo $titulo; ?>" title="<?php echo $titulo; ?>">

        <div class="mt-5 flex flex-row p-1 group-hover">
            <span class="z-20 w-1/2 duracion text-sm "><i class="fa-regular fa-clock mr-1"></i><?php echo $duracion; ?>
                min.</span>
            <span class="z-20 w-1/2 text-sm "><?php echo muestra_genero($genero); ?>
            </span>
            <div class="rc_nodisponible"></div>
        </div>
    </div>
    <a href="<?php echo $enlace; ?>" class="z-10 absolute top-0 left-0 w-full h-0 flex flex-col justify-start  items-center bg-lime-400  opacity-0 group-hover:h-full group-hover:opacity-100 duration-500 bg-opacity-90 group-hover:rounded-2xl">

        <div class=" p-1 static ">
            <span class="rl_year"><?php echo $year; ?></span>
            <p class="text-sm leading-4 pt-4  "><?php echo $logline; ?></p>
            <!-- <button class="botonretina-poster"><span></span></button> -->

            <div class="absolute bottom-8 left-0 p-1 w-full">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play24.svg" alt="" class="w-8 h-8 mx-auto">
                <!-- <i class="fa-regular fa-circle-play text-retina-amarillo text-center text-4xl opacity-90"></i> -->
                <h3><?php echo $titulo; ?></h3>
            </div>
        </div>
    </a>
    <span class="rl_pais absolute top-0 right-0 z-20  ">
        <?php echo $pais; ?> </span>

</div>