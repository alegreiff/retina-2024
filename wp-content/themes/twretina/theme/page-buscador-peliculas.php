<?php

/**
 * Template Name: Buscador 2023 - películas
 * Description: Plantilla de la nadedad
 * Plantilla Nada nadita

 * @package retina
 */


get_header();

global $wpdb;
$results = $wpdb->get_results(
    "
    SELECT post_title, ID, meta_dir.meta_value as dir
    
    FROM $wpdb->posts    LEFT JOIN $wpdb->term_relationships as t
    ON ID = t.object_id 
    LEFT JOIN $wpdb->postmeta as meta_dir
    ON meta_dir.post_id = ID
    
    WHERE post_type = 'video'
    AND post_title LIKE '%armad%'
    AND post_status = 'publish'
    AND meta_dir.meta_key = 'director'
    AND (t.term_taxonomy_id = 93 OR t.term_taxonomy_id = 92)
    LIMIT 6
    "
    /* "SELECT post_title, ID
    FROM $wpdb->posts
    LEFT JOIN $wpdb->term_relationships as t
    ON ID = t.object_id
    WHERE post_type = 'video'
    AND post_status = 'publish'
    AND t.term_taxonomy_id = 93
    LIMIT 6
    " */
);

foreach ($results as $peli) {
    echo "<h1> " . $peli->post_title  . " </h1>";
    $dires = unserialize($peli->dir);
    $dirs = get_field('director', $peli->ID);
    foreach ($dirs as $dir) {
        echo "<p> >>> " . get_the_title($dir->ID) . "</p>";
    }


    //echo "<p>" . unserialize($peli->dir) . "</p>";
}
/* print_r("<pre>");
print_r($results);
print_r("</pre>"); */



/* $query = new WP_Query([
    'post_type' => 'video',
    'post_per_page' => 5,
    'orderby' => 'DATE',
    'order' => 'ASC',
    's' => 'ange',
]);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
?>
<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
<hr />
<?php
    }
} */

/* print_r("<pre>");
print_r($query);
print_r("</pre>"); */
?>

<!-- <h1>El prototipo de buscador</h1>
<div class="search_bar">
    <form action="/" method="get" autocomplete="off">
        <input type="text" name="s" placeholder="Search Code..." id="keyword" class="input_search text-red-700" onkeyup="mukto_search_fetch()">
        <button>
            Search
        </button>
    </form>
    <div class="search_result" id="datafetch">
        <ul>
            <li>Please wait..</li>
        </ul>

    </div>
</div> -->

<?php

get_footer();
