<?php get_header(); ?>

<!-- Función que carga el carrusel -->
<div class="container mx-auto">
    <?php retlat_carrusel_spslide(); ?>
</div>

<!-- Función que carga la sección principal de estrenos -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto">
        <?php
        retlat_franja_principal_spslider(); ?>
    </div>
</div>

<!-- Función que muestra las salidas próximas -->

<div class="p-8 mt-4 ">
    <div class="container mx-auto">
        <?php
        retlat_franja_salidasproximas(); ?>
    </div>
</div>

<!-- Función que muestra el tráiler del home -->
<div class="container mx-auto">
    <?php echo retlat_trailer_home(); ?>
</div>

<!-- Función que muestra la franja de En Tendencia -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto">
        <?php echo retlat_franja_entendencia(); ?>
    </div>
</div>


<!-- Sección y función que carga la sección de Las Más Vistas -->

<!--  lasmasvistas-->
<div class="container  mx-auto mt-4 bg-gradient-to-r from-rl-morafuerte to-rl-morasuave">
    <!-- bg-gradient-to-r from-rl-morafuerte to-rl-morasuave -->
    <div class="container p-8 mx-auto bg-no-repeat bg-left bg-[length:453px_528px] bg-opacity-25 bg-[url('./assets/images/bg-masvistas.svg')]">
        <?php echo rl_muestra_las_mas_vistas(); ?>
    </div>
</div>


<!-- Función que carga las series etiquetadas con HOME -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto ">
        <?php echo retlat_franja_series(); ?>
    </div>
</div>


<!-- Función que carga las películas seleccionadas -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto ">
        <?php echo retlat_franja_seleccionados(); ?>
    </div>
</div>

<!-- Función que carga el blog de entradas o las entradas del blog -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto ">
        <?php echo retlat_franja_blogentradas(); ?>
    </div>
</div>

<!-- Función que carga los personajes del HOME -->
<div class="p-8 mt-4 ">
    <div class="container mx-auto">
        <?php echo personajes_cine_home(); ?>
    </div>
</div>


<div class="p-8 ">
    <div class="container mx-auto">
        <?php //retlat_franja_principal();
        ?>
    </div>
</div>



<?php get_footer();
