<?php

/**
 * 
 * Datos adicionales película
 */

$paises_produccion = get_field('countries_production');
$paises_coproduccion = get_field('rl_coproduccionpaises');

$creditos_base = '';
$creditos_base .= muestra_creditos('director');
$creditos_base .= muestra_creditos('directors_assistant');
$creditos_base .= muestra_creditos('screenwriter');
$creditos_base .= muestra_creditos('searcher');
$creditos_base .= muestra_creditos('rl_script');
$creditos_base .= lista_asociada('País de producción', 'Países de producción',  $paises_produccion);
$creditos_base .= lista_asociada('País coproductor', 'Países coproductores',  $paises_coproduccion);
$creditos_base .= "<span class='block h-3'></span>";
$creditos_base .= muestra_creditos('company_productors');
$creditos_base .= muestra_creditos('producer');
$creditos_base .= muestra_creditos('coproducer');
$creditos_base .= muestra_creditos('executive_producer');
$creditos_base .= muestra_creditos('associate_producer');
$creditos_base .= muestra_creditos('rl_productordecampo');
$creditos_base .= muestra_creditos('rl_productorasistente');
$creditos_base .= "<span class='block h-3'></span>";
$creditos_base .= muestra_creditos('director_photography');
$creditos_base .= muestra_creditos('cameraman');
$creditos_base .= muestra_creditos('camara_assistant');
$creditos_base .= muestra_creditos('foto_fija');
$creditos_base .= "<span class='block h-3'></span>";
$creditos_base .= muestra_creditos('soundman');
$creditos_base .= muestra_creditos('sound_designer');
$creditos_base .= muestra_creditos('sound_mzl');
$creditos_base .= muestra_creditos('rl_microfonista');
$creditos_base .= muestra_creditos('musician');
$creditos_base .= "<span class='block h-3'></span>";
$creditos_base .= muestra_creditos('montajista');
$creditos_base .= muestra_creditos('rl_colorista');
$creditos_base .= muestra_creditos('rl_ediciondesonido');
$creditos_base .= muestra_creditos('art_director');
$creditos_base .= muestra_creditos('rl_efectosvisuales');
$creditos_base .= muestra_creditos('animator');
$creditos_base .= muestra_creditos('rl_disenografico');
$creditos_base .= muestra_creditos('rl_ilustrador');
$creditos_base .= "<span class='block h-3'></span>";
$creditos_base .= muestra_creditos('casting');
$creditos_base .= muestra_creditos('vestuario');
$creditos_base .= muestra_creditos('rl_maquillaje');
$creditos_base .= muestra_creditos('narration');



$musica = get_field('music');
$participacion = get_field('participation_event');
$premios = get_field('awards');
$locaciones = get_field('locations');

$acordeon_datos = array();


if (isset($creditos_base) && !empty($creditos_base)) {
    $acordeon_datos[] = array(
        'nombre' => 'Ficha técnica y artística',
        'data' => $creditos_base
    );
}



if (isset($musica) && !empty($musica)) {
    $acordeon_datos[] = array(
        'nombre' => 'Música',
        'data' => $musica,
    );
}
if (isset($participacion) && !empty($participacion)) {
    $acordeon_datos[] = array(
        'nombre' => 'Participación en eventos cinematográficos',
        'data' => $participacion,
    );
}
if (isset($premios) && !empty($premios)) {
    $acordeon_datos[] = array(
        'nombre' => 'Premios y reconocimientos',
        'data' => $premios
    );
}
if (isset($locaciones) && !empty($locaciones)) {
    $acordeon_datos[] = array(
        'nombre' => 'Locaciones',
        'data' => $locaciones
    );
}




/* print_r("<pre>");
print_r($acordeon_datos);
print_r("</pre>"); */

?>

<?php


if (isset($acordeon_datos) && count($acordeon_datos) > 0) {
    $html_salida = array();
    $indice = 0;
    foreach ($acordeon_datos as $dato) {
        $checked = '';
        if ($indice === 0) {
            $checked = 'checked';
        }
        $contenido = '
            <div class="collapse collapse-arrow bg-transparent mb-4">
            <input type="checkbox" />
                <div class="collapse-title bg-rl-morablanco text-rl-morafuerte ">
            ' . $dato['nombre'] . '
                </div>
                <div class="collapse-content">
                ' . $dato['data'] . '
                </div>
            </div>
    ';
?>



<?php


        $indice++;
        $html_salida[] = $contenido;
    }
}

$cuantosDatos = count($html_salida);


?>
<div class="text-rl-blanco flex flex-wrap ">
    <?php


    switch ($cuantosDatos) {
        case 1:
    ?>

            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[0]; ?></div>
            </div>


        <?php
            break;
        case 2:
        ?>

            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[0]; ?></div>
            </div>
            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[1]; ?></div>
            </div>


        <?php
            break;
        case 3:
        ?>

            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[0]; ?>
                    <?php echo $html_salida[2]; ?></div>
            </div>
            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[1]; ?></div>
            </div>


        <?php
            break;
        case 4:
        ?>

            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[0]; ?>
                    <?php echo $html_salida[2]; ?></div>
            </div>
            <div class="w-1/2">
                <div class="p-4"><?php echo $html_salida[1]; ?>
                    <?php echo $html_salida[3]; ?></div>
            </div>


        <?php
            break;
        case 5:
        ?>

            <div class="w-1/2">
                <div class="p-4">
                    <?php echo $html_salida[0]; ?>
                    <?php echo $html_salida[2]; ?>
                    <?php echo $html_salida[4]; ?>
                </div>
            </div>
            <div class="w-1/2">
                <div class="p-4">
                    <?php echo $html_salida[1]; ?>
                    <?php echo $html_salida[3]; ?>
                </div>
            </div>


        <?php
            break;
        default:
        ?>

            <div class="">
                No hay datos relacionados
            </div>
            <div class="">

            </div>


    <?php

    }

    ?>
</div>
<?php




?>




<!-- <div class="text-rl-negro grid grid-cols-2 gap-4">

    <div class="collapse collapse-arrow bg-base-200">
        <input type="radio" name="my-accordion-2" checked="checked" />
        <div class="collapse-title text-xl font-medium">
            Click to open this one and close others
        </div>
        <div class="collapse-content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, exercitationem repudiandae incidunt
                dignissimos nulla natus esse, molestias nesciunt nostrum, eum ratione alias rem dolores fuga minima
                laborum magnam. Aut, minus.</p>
        </div>
    </div>



</div> -->