<?php

get_header();
global $wpdb;
$results = $wpdb->get_results(
    "
    SELECT p.ID, p.post_title, p.guid 

FROM  mcc_posts p

WHERE p.post_type='person' AND p.post_content != '' AND p.post_status = 'publish' LIMIT 5
    "

);

$salida = '';

$salida .= '
<table><tbody>';
foreach ($results as $persona) {
    $salida .= "<tr><td>" . get_permalink($persona->ID) . "</td></tr>";
}
$salida .= '</tbody></table>';


echo $salida;


?>


<?php
get_footer();
