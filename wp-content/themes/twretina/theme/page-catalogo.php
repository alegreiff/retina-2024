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

$contenido = $post->post_content;

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


print_r("<pre>");
print_r($categoria);
print_r("</pre>");

if ($categoria === 'catalogo') {
    $cat = 0;
} else if ($categoria === 'todoelmundo') {

    $cat = categoria_mundo();
} else {
    $cat = get_term_by('slug', $categoria, 'videos_categories')->term_id;
}

/* print_r("<pre>");
print_r($cat);
print_r("</pre>"); */

?>

<div class="rl_filtros">
    <form id="filter" class="filtro_main_catalogo">
        <input type="hidden" name="action" value="filtro_peliculas_retina">
        <input type="hidden" name="current_page" value=2>
        <!-- <input type="hidden" name="page" value="nextPage"> -->

        <!-- <input type="hidden" name="categoria_mostrada" value="<?php echo $cat; ?>"> -->

        <div class="controles-paises flex gap-4 justify-start items-start">


            <ul
                class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisall" type="radio" checked value="" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisall" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Todos
                            los
                            países
                        </label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisbol" type="radio" value="<?php echo $rl_BOL; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisbol" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Bolivia
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paiscol" type="radio" value="<?php echo $rl_COL; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paiscol" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Colombia
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisecu" type="radio" value="<?php echo $rl_ECU; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisecu" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Ecuador
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paismex" type="radio" value="<?php echo $rl_MEX; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paismex" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">México
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisper" type="radio" value="<?php echo $rl_PER; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisper" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Perú
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisuru" type="radio" value="<?php echo $rl_URU; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisuru" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Uruguay
                        </label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paiscub" type="radio" value="<?php echo $rl_CU; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paiscub" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Cuba
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisallworld" type="radio" value="<?php echo $rl_MUNDO; ?>" name="categoria_mostrada"
                            class="radio radio-primary dark:radio-accent">
                        <label for="paisallworld"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Disponibles en
                            todo el mundo
                        </label>
                    </div>
                </li>



            </ul>
            <ul
                class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="paisarchive" type="radio" value="<?php echo $rl_ARCHIVO; ?>"
                            name="categoria_mostrada" class="radio radio-primary dark:radio-accent">
                        <label for="paisarchive"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Archivo
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

            <ul
                class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="formato1" type="radio" value="" checked name="formato"
                            class="radio radio-primary dark:radio-accent">
                        <label for="formato1" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Todas
                            las
                            duraciones
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="formato3" type="radio" value="<?php echo $rl_corto; ?>" name="formato"
                            class="radio radio-primary dark:radio-accent">
                        <label for="formato3"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Cortometrajes
                        </label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="formato2" type="radio" value="<?php echo $rl_largo; ?>" name="formato"
                            class="radio radio-primary dark:radio-accent">
                        <label for="formato2"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Largometrajes
                        </label>
                    </div>
                </li>



            </ul>

            <!-- <div class="switch-field">
                <input type="radio" id="switch_3_left" name="formato" value="" checked />
                <label for="switch_3_left">Todas las duraciones</label>
                <input type="radio" id="switch_3_center" name="formato" value="<?php echo $rl_corto; ?>" />
                <label for="switch_3_center">Cortometrajes</label>
                <input type="radio" id="switch_3_right" name="formato" value="<?php echo $rl_largo; ?>" />
                <label for="switch_3_right">Largometrajes</label>
            </div> -->
            <ul
                class="w-48 text-sm  text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="genero0" type="radio" value="" checked name="genero"
                            class="radio radio-primary dark:radio-accent">
                        <label for="genero0" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Todos
                            los
                            géneros
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="genero1" type="radio" value="<?php echo $rl_docum; ?>" name="genero"
                            class="radio radio-primary dark:radio-accent">
                        <label for="genero1"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Documental
                        </label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="genero2" type="radio" value="<?php echo $rl_ficci; ?>" name="genero"
                            class="radio radio-primary dark:radio-accent">
                        <label for="genero2" class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Ficción
                        </label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="genero3" type="radio" value="<?php echo $rl_exper; ?>" name="genero"
                            class="radio radio-primary dark:radio-accent">
                        <label for="genero3"
                            class="w-full py-3 ml-2 text-sm  text-gray-900 dark:text-gray-300">Experimental
                        </label>
                    </div>
                </li>



            </ul>
            <!--  <div class="switch-field">
                <input type="radio" id="genero_left" name="genero" value="" checked />
                <label for="genero_left">Todos los géneros</label>
                <input type="radio" id="genero_center" name="genero" value="<?php echo $rl_docum; ?>" />
                <label for="genero_center">Documental</label>
                <input type="radio" id="genero_right" name="genero" value="<?php echo $rl_ficci; ?>" />
                <label for="genero_right">Ficción</label>

                <input type="radio" id="genero_right1" name="genero" value="<?php echo $rl_exper; ?>" />
                <label for="genero_right1">Experimental</label>
            </div> -->
            <div><span class="mensaje">Mensaje</span></div>
        </div>
    </form>
</div><!-- filtros-->



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