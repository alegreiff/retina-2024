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
$altohover = 'h-[100%]';
if (isset($args['orden'])) {
    $indice = $args['orden'];
    $altohover = 'h-[90%]';
}
if (isset($args['fechasalida'])) {
    $fechasalida = $args['fechasalida'];
    $altohover = 'h-[85%]';
}
if (isset($args['estilo'])) {
    if ($args['estilo'] === 'masvistas') {
        $estilo = 'masvistas';
    } else {
        $estilo = '';
    }
}


?>
<li class="splide__slide  group relative retina_poster <?php echo $activa; ?> <?php echo $estreno; ?> ">
    <div class="pt-8 px-4">

        <img class=" w-full object-cover group-hover:blur-[3px] group-hover:grayscale rounded-lg" loading="lazy" src="<?php echo $poster; ?>" alt="Afiche <?php echo $titulo; ?>" title="<?php echo $titulo; ?>">

    </div>
    <a href="<?php echo $enlace; ?>" class="absolute top-0 left-0 z-10 flex flex-col items-center justify-start w-full h-0 duration-500 opacity-0 rounded-2xl bg-rl-morafuerte group-hover:h-full group-hover:opacity-80 group-hover:rounded-lg ">

        <div class="static px-6 pt-12 flex flex-col justify-between <?php echo $altohover; ?>">
            <h3 class="font-bold text-xl"><?php echo $titulo; ?></h3>
            <p class="font-normal  pt-4 text-sm leading-4 text-left"><?php echo $logline; ?></p>
            <div class="flex justify-around mb-2">
                <span class="text-xs">
                    <svg class="inline" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" fill="#f8f8f8" viewBox="0 0 64 64">
                        <path d="M 32 6.8007812 C 18.1 6.8007812 6.8007813 18.1 6.8007812 32 C 6.8007812 45.9 18.1 57.300781 32 57.300781 C 45.9 57.300781 57.300781 45.9 57.300781 32 C 57.300781 18.1 45.9 6.8007813 32 6.8007812 z M 32 9.8007812 C 44.2 9.8007812 54.300781 19.799609 54.300781 32.099609 C 54.300781 44.399609 44.3 54.300781 32 54.300781 C 19.7 54.300781 9.6992188 44.3 9.6992188 32 C 9.6992188 19.7 19.8 9.8007812 32 9.8007812 z M 31.976562 15.478516 A 1.50015 1.50015 0 0 0 30.5 17 L 30.5 29.40625 A 3 3 0 0 0 32 35 A 3 3 0 0 0 34.59375 33.5 L 42 33.5 A 1.50015 1.50015 0 1 0 42 30.5 L 34.597656 30.5 A 3 3 0 0 0 33.5 29.404297 L 33.5 17 A 1.50015 1.50015 0 0 0 31.976562 15.478516 z">
                        </path>
                    </svg>
                    <?php echo $duracion; ?> min.</span>



                <span class="text-xs"><?php echo $genero; ?></span>

            </div>



            <!-- <div class="absolute left-0 w-full p-1 bottom-8">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play24.svg" alt=""
                    class="w-8 h-8 mx-auto">


            </div> -->
            <!-- <span class="rl_year"><?php echo $year; ?></span> -->
        </div>
    </a>
    <?php
    if ($estilo != 'masvistas') {
    ?>
        <span class="rl_pais z-50">
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
        <p class="p-2 text-sm font- text-center border-2 border-rl-morablanco text-rl-morablanco bg-transparent rounded-lg mx-4 mt-4 z-20">
            <?php echo "Salida: <span class='font-bold p-1'>" . $dia . " de " . $mes . "</span>"; ?></p>
    <?php }

    if ($estilo === 'masvistas') {
    ?>
        <span class="text-rl-morasuave group-hover:text-rl-blanco font-bold absolute block mt-5 ml-3 top-2 left-0 z-30">#<?php echo $indice; ?></span>
        <span class="absolute top-2 -left-0">

            <svg class="w-[64px]   h-[64px]" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="rgb(255 171 0)" />
            </svg>
        </span>
        <!-- <span class=" absolute p-1 rl_pais -bottom-0 right-4">

        <?php echo $pais; ?> 
    </span> -->
        <span class="rl_pais_masvistas z-20">

            <?php echo $pais; ?>
        </span>

    <?php

    }
    ?>

</li>