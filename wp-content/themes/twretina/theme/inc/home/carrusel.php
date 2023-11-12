<?php

/**
 * Carrusel HOME
 */

function retlat_carrusel_spslide() {
    $slides = get_field('r2_slide', 'option');


    if ($slides) {
        $slidesNum = count($slides);
        $slidesHome = array();
        for ($i = 0; $i < $slidesNum; $i++) {
            $slidesHome[] = array(
                'tipo' => $slides[$i]['r2_slide_tipo'],
                'titulo' => $slides[$i]['r2_slide_titulo'],
                'subtitulo' => $slides[$i]['r2_slide_subtitulo'],
                'media' => $slides[$i]['r2_slide_tipo'] === 'Video' ?  $slides[$i]['r2_slide_video'] :  $slides[$i]['r2_slide_imagen'],
                'textoenlace' => $slides[$i]['r2_slide_texto_enlace'],
                'enlace' => get_post_permalink($slides[$i]['r2_slide_enlace']),
            );
        }
    }

    if ($slides && $slidesNum > 0) {
        echo "<section id='js_carruselinicio' class='splide rl_home_carrusel'>";

        echo "<div class='splide__track'><ul class='splide__list'>";
        for ($i = 0; $i < $slidesNum; $i++) {
            echo "
        
        <li class='splide__slide rl_slide_home'>
        
        <a class='caroussele' href='" . $slidesHome[$i]['enlace'] . "'>
        <div class='order-2'>";

            if ($slidesHome[$i]['tipo'] === 'Video') {
                echo '<iframe id="iframePlayerCustom" src="https://player.instantvideocloud.net/#/embed/e5a883e598/' . $slidesHome[$i]['media'] . '" class="" frameborder="0" allowfullscreen></iframe>';
            } else {
                echo '<img src=' . $slidesHome[$i]['media'] . ' class="" alt="' . $slidesHome[$i]['titulo'] . '"/>';
            }
            echo "</div>
                <div class='order-1 '>
                    <div class='grid items-center content-center h-full py-8 px-8 lg:pl-12 lg:pr-20 bg-rl-moramedio'>
                        <h3 class='font-bold text-2xl pt-2 lg:pt-0 2xl:text-5xl'>" . $slidesHome[$i]['titulo'] . "</h3>
                        <h5 class='font-medium text-xl'>" . $slidesHome[$i]['subtitulo'] . "</h5>
                        <div>
                        <button class='mt-8 retibutton'> 
                        
                        
      
  
                        " . $slidesHome[$i]['textoenlace'] . "
                        
                        </button>
  
                        </div>
                        
                    </div>
                </div>
                </a>
                
                
            </li>
        ";
        }
        echo "</ul></div>"; //splide__track
?>


<?php
        echo "</section>";
    }

    //return count($slides);

}
