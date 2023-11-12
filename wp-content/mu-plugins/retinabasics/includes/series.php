<?php

function retlat_pertenece_serie() {
    $serieMadre = get_posts(array(
        'post_type' => 'series',
        'fields'     => 'ids',
        'post_status' => array('publish'),
        'posts_per_page' => -1

    ));

    $pertenezco_serie = [];
    foreach ($serieMadre as $serie) {
        $caps = get_field('rl_series_temporadas', $serie)[0]['temporada_episodios'];
        foreach ($caps as $cap) {
            if ($cap === get_the_ID()) {
                $pertenezco_serie[] = $serie;
            }
        }
    }
    return $pertenezco_serie;
}

function episodioEnSerie($serie, $episodio) {
    $camposSerie = get_fields($serie);
    $enlace = enlace_relativo(get_post_permalink($serie));
    $titulo_serie = get_the_title($serie);
    $salida = '<div class="bg-retina-verde-700 w-[600px] p-2 rounded-xl m-4">Este contenido hace parte de la serie ';
    $salida .= '' .  "<a href=' $enlace ' target='_self' class='enlaceoscuro' title='Ver episodio: $titulo_serie '>$titulo_serie</a>";
    $contenido = false;


    if ($camposSerie['rl_series_temporadas']) {
        $temporadas = $camposSerie['rl_series_temporadas'];

        $numerotemporada = 0;
        $cantidad_temporadas = count($camposSerie['rl_series_temporadas']);
        for ($i = 0; $i < $cantidad_temporadas; $i++) {
            $cantidad_episodios = count($temporadas[$i]['temporada_episodios']);
            $esteEpisodio = 0;
            for ($j = 0; $j < $cantidad_episodios; $j++) {
                if ($temporadas[$i]['temporada_episodios'][$j] === $episodio) {
                    $numerotemporada = $i;
                    $contenido = true;
                    $esteEpisodio = ($j + 1);
                } else {
                }
            }
            if ($cantidad_temporadas === 1) {
                $temporadaNombre = '';
            } else {
                $temporadaNombre = 'Temporada ' . ($numerotemporada + 1);
            }
        }
        $episodios_temporada = $temporadas[$numerotemporada]['temporada_episodios'];

        $index = array_search($episodio, $episodios_temporada) + 1;

        $primero = false;
        $ultimo = false;
        if ($esteEpisodio === 1) {
            $primero = true;
        }
        if ($esteEpisodio === count($episodios_temporada)) {
            $ultimo = true;
        }

        if ($primero === false && $ultimo === false) {
            $enlaceAnterior = enlace_relativo(get_post_permalink($episodios_temporada[$index - 2]));
            $enlaceSiguiente = enlace_relativo(get_post_permalink($episodios_temporada[$index]));
        } else if ($primero === false && $ultimo === true) {
            $enlaceAnterior = enlace_relativo(get_post_permalink($episodios_temporada[$index - 2]));
        } else if ($primero === true && $ultimo === false) {
            $enlaceSiguiente = enlace_relativo(get_post_permalink($episodios_temporada[$index]));
        }
        $anterior = !$primero ? "<a  class='enlaceoscuro' href='" . $enlaceAnterior . "' target='_self'><i class='fas fa-backward'></i> Anterior</a>"  : "";
        $siguiente = !$ultimo ? "<a class='enlaceoscuro' href='" . $enlaceSiguiente . "' target='_self'> Siguiente <i class='fas fa-forward'></i></a>" : "";
        $salida .= '<p> ' . $anterior . ' Episodio ' . $index . ' de  ' . count($episodios_temporada) . $siguiente . '</p><p>' . $temporadaNombre . '</p>';
    }


    if ($contenido) {
        return $salida . '</div>';
    } else {
        return "";
    }
}

function listaTemporadasEpisodiosSerie($temporadas) {
    $cantidad_temporadas = count($temporadas);
    for ($i = 0; $i < $cantidad_temporadas; $i++) {
        $textoHtml = '';
        $temporadaNombre = $temporadas[$i]['temporada_mostrar_nombre'] ? $temporadas[$i]['temporada_nombre'] : '';
        $textoHtml .= "<div class='temporada'>";
        $temporadaNombre == '' ? '' : $textoHtml .= "<div class='nombreTemporada'> $temporadaNombre </div>";
        $cantidad_episodios = count($temporadas[$i]['temporada_episodios']);
        for ($j = 0; $j < $cantidad_episodios; $j++) {
            $episodioId = $temporadas[$i]['temporada_episodios'][$j];
            $titulo = get_the_title($episodioId);
            $episodioNumero = ($j + 1);
            $imagen = get_the_post_thumbnail_url($episodioId, 'medium');
            $logline = traer_logline($episodioId);
            $duracion = get_field('duration', $episodioId);
            $enlace = enlace_relativo(get_post_permalink($episodioId));
            $desc = '
				<div class="contenedor-imagen-episodio">
					<img src="' . $imagen . '" />
					<div class="after">
						<button class="botonrchomevideo"><span></span></button>
					</div>
				</div>';
            $textoHtml .= "
					<a href=' $enlace ' target='_blank' title='Ver episodio: $titulo '>
						<div class='contenido'>	
						<div class='episodioNum'> $episodioNumero </div>    
						$desc
						<div class='logline'> $titulo <span class='serie-logline'> $logline </span> </div>
						<div class=''> $duracion min</div>
						</div>
					</a>";
        }
        $textoHtml .= "</div>";
    }
    //$html .= '</tbody></table>';
    return $textoHtml;
}



function contenidoSerie($serie) {

    $__serie = $serie;
    if ($__serie) {
        $serieDato = '';
        $serieDato .= episodioEnSerie($__serie[0], get_the_ID());
    } else {
        $serieDato = '';
    }
    return  $serieDato;
}
