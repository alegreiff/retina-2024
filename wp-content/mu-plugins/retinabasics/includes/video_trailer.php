<?php
function peliculaIframeMultistream($video, $familia) {


    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
        $familia = 'e5a883e598';
    }

    return '<iframe id="iframePlayerCustom" src="https://player.instantvideocloud.net/#/embed/' . $familia . '/' . $video . '" width="100%" height="auto" class="aspect-video" frameborder="0" onload="ons()" allowfullscreen></iframe>';
}

/* function peliculaTrailer($trailer) {
    return '<iframe id="rl_youtube_iframe" title="Tráiler en Retina Latina" class="retinayoutube-player aspect-video" type="text/html"  src="//www.youtube.com/embed/' . $trailer . '?enablejsapi=1&version=3&playerapiid=ytplayer"frameborder="0" allowFullScreen></iframe>';
} */

function retlat_otrasversiones() {
    $otrasversiones = false;
    if (get_field('rl_versiones')) :
        $otrasversiones = array();
        while (the_repeater_field('otras_versiones')) :
            if (strlen(get_sub_field('rl_otras_versiones_codigo')) === 36) {
                $otrasversiones[] = array(
                    'label' => get_sub_field('rl_otras_versiones'),
                    'geo' => rl_nombre_geobloqueo(get_sub_field('rl_otras_versiones_geo'), 'familia'),
                    'pelicula' => get_sub_field('rl_otras_versiones_codigo'),

                );
            }

        endwhile;
    endif;

    return $otrasversiones;
}