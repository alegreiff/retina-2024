<?php

function muestra_creditos($campo) {
    $salida = '';
    if ($campo === 'producer') {
        $productor = get_field('producer');
        $jefe_produccion = get_field('chief_producer');

        if ($productor && $jefe_produccion) {
            $prod_jefeprod = array_merge($jefe_produccion, $productor);
        } else if (!$productor && $jefe_produccion) {
            $prod_jefeprod = ($jefe_produccion);
        } else if ($productor && !$jefe_produccion) {
            $prod_jefeprod = ($productor);
        } else {
            $prod_jefeprod = null;
        }
        $personas_contenidos = $prod_jefeprod;
        $label = nombre_taxonomia_persona($campo, 'campo', 'label');
    } else if (get_field($campo)) {

        $personas_contenidos = get_field($campo);
        $label = nombre_taxonomia_persona($campo, 'campo', 'label');
    }
    if (isset($personas_contenidos)) {
        $salida .= '<div>' . $label . ': </div>';
        $ta = array();
        foreach ($personas_contenidos as $persona) :
            if (strlen($persona->post_content) > 0) {
                $a_p = '<a href="' . get_permalink($persona->ID) . '" class="enlaceoscuro" >' . get_the_title($persona->ID) . '</a>';
            } else {
                $a_p = get_the_title($persona->ID);
            }
            array_push($ta, $a_p);
        endforeach;
        $salida .= implode(', ', $ta);
        $salida .= '';
    }
    return "<div class='mb-4 '>" . $salida . "</div>";
}

function nombre_taxonomia_persona($nombre, $entrada, $salida) {
    $roles_personas = [
        ["label" => "Reparto", "campo" => 'cast', "taxslug" => 'actores', "orden" => 150],
        ["label" => "Animación", "campo" => 'animator', "taxslug" => 'animador', "orden" => 525],
        ["label" => "Asistencia de cámara", "campo" => 'camara_assistant', "taxslug" => 'asistente-de-camara', "orden" => 320],
        ["label" => "Asistencia de dirección", "campo" => 'directors_assistant', "taxslug" => 'asistente-de-direccion', "orden" => 110],
        ["label" => "Asistencia de producción", "campo" => 'rl_productorasistente', "taxslug" => 'asistente-de-produccion', "orden" => 280],
        ["label" => "Cámara", "campo" => 'cameraman', "taxslug" => 'camarografo', "orden" => 310],
        ["label" => "Castin", "campo" => 'casting', "taxslug" => 'casting', "orden" => 540],
        ["label" => "Colorización", "campo" => 'rl_colorista', "taxslug" => 'colorizador', "orden" => 505],
        ["label" => "Compañía productora", "campo" => 'company_productors', "taxslug" => 'companias-productoras', "orden" => 220],
        ["label" => "Coproducción", "campo" => 'coproducer', "taxslug" => 'coproductor', "orden" => 240],
        ["label" => "Dirección", "campo" => 'director', "taxslug" => 'directores', "orden" => 102],
        ["label" => "Dirección de arte", "campo" => 'art_director', "taxslug" => 'director-de-arte', "orden" => 515],
        ["label" => "Dirección de fotografía", "campo" => 'director_photography', "taxslug" => 'director-de-fotografia', "orden" => 302],
        ["label" => "Diseño de sonido", "campo" => 'sound_designer', "taxslug" => 'disenador-de-sonido', "orden" => 410],
        ["label" => "Diseño gráfico", "campo" => 'rl_disenografico', "taxslug" => 'diseno-grafico', "orden" => 530],
        ["label" => "Edición de sonido", "campo" => 'rl_ediciondesonido', "taxslug" => 'editor-de-sonido', "orden" => 510],
        ["label" => "Efectos visuales", "campo" => 'rl_efectosvisuales', "taxslug" => 'efectos-visuales', "orden" => 520],
        ["label" => "Foto fija", "campo" => 'foto_fija', "taxslug" => 'foto-fija', "orden" => 330],
        ["label" => "Guion", "campo" => 'screenwriter', "taxslug" => 'guionista', "orden" => 120],
        ["label" => "Investigación", "campo" => 'searcher', "taxslug" => 'investigador', "orden" => 130],
        ["label" => "Jefatura de producción", "campo" => 'chief_producer', "taxslug" => 'jefe-de-produccion', "orden" => ''],
        ["label" => "Maquillaje", "campo" => 'rl_maquillaje', "taxslug" => 'maquillador', "orden" => 550],
        ["label" => "Mezcla de sonido", "campo" => 'sound_mzl', "taxslug" => 'mezcla-de-sonido', "orden" => 420],
        ["label" => "Microfonista", "campo" => 'rl_microfonista', "taxslug" => 'microfonista', "orden" => 430],
        ["label" => "Montaje", "campo" => 'montajista', "taxslug" => 'montajista', "orden" => 502],
        ["label" => "Música", "campo" => 'musician', "taxslug" => 'musico', "orden" => 440],
        ["label" => "Narración", "campo" => 'narration', "taxslug" => 'narracion', "orden" => 555],
        ["label" => "Producción", "campo" => 'producer', "taxslug" => 'productor', "orden" => 230],
        ["label" => "Producción asociada", "campo" => 'associate_producer', "taxslug" => 'productor-asociado', "orden" => 260],
        ["label" => "Producción de campo", "campo" => 'rl_productordecampo', "taxslug" => 'productor-de-campo', "orden" => 270],
        ["label" => "Producción ejecutiva", "campo" => 'executive_producer', "taxslug" => 'productor-ejecutivo', "orden" => 250],
        ["label" => "Script - continuista", "campo" => 'rl_script', "taxslug" => 'script-continuista', "orden" => 140],
        ["label" => "Sonido directo", "campo" => 'soundman', "taxslug" => 'sonidista', "orden" => 402],
        ["label" => "Vestuario", "campo" => 'vestuario', "taxslug" => 'vestuario', "orden" => 545],

        ["label" => "Ilustración", "campo" => 'rl_ilustrador', "taxslug" => 'ilustrador', "orden" => 535],

        ["label" => "Países de producción", "campo" => 'countries_production', "taxslug" => '', "orden" => 202],
        ["label" => "Participación en eventos cinematográficos", "campo" => 'participation_event', "taxslug" => '', "orden" => ''],
        ["label" => "Geobloqueo", "campo" => 'rl_geobloqueo', "taxslug" => '', "orden" => ''],
        ["label" => "Otros nombres", "campo" => 'rl_otrosnombres', "taxslug" => '', "orden" => ''],
        ["label" => "Película inspirada en", "campo" => 'rl_inspirado', "taxslug" => '', "orden" => ''],
        ["label" => "Contacto", "campo" => 'rl_contacto', "taxslug" => '', "orden" => ''],
        ["label" => "Locaciones", "campo" => 'locations', "taxslug" => '', "orden" => ''],
        ["label" => "Música", "campo" => 'music', "taxslug" => '', "orden" => ''],
        ["label" => "Web", "campo" => 'webpage', "taxslug" => '', "orden" => ''],
        ["label" => "Premios y reconocimientos", "campo" => 'awards', "taxslug" => '', "orden" => ''],
        ["label" => "País", "campo" => 'country_group', "taxslug" => '', "orden" => ''],
        ["label" => "Nacionalidad", "campo" => 'citizenship_video', "taxslug" => '', "orden" => ''],
        ["label" => "Duración", "campo" => 'duration', "taxslug" => '', "orden" => ''],
        ["label" => "Países coproductores", "campo" => 'rl_coproduccionpaises', "taxslug" => '', "orden" => 210],
        ["label" => "Disponible hasta", "campo" => 'rl_fechasalida', "taxslug" => '', "orden" => ''],






    ];
    foreach ($roles_personas as $rol => $val) {
        if ($val[$entrada] == $nombre) {
            return $val[$salida];
        }
    }
    return null;
}

