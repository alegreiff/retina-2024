<?php
$video = retlat_campo_pelicula('rl_videoidms');
$familia = $args['familia'];
$trailer = get_field('trailer');
if ($trailer) {
    $youtube = peliculaTrailer($trailer);
} else {
    $youtube = null;
}

?>

<div class="px-1 md:px-8 mx-auto mt-8 color7030">

    <div class="mb-0  justify-between">
        <ul class="flex flex-wrap -mb-px text-sm  text-center" id="myTab" data-tabs-toggle="#tab-content" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="bg-purple-500 inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Ver película</button>
            </li>
            <?php
            if ($youtube) {
            ?>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="dashboard-tab" data-tabs-target="dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Ver tráiler</button>
                </li>

            <?php
            }
            ?>

        </ul>

    </div>
    <div class="aspect-video">
        <div id="tab-content">
            <div class="" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div>
                    <?php
                    echo peliculaIframeMultistream($video, $familia);
                    ?>
                </div>
            </div>
            <?php
            if ($youtube) {
            ?>
                <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                    <div>
                        <?php echo peliculaTrailer(getYouTubeId($trailer)); ?>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>