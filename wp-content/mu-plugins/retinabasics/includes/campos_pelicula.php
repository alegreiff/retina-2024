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

<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">

    <div class="swiper-wrapper">

        <?
            $contador = 0;
            foreach ($res as $image) {
                $contador++;
                $media = wp_get_attachment_image_src($image, 'full');
            ?>
        <div class="swiper-slide">
            <img src="<?php echo $media[0] ?>" />
        </div>

        <?php
            }

            ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div thumbsSlider="" class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php

            foreach ($res as $ima2) {
                $media2 = wp_get_attachment_image_src($ima2, 'full');
            ?>

        <div class="swiper-slide">
            <img src="<?php echo $media2[0] ?>" />
        </div>



        <?php
            }

            ?>
    </div>
</div>
<?php



    //return wp_get_attachment_image_src($res[5], 'full');
}