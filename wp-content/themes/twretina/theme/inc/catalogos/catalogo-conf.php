<?php

/**
 * FUNCIONES RELACIONADAS CON LA PÁGINA DE  CATÁLOGOS
 */
$retina_segmentos = array();
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'bolivia');
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'peru');
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'colombia');
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'ecuador');
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'uruguay');
$retina_segmentos[] = array('tipo' => 'pais', 'slug' => 'mexico');
$retina_segmentos[] = array('tipo' => 'duracion', 'slug' => 'cortometrajes');
$retina_segmentos[] = array('tipo' => 'duracion', 'slug' => 'largometrajes');
$retina_segmentos[] = array('tipo' => 'genero', 'slug' => 'ficciones');
$retina_segmentos[] = array('tipo' => 'genero', 'slug' => 'experimentales');
$retina_segmentos[] = array('tipo' => 'genero', 'slug' => 'documentales');
$retina_segmentos[] = array('tipo' => 'archivo', 'slug' => 'archivo');
$retina_segmentos[] = array('tipo' => 'mundo', 'slug' => 'mundo');

function rl_busca_segmento($seg) {
    global $retina_segmentos;

    foreach ($retina_segmentos as $segmento) {

        if ($segmento['slug'] === $seg) {

            return $segmento['tipo'];
        }
    }
}

/**
 * 
 * CONSTANTES
 */
$rl_docum = rl_genero_documental();
$rl_ficci = rl_genero_ficcion();
$rl_exper = rl_generoexperimental();
$rl_corto = rl_formato_corto();
$rl_largo = rl_formato_largo();

$rl_BOL = rl_cat_bolivia();
$rl_COL = rl_cat_colombia();
$rl_ECU = rl_cat_ecuador();
$rl_MEX = rl_cat_mexico();
$rl_PER = rl_cat_peru();
$rl_URU = rl_cat_uruguay();
$rl_CU = rl_cat_cuba();
$rl_ARCHIVO = rl_cat_archivo();
$rl_MUNDO = rl_cat_mundo();
