<?php get_header(); ?>

<section class="relative h-screen flex flex-col items-center justify-center text-center text-white py-0 px-3">
    <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <video class="min-w-full min-h-full absolute object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/vidi.mp4" type="video/mp4" autoplay muted loop></video>
    </div>
    <div class="video-content space-y-2 bg-transparent z-10">
        <button class="btn btn-wide">Retina Latina</button>
    </div>
</section>


<?php get_footer(); ?>