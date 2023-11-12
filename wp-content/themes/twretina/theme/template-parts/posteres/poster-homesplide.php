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
$indice = null;
if (isset($args['orden'])) {
    $indice = $args['orden'];
}
if (isset($args['fechasalida'])) {
    $fechasalida = $args['fechasalida'];
}
if (isset($args['estilo'])) {
    if ($args['estilo'] === 'masvistas') {
        $estilo = 'masvistas';
    } else {
        $estilo = '';
    }
}


?>
<li class="splide__slide   dark:  group relative retina_poster <?php echo $activa; ?> <?php echo $estreno; ?> ">
    <div class="pt-8 px-4">

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
    <?php
    if ($estilo != 'masvistas') {
    ?>
        <span class="rl_pais ">
            <?php echo $pais; ?> </span>
    <?php
    } else {
    ?>

    <?php
    }
    ?>

    <?php
    if (isset($fechasalida)) {
        $dia = substr($fechasalida, 6, 2);
        $mes = mes_salida_pelicula(substr($fechasalida, 4, 2));
    ?>
        <p class="p-2 text-sm font- text-center border-2 border-rl-morablanco bg-transparent rounded-lg mx-4 mt-4">
            <?php echo "Salida: <span class='font-bold p-1'>" . $dia . " de " . $mes . "</span>"; ?></p>
    <?php }

    if ($estilo === 'masvistas') {
    ?>
        <span class="text-pink-600 font-bold absolute block mt-4 ml-2 top-0 left-0 z-30">#<?php echo $indice; ?></span>
        <span class="absolute top-0 -left-0">

            <svg class="w-[64px] text-pink-800  h-[64px]" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="rgb(255 171 0)" />
            </svg>
        </span>
        <!-- <span class=" absolute p-1 rl_pais -bottom-0 right-4">

        <?php echo $pais; ?> 
    </span> -->
        <span class="rl_pais_masvistas">

            <?php echo $pais; ?>
        </span>

    <?php

    }
    ?>

</li>