<?php

/**
 * Template Name: Catalogo Looco
 * Description: Plantilla de la nadedad
 * Plantilla Nada nadita

 * @package retina
 */


get_header();

global $wp;
$categoria = add_query_arg(array(), $wp->request);
$segmentos = explode("/", $categoria);

$slug = end($segmentos);


$tipo = rl_busca_segmento($slug);

print_r("<pre>");
print_r($slug . ":" . $tipo);

print_r("</pre>");
$clasefiltros = '';
if (isset($tipo)) {
    $clasefiltros = 'hidden';
}

?>

<section class="container mx-auto flex text-rl-morafuerte">
    <div class="bg-red-500">




    </div>



    <div class="rl_filtros <?php echo $clasefiltros; ?>">
        <form id="filter" class="filtro_main_catalogo">
            <input type="hidden" name="action" value="filtro_peliculas_retina">
            <input type="hidden" name="current_page" value=2>
            <!-- <input type="hidden" name="page" value="nextPage"> -->

            <!-- <input type="hidden" name="categoria_mostrada" value="<?php echo $cat; ?>"> -->

            <div class="controles-paises flex gap-4 justify-start items-start">

                <!-- <div class="dropdown rl_filtros_dropdown">
                    <label tabindex="0" class="btn m-1">Países</label>

                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                if (!isset($tipo)) {
                                ?>
                                <input id="paisall" type="radio" checked value="" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <?php
                                } else {
                                ?>
                                <input id="paisall" type="radio" value="" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <?php
                                }
                                ?>
                                <label for="paisall"
                                    class="">Todos
                                    los
                                    países
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisbol" type="radio" value="<?php echo $rl_BOL; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisbol"
                                    class="">🇧🇴
                                    Bolivia
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                $checked = '';
                                if (isset($tipo) && isset($slug) && $slug === 'colombia') {
                                    $checked = "checked";
                                }
                                ?>
                                <input id="paiscol" type="radio" <?php echo $checked; ?> value="<?php echo $rl_COL; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paiscol"
                                    class="">Colombia
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisecu" type="radio" value="<?php echo $rl_ECU; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisecu"
                                    class="">Ecuador
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paismex" type="radio" value="<?php echo $rl_MEX; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paismex"
                                    class="">México
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                $checked = '';
                                if (isset($tipo) && isset($slug) && $slug === 'peru') {
                                    $checked = "checked";
                                }
                                ?>
                                <input id="paisper" type="radio" <?php echo $checked; ?> value="<?php echo $rl_PER; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">

                                <label for="paisper"
                                    class="">Perú
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisuru" type="radio" value="<?php echo $rl_URU; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisuru"
                                    class="">Uruguay
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paiscub" type="radio" value="<?php echo $rl_CU; ?>" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="paiscub"
                                    class="">Cuba
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisallworld" type="radio" value="<?php echo $rl_MUNDO; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisallworld"
                                    class="">Disponibles en
                                    todo el mundo
                                </label>
                            </div>
                        </li>
                    </ul>
                </div> -->
                <button id="dropdownDividerButton1" data-dropdown-toggle="dropdownDivider1"
                    class="
                    text-rl-morafuerte bg-rl-morablanco 
                    hover:bg-rl-morasuave hover:text-rl-morablanco 
                    focus:ring-4 focus:outline-none focus:ring-rl-morafuerte font-bold rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center " type="button">

                    <span>Países</span> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />

                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDivider1" class="z-10 hidden rl_dividerdrop_1">
                    <ul class="py-2" aria-labelledby="dropdownDividerButton">
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                if (!isset($tipo)) {
                                ?>
                                <input id="paisall" type="radio" checked value="" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <?php
                                } else {
                                ?>
                                <input id="paisall" type="radio" value="" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <?php
                                }
                                ?>
                                <label for="paisall" class="">Todos
                                    los
                                    países
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisbol" type="radio" value="<?php echo $rl_BOL; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisbol" class="">
                                    Bolivia
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                $checked = '';
                                if (isset($tipo) && isset($slug) && $slug === 'colombia') {
                                    $checked = "checked";
                                }
                                ?>
                                <input id="paiscol" type="radio" <?php echo $checked; ?> value="<?php echo $rl_COL; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paiscol" class="">Colombia
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisecu" type="radio" value="<?php echo $rl_ECU; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisecu" class="">Ecuador
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paismex" type="radio" value="<?php echo $rl_MEX; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paismex" class="">México
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <?php
                                $checked = '';
                                if (isset($tipo) && isset($slug) && $slug === 'peru') {
                                    $checked = "checked";
                                }
                                ?>
                                <input id="paisper" type="radio" <?php echo $checked; ?> value="<?php echo $rl_PER; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">

                                <label for="paisper" class="">Perú
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisuru" type="radio" value="<?php echo $rl_URU; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisuru" class="">Uruguay
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paiscub" type="radio" value="<?php echo $rl_CU; ?>" name="categoria_mostrada"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="paiscub" class="">Cuba
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="paisallworld" type="radio" value="<?php echo $rl_MUNDO; ?>"
                                    name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                                <label for="paisallworld" class="">Disponibles en
                                    todo el mundo
                                </label>
                            </div>
                        </li>
                    </ul>

                </div>


                <ul
                    class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="">
                        <div class="flex items-center pl-3">
                            <input id="paisarchive" type="radio" value="<?php echo $rl_ARCHIVO; ?>"
                                name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                            <label for="paisarchive" class="">Archivo
                            </label>
                        </div>
                    </li>
                </ul>






                <!-- <div class="switch-field">
                <input type="radio" id="paisall" name="categoria_mostrada" value="" checked />
                <label for="paisall">Todos los países</label>

                <input type="radio" id="paisbol" name="categoria_mostrada" value="<?php echo $rl_BOL; ?>" />
                <label for="paisbol">Bolivia</label>
                <input type="radio" id="paiscol" name="categoria_mostrada" value="<?php echo $rl_COL; ?>" />
                <label for="paiscol">Colombia</label>
                <input type="radio" id="paisecu" name="categoria_mostrada" value="<?php echo $rl_ECU; ?>" />
                <label for="paisecu">Ecuador</label>
                <input type="radio" id="paismex" name="categoria_mostrada" value="<?php echo $rl_MEX; ?>" />
                <label for="paismex">México</label>
                <input type="radio" id="paisper" name="categoria_mostrada" value="<?php echo $rl_PER; ?>" />
                <label for="paisper">Perú</label>
                <input type="radio" id="paisuru" name="categoria_mostrada" value="<?php echo $rl_URU; ?>" />
                <label for="paisuru">Uruguay</label>

            </div> -->

                <!-- <div class="dropdown rl_filtros_dropdown">
                    <label tabindex="0" class="btn m-1">Duración</label>

                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato1" type="radio" value="" checked name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato1"
                                    class="">Todas
                                    las
                                    duraciones
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato3" type="radio" value="<?php echo $rl_corto; ?>" name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato3"
                                    class="">Cortometrajes
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato2" type="radio" value="<?php echo $rl_largo; ?>" name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato2"
                                    class="">Largometrajes
                                </label>
                            </div>
                        </li>



                    </ul>
                </div> -->

                <button id="dropdownDividerButton2" data-dropdown-toggle="dropdownDivider2"
                    class="text-rl-morafuerte bg-rl-morablanco 
                    hover:bg-rl-morasuave hover:text-rl-morablanco 
                    focus:ring-4 focus:outline-none focus:ring-rl-morafuerte font-bold rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center " type="button">Duración <svg
                        class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDivider2" class="z-10 hidden  rl_dividerdrop_1">
                    <ul class="py-2 text-sm text-gray-700 z-50" aria-labelledby="dropdownDividerButton">
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato1" type="radio" value="" checked name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato1" class="">Todas
                                    las
                                    duraciones
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato3" type="radio" value="<?php echo $rl_corto; ?>" name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato3" class="">Cortometrajes
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="formato2" type="radio" value="<?php echo $rl_largo; ?>" name="formato"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="formato2" class="">Largometrajes
                                </label>
                            </div>
                        </li>
                    </ul>

                </div>
                <button id="dropdownDividerButton3" data-dropdown-toggle="dropdownDivider3"
                    class="text-rl-morafuerte bg-rl-morablanco 
                    hover:bg-rl-morasuave hover:text-rl-morablanco 
                    focus:ring-4 focus:outline-none focus:ring-rl-morafuerte font-bold rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center " type="button">Géneros <svg
                        class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDivider3" class="z-10 hidden rl_dividerdrop_1">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero0" type="radio" value="" checked name="genero"
                                    class="radio radio-primary dark:radio-accent">
                                <label for="genero0" class="">Todos
                                    los
                                    géneros
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero1" type="radio" value="<?php echo $rl_docum; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero1" class="">Documental
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero2" type="radio" value="<?php echo $rl_ficci; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero2" class="">Ficción
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero3" type="radio" value="<?php echo $rl_exper; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero3" class="">Experimental
                                </label>
                            </div>
                        </li>
                    </ul>

                </div>

                <!-- <div class="dropdown rl_filtros_dropdown">
                    <label tabindex="0" class="btn m-1 ">Género</label>

                    <ul tabindex="0" class="dropdown-content z-[1] menu">
                    <li class="">
                        <div class="flex items-center pl-3">
                            <input id="genero0" type="radio" value="" checked name="genero"
                                class="radio radio-primary dark:radio-accent">
                            <label for="genero0"
                                class="">Todos
                                los
                                géneros
                            </label>
                        </div>
                    </li>    
                    <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero1" type="radio" value="<?php echo $rl_docum; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero1" class="">Documental
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero2" type="radio" value="<?php echo $rl_ficci; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero2" class="">Ficción
                                </label>
                            </div>
                        </li>

                        <li class="">
                            <div class="flex items-center pl-3">
                                <input id="genero3" type="radio" value="<?php echo $rl_exper; ?>" name="genero"
                                    class="radio radio-primary ">
                                <label for="genero3" class="">Experimental
                                </label>
                            </div>
                        </li>
                    </ul>
                </div> -->

                <!-- <ul
                    class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <select class="text-rl-morafuerte text-2xl" name="genero"
                        class="select select-secondary w-full max-w-xs">
                        <option id="genero0" name="genero" selected>Todos los géneros</option>
                        <option id="genero1" name="genero" value="<?php echo $rl_docum; ?>">Documental</option>
                        <option id="genero2" name="genero" value="<?php echo $rl_ficci; ?>">Ficción</option>
                        <option id="genero3" name="genero" value="<?php echo $rl_exper; ?>">Experimental</option>


                    </select>



                </ul> -->

                <div><span class="mensaje">Mensaje</span></div>
            </div>
        </form>
    </div><!-- filtros-->
</section>



<div class="load-more-content-wrap container mx-auto">
    <div id="rlpaginador"></div>
    <div id="rl_maincategory" class="bg-sky-200 m-8 text-3xl text-retina-morado-700 p-2"> </div>

    <div id="totales"></div>

    <div id="load-more-content" class="cataloco">

    </div>
    <button id="carga-contenidos" data-max-pages="0" data-page="1" data-retina="La tina"
        class="load-more-btn my-4 d-flex flex-column mx-auto px-4 py-2 border-0 bg-red-400">
        Cargar más películas

    </button>
</div>



<div id="contenedor_peliculas_pais" class="bg-sky-700 mb-48 min-h-[400px] ">


</div>

<?php






get_footer();