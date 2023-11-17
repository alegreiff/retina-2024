<?php

/**
 * Tráiler HOME
 */
function retlat_trailer_home() {
    $r2_trailer_texto = get_field('r2_texto_franja_trailer', 'option');
    $r2_trailer_tipo = get_field('r2_trailer_es_interno', 'option');
    $r2_trailer_lista = get_field('r2_listatraileres', 'option');

    $r2_trailer_film = $r2_trailer_lista[rand(0, count($r2_trailer_lista) - 1)];
    $r2_trailer_mostrar = get_field('trailer', $r2_trailer_film);
    $r2_trailer_titulo = get_the_title($r2_trailer_film);
    $r2_trailer_logline = traer_logline($r2_trailer_film);
    $r2_trailer_enlace = enlace_relativo(get_post_permalink($r2_trailer_film));

    $r2_trailer_externo = get_field('r2_trailer_es_interno', 'option');
?>
<div class="mt-4 md:grid md:grid-cols-2 ">

    <!-- <div class="rl_trailerfranja md:col-span-2 justify-self-end"><?php echo $r2_trailer_texto; ?> </div> -->
    <p class="md:col-span-2 justify-self-end
        text-right  
		bg-gradient-to-r from-rl-morasuave to-rl-amarillo
		text-3xl font-bold p-4 
		rounded-s-2xl  z-10 md:mb-[-40px]
        
     order-1
        "><?php echo $r2_trailer_texto; ?></p>




    <a class="order-3 flex flex-col justify-center p-12 bg-rl-moramedio" href="<?php echo $r2_trailer_enlace; ?>">
        <h3 class="mb-4 text-2xl text-rl-blanco font-bold  xl:text-3xl">
            <?php echo $r2_trailer_titulo; ?>
        </h3>
        <p class="text-rl-blanco"><?php echo $r2_trailer_logline; ?></p>
        <button class='mt-8 retibutton self-start'>Ver película</button>
    </a>
    <div class="order-2 bg-rl-moramedio">
        <?php
            
            echo peliculaTrailer(getYouTubeId($r2_trailer_mostrar));


            ?>


    </div>



</div>

<?php

}