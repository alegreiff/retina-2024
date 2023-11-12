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
if (isset($args['fechasalida'])) {
    $fechasalida = $args['fechasalida'];
}


?>
<li class="   dark:  group relative retina_poster <?php echo $activa; ?> <?php echo $estreno; ?>">
    <div class="pt-2 pr-2">

        <img class=" w-full object-cover group-hover:blur-[3px] group-hover:grayscale rounded-2xl" loading="lazy" src="<?php echo $poster; ?>" alt="Afiche <?php echo $titulo; ?>" title="<?php echo $titulo; ?>">

    </div>
    <a href="<?php echo $enlace; ?>" class="absolute top-0 left-0 z-10 flex flex-col items-center justify-start w-full h-0 duration-500 opacity-0 rounded-2xl bg-slate-900 group-hover:h-full group-hover:opacity-70 group-hover:rounded-2xl ">

        <div class="static p-1 ">

            <h3><?php echo $titulo; ?></h3>
            <p class="pt-4 text-sm leading-4  "><?php echo $logline; ?></p>


            <div class="absolute left-0 w-full p-1 bottom-8">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play24.svg" alt="" class="w-8 h-8 mx-auto">


            </div>
            <span class="rl_year"><?php echo $year; ?></span>
        </div>
    </a>
    <span class="absolute top-0 right-0 z-20 rl_pais ">
        <?php echo $pais; ?> </span>



</li>