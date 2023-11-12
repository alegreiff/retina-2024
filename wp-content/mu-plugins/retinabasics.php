<?php

/**
 * Plugin Name: Retina Latina Funciones Básicas
 * Plugin URI: https://wordpress.alegreiff.com
 * Description:  Funciones básicas independientes  de la plantilla
 * Version: 1.2
 * Creado el 30 de agosto de 2023
 * @package RetinaLatina24
 */

if (!defined('ABSPATH')) {
    die;
}

/* if (!class_exists('ACF')) {
    die;
} */

if (!class_exists('RetinaBasicFunctions')) {
    class RetinaBasicFunctions {
        public function __construct() {
            define('RUTA_PLUGIN', WPMU_PLUGIN_DIR . '/retinabasics');
        }
        public function initialize() {
            include_once RUTA_PLUGIN . '/includes/series.php';
            include_once RUTA_PLUGIN . '/includes/campos_pelicula.php';
            include_once RUTA_PLUGIN . '/includes/geobloqueo.php';
            include_once RUTA_PLUGIN . '/includes/equipo.php';
            include_once RUTA_PLUGIN . '/includes/video_trailer.php';

            //include_once RUTA_PLUGIN . '/includes/config/carga_javascript.php';
            include_once RUTA_PLUGIN . '/includes/config/retina.php';
            include_once RUTA_PLUGIN . '/includes/utils/retina_utils.php';
            include_once RUTA_PLUGIN . '/includes/utils/salidas_proximas.php';
        }
    }
    $retinaBasicFunctions = new RetinaBasicFunctions;

    $retinaBasicFunctions->initialize();
}
