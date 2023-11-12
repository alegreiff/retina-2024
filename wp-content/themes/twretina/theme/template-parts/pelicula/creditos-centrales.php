<?php
$paises_produccion = get_field('countries_production');
$paises_coproduccion = get_field('rl_coproduccionpaises');
?>
<div class="md:grid md:grid-cols-2 text-retina-negro dark:text-retina-blanco">
    <h4 class="col-span-2 text-center text-2xl font-black md:gap-8 border-b-2 border-retina-verde w-80 mx-auto">Ficha
        técnica y
        artística
    </h4>
    <div class="text-center border-2 border-retina-verde m-2">
        <?php
        echo muestra_creditos('director');
        echo muestra_creditos('directors_assistant');
        echo muestra_creditos('screenwriter');
        echo muestra_creditos('searcher');
        echo muestra_creditos('rl_script');
        echo lista_asociada('País de producción', 'Países de producción',  $paises_produccion);
        echo lista_asociada('País coproductor', 'Países coproductores',  $paises_coproduccion);

        echo muestra_creditos('company_productors');
        echo muestra_creditos('producer');
        echo muestra_creditos('coproducer');
        echo muestra_creditos('executive_producer');
        echo muestra_creditos('associate_producer');
        echo muestra_creditos('rl_productordecampo');
        echo muestra_creditos('rl_productorasistente');

        echo muestra_creditos('director_photography');
        echo muestra_creditos('cameraman');
        echo muestra_creditos('camara_assistant');
        echo muestra_creditos('foto_fija');
        ?>
    </div>
    <div class="text-center border-2 border-retina-verde m-2">
        <?php
        echo muestra_creditos('soundman');
        echo muestra_creditos('sound_designer');
        echo muestra_creditos('sound_mzl');
        echo muestra_creditos('rl_microfonista');
        echo muestra_creditos('musician');

        echo muestra_creditos('montajista');
        echo muestra_creditos('rl_colorista');
        echo muestra_creditos('rl_ediciondesonido');
        echo muestra_creditos('art_director');
        echo muestra_creditos('rl_efectosvisuales');
        echo muestra_creditos('animator');
        echo muestra_creditos('rl_disenografico');
        echo muestra_creditos('rl_ilustrador');

        echo muestra_creditos('casting');
        echo muestra_creditos('vestuario');
        echo muestra_creditos('rl_maquillaje');
        echo muestra_creditos('narration');
        ?>
    </div>
</div>