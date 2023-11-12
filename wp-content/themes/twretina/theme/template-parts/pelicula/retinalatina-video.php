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
<div class="max-w-[90%] mx-auto my-8">

    <div class="mb-0 border-b border-gray-200 bg-lime-400 flex justify-between">
        <ul class="flex flex-wrap -mb-px text-sm  text-center" id="myTab" data-tabs-toggle="#tab-content" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="bg-purple-500 inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Película</button>
            </li>
            <?php
            if ($youtube) {
            ?>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="dashboard-tab" data-tabs-target="dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Tráiler</button>
                </li>

            <?php
            }
            ?>

        </ul>
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
        </svg>
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