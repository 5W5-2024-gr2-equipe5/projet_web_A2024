<?php
/*
Template Name: Logiciel Page
*/

get_header(); ?>

<main id="main" class="site-main" role="main">
    <section id="carousel">
        <?php
        // Include the plugin using the shortcode
        echo do_shortcode('[icon_banner_slider]');
        ?>
    </section>
    
    <section id="content">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </section>
</main>

<?php get_footer(); ?>