<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package twretina
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class('');  ?>>

    <!-- <header class="relative flex items-center justify-center h-screen mb-12 overflow-hidden">
        <div class="relative z-30 p-5 text-2xl text-white bg-transparent bg-opacity-50 rounded-xl">
            <div class="container">
                <?php //retlat_carrusel(); 
                ?>
            </div>
        </div>
        <video autoplay loop muted class="absolute z-10 w-auto min-w-full min-h-full max-w-none">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/vidi.mp4" type="video/mp4" />
        </video>
    </header> -->
    <?php wp_body_open(); ?>

    <div id="page" class="">

        <a href="#content" class="sr-only"><?php esc_html_e('Skip to content', 'twretina'); ?></a>

        <?php get_template_part('template-parts/layout/header', 'content');
        ?>
        <!-- <div class="bg-amber-500">
            <button class="p-2 border" onclick="document.body.classList.toggle('dark')">
                Switch theme
            </button>
        </div> -->

        <!--  <div class="container mx-auto">
            <ul class="menu menu-vertical lg:menu-horizontal bg-sky-500 rounded-box">
                <li class="p-2 m-2 bg-sky-800"><a href="/">INICIO</a></li>
                <li class="p-2 m-2 bg-sky-800"><a href="/catalogo">Catálogo películas DISPONIBLES</a></li>
                <li class="p-2 m-2 bg-sky-800"><a href="/buscador-peliculas">Colecciones</a></li>
                <li class="p-2 m-2 bg-sky-800"><a href="/color-test">Test de COlores</a></li>
                <li class="p-2 m-2 bg-sky-800"><a href="/paralax">Parallax 01</a></li>

            </ul>
        </div> -->

        <!-- <div class="" id="content" class="bg-sky-900"> -->

        <!-- <div class="mx-auto bg-rl-amarillo " id="content">
        
         -->


        <!-- <div class="mx-auto bg-rl-amarillo " id="content"> -->
        <!-- <div class="mx-auto bg-rl-amarillo " id="content"> -->
        <!-- <div class="mx-auto bg-rl-amarillo " id="content"> -->


        <!-- ACTUAL -->
        <!-- <div class="mx-auto bg-rl-morafuerte text-rl-blanco " id="content"> -->
        <!-- <div class="mx-auto bg-rl-verde text-rl-blanco" id="content"> -->
        <!-- <div class="mx-auto bg-rl-morablanco text-rl-morafuerte" id="content"> -->

        <!-- <div class="mx-auto bg-rl-amarillo " id="content"> -->

        <!-- <div class="mx-auto bg-rl-blanco text-rl-morafuerte " id="content"> -->
        <div class="mx-auto bg-rl-morafuerte text-rl-blanco" id="content">