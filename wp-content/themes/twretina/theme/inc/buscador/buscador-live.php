<?php
/*
 ==================
 Ajax Search
======================	 
*/
// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch() {
?>
    <script type="text/javascript">
        function mukto_search_fetch() {

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'data_fetch',
                    keyword: jQuery('#keyword').val()
                },
                success: function(data) {
                    jQuery('#datafetch').html(data);
                    console.log(data)
                }
            });

        }
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch() {

    $query = new WP_Query([
        'post_type' => 'videos',
        'post_per_page' => 5,
    ]);

    print_r("<pre>");
    print_r($query);
    print_r("</pre>");
}
