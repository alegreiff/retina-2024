<?php
$pais = retlat_campo_pelicula('country_group');
$year = retlat_campo_pelicula('year');
$duracion = retlat_campo_pelicula('duration');
$geo = $args['geo'];


/* 
echo "<div>" . $pais . "</div>";
echo "<div><i class='w-8 h-8 fa-regular fa-calendar'></i>" . $year . "</div>";
echo "<div><i class='w-8 h-8 fa-regular fa-clock'></i>" . $duracion . "</div>";
echo "<div>" . $geo . "</div>";

 */

?>

<div class="h-full p-2 
dark:bg-gradient-to-b dark:from-reti-verde-100 dark:to-reti-verde-400
bg-gradient-to-b from-amber-400 to-green-400
text-red-400 dark:text-amber-800
">
    <div><?php echo $pais; ?></div>
    <div><i class="fa-regular fa-calendar p-2 text-2xl"></i><?php echo $year; ?></div>
    <div><i class="fa-regular fa-clock p-2 text-2xl"></i><?php echo $duracion; ?></div>
    <div><i class="fa-solid fa-earth-americas p-2 text-2xl"></i>Disponible en <?php echo $geo; ?></div>

</div>