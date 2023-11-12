<?php

// Función auxiliar de filtro_peliculas_retina
function enlace_relativo($enlace) {
    $domain = get_site_url(); // returns something like http://domain.com
    $relative_url = str_replace($domain, '', $enlace);
    return $relative_url;
}
function trae_poster($poster) {
    $size = "poster-mini";
    $image = wp_get_attachment_image_src($poster, $size);

    //return $image[0];
    $domain = get_site_url(); // returns something like http://domain.com
    $relative_url = str_replace($domain, '', $image[0]);
    return $relative_url;
}

//Extrae un código por cada país Miembro
function muestra_codigopais($pais) {
    switch ($pais) {
        case 'BOLIVIA':
            $code = 'Bol';
            break;
        case 'COLOMBIA':
            $code = 'Col';
            break;
        case 'ECUADOR':
            $code = 'Ecu';
            break;
        case 'PERÚ':
            $code = 'Per';
            break;
        case 'MÉXICO':
            $code = 'Méx';
            break;
        case 'URUGUAY':
            $code = 'Uru';
            break;
        default:
            $code = substr($pais, 0, 3);
    }
    return $code;
}

function traer_logline($id, $source = null) {
    $limit = 160;

    $excerpt = $source == "content" ? get_the_content($id) : get_the_excerpt($id);
    $excerpt = $excerpt . " ";
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    //$excerpt = $excerpt.'-';
    $excerpt = $excerpt;
    return $excerpt;
}


//Función que retorna DOC o FIC según sea documental o ficción
function muestra_genero($genero) {
    if ($genero == 'Documental') {
        return 'Documental';
    } else if ($genero == 'Ficción') {
        return 'Ficción';
    } else {
        return '';
    }
}



function peliculaTrailer($trailer) {
    return '<div class="youtube-player" data-id="' . $trailer . '"></div>';
    //return $salida;
}
//Extrae el ID de YouTube
function getYouTubeId($url) {
    if (strlen($url) == 11) {
        return $url;
    } else {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        return $match[1];
    }
}

function retlat_mes($mes) {
    switch ($mes) {
        case '01':
            return 'enero';
        case '02':
            return 'febrero';
        case '03':
            return 'marzo';
        case '04':
            return 'abril';
        case '05':
            return 'mayo';
        case '06':
            return 'junio';
        case '07':
            return 'julio';
        case '08':
            return 'agosto';
        case '09':
            return 'septiembre';
        case '10':
            return 'octubre';
        case '11':
            return 'noviembre';
        case '12':
            return 'diciembre';
    }
}

//========================================================//
/* Devuelve el ID de la categoría ARCHIVO
este valor podría cambiar de DESARROLLO a PRODUCCIÓN
*/
function categoria_archivo() {
    return 1008;
}

/* Devuelve el ID de la categoría MUNDO
este valor podría cambiar de DESARROLLO a PRODUCCIÓN
*/
function categoria_mundo() {
    return 1104;
}

/* Devuelve los IDS de género y formato
estos valores podrían cambiar de DESARROLLO a PRODUCCIÓN
*/

function rl_genero_documental() {
    return 19;
}

function rl_genero_ficcion() {
    return 66;
}

function rl_generoexperimental() {
    return 1986;
}

function rl_formato_corto() {
    return 92;
}

function rl_formato_largo() {
    return 93;
}
/* Categorías */

function rl_cat_bolivia() {
    return 94;
}
function rl_cat_colombia() {
    return 95;
}
function rl_cat_ecuador() {
    return 96;
}
function rl_cat_mexico() {
    return 97;
}
function rl_cat_peru() {
    return 98;
}

function rl_cat_uruguay() {
    return 127;
}
function rl_cat_cuba() {
    return 876;
};
function rl_cat_archivo() {
    return 1008;
};
function rl_cat_mundo() {
    return 1104;
};

/**
 * Personaje del cine categoría DIRECTOR
 */
function rl_cat_persona_director() {
    return 4;
}


/* TODO */
/* 
Estos mensajes deberían ser configurables en el dashboard de administración, en el perfil de COPIES
*/
function rl_mensajes_catalogo($cat) {
    $texto = "Estás viendo todos los contenidos disponibles de ";
    switch ($cat) {
        case rl_cat_archivo():
            return "Estás viendo los <span>contenidos no disponibles</span> que mantenemos para fortalecer una base de datos en Internet con información de los contenidos que han hecho parte del catálogo de Retina Latina.";
            break;
        case "":
            return $texto . "<span>todos los países</span> con contenidos en Retina Latina";
            break;
        case rl_cat_mundo():
            return $texto . "todos los países con contenidos en Retina Latina <span>que se pueden disfrutar en cualquier país. Sin geobloqueo</span>.";
            break;
        case rl_cat_bolivia():
            return $texto . "<span>Bolivia</span>.";
        case rl_cat_ecuador():
            return $texto . "<span>Ecuador</span>.";
        case rl_cat_colombia():
            return $texto . "<span>Colombia</span>.";
        case rl_cat_mexico():
            return $texto . "<span>México</span>.";
        case rl_cat_peru():
            return $texto . "<span>Perú</span>.";
        case rl_cat_uruguay():
            return $texto . "<span>Uruguay</span>.";
        case rl_cat_cuba():
            return $texto . "<span>Cuba</span>.";
        default:
            return "El catálogo experimenta un problema transitorio";
    }
}