function formato_dato($dato) {
    return '<div>' . $dato . '</div>';
}

function retlat_tax_link($tax) {
    $pre = wp_get_post_terms(get_the_ID(), $tax)[0];
    return '<a href="' . get_term_link($pre->name, $pre->taxonomy) . '" class="enlaceoscuro">' . $pre->name . '</a>';
}

function retlat_tax($tax) {
    $pre = wp_get_post_terms(get_the_ID(), $tax)[0];
    return $pre->name;
}

function idiomas_pelicula($arregloidiomas) {
    $idioma_mostrado = [];
    foreach ($arregloidiomas as $idioma) {
        $idioma_mostrado[] = strtolower($idioma->name);
    }
    count($arregloidiomas) === 1 ? $prefijo = 'Idioma: '  : $prefijo = 'Idiomas: ';
    return $prefijo . implode(" / ", $idioma_mostrado);
}

function web($url) {
    if ($url !== '')
        echo '<br /><i class="fas fa-link"></i> ' . '<a href="' . $url . '" target="_blank">Sitio web</a>';
}

function contacto_productora($contacto) {
    if (!empty($contacto))
        echo '<div class="rl_contacto">' . $contacto . '</div>';
}


function lista_asociada($etiqueta, $etiquetaplural, $campos) {
    $etiquetaplural === '' ? $etiquetaplural = $etiqueta : $etiquetaplural = $etiquetaplural;
    $salida = '';
    if ($campos) :
        //d($campos);
        count($campos) ===  1 ? $salida .= '<div class="">' . $etiqueta . ': </div>' : $salida .= '<div class="">' . $etiquetaplural . ': </div>';

        $ta = array();
        foreach ($campos as $campo) :
            $a_p = '<div class="">' . $campo . '</div>';
            array_push($ta, $a_p);
        endforeach;
        $salida .= implode(', ', $ta);
        $salida .= '';
    endif;

    return "<div class='mb-4'>" . $salida . "</div>";
}
