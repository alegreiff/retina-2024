<?php

//Función que trae las proximas películas que van a sallir.
function r2_salidas_proximas($numeropeliculas = 6) {
    $diaactual =  date('d');
    $mesactual = date('m');
    $yearactual = date('Y');
    $mesfuturo = str_pad(($mesactual + 5), 2, '0', STR_PAD_LEFT);

    $limitesuperior = $yearactual . $mesfuturo . '01';
    $limiteinferior = $yearactual . $mesactual . $diaactual;
    global $wpdb;
    $categoria_archivo = categoria_archivo();
    $sql_fechas = "
    select
    mcc_posts.ID, mcc_postmeta.meta_value as 'fecha'
    from mcc_posts, mcc_postmeta
    where mcc_posts.post_type = 'video'
    and mcc_posts.ID = mcc_postmeta.post_id
    and mcc_postmeta.meta_key = 'rl_fechasalida'
    and mcc_postmeta.meta_value != ''
    and mcc_postmeta.meta_value > " . $limiteinferior . "
    and mcc_postmeta.meta_value < " . $limitesuperior . "
    
    AND (NOT EXISTS
        (
        SELECT NULL FROM 
        `mcc_term_relationships` 
        WHERE `object_id` = mcc_posts.ID and `term_taxonomy_id` = " . $categoria_archivo . "
        ))

    order by meta_value ASC
    limit " . $numeropeliculas . "
    ";
    $results = $wpdb->get_results($sql_fechas);
    $rows = [];
    foreach ($results as $val) {
        $rows[] = [$val->ID, $val->fecha];
    }

    return $rows;
}
