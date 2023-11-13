<?php

function retlat_campo_pelicula($campo) {

    return get_field($campo);
}

function rl_galeria($cadena) {

    //Extrae la primera cadena entre comillas dobles
    preg_match('/"(?:[^"]|"")+"/', $cadena, $result);

    //Elimina todo menos números y comas
    $res = preg_replace("/[^0-9,]/", "", $result[0]);

    //crea un array con la coma como delimitador de cada elemento
    $res = preg_split("/\,/", $res);

?>

    <sectipn class="splide" id="js_single_video_galeria">

        <div class="splide__track">

            <ul class="splide__list">
                <?
                $contador = 0;
                foreach ($res as $image) {
                    $contador++;
                    $media = wp_get_attachment_image_src(
                        $image,
                        'galerias'
                    );

                ?>
                    <div class="splide__slide grid place-items-center bg-red-500 p-8 m-4">
                        <img src="<?php echo $media[0] ?>" />
                    </div>

                <?php
                }

                ?>
            </ul>
        </div>

    </sectipn>


<?php



    //return wp_get_attachment_image_src($res[5], 'full');
}
