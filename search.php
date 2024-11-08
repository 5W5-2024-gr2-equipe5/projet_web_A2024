<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIM maisonneuve</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <?php wp_head(); ?>
  </head>

<?php

/* 
                                    Template Name: Custom Search Results 
*/

get_header(); ?>

<div class="search-results-container">
    <div class="page-header">
        <h1 class="page-title">
            <?php printf(__('Résultat de recherche pour : %s ', 'textdomain'), '<span class="espace-gauche">' . get_search_query() . '</span>'); ?>
        </h1>
    </div><!-- .page-header -->

    <div class="search-results-content">
        <?php if (have_posts()) : ?>
            <ul class="search-results-list">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="search-result-item">
                        <h2 class="search-result-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="search-result-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="pagination">
                <?php
                // Add pagination if needed
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'textdomain'),
                    'next_text' => __('Next', 'textdomain'),
                ));
                ?>
            </div>
        <?php else : ?>
            <p class="no-results">
                <?php _e("Désolé, nous n'avons rien trouvé pour votre recherche, essayez un mot clé différent.", 'textdomain'); ?>
            </p>
        <?php endif; ?>
    </div><!-- .search-results-content -->
</div><!-- .search-results-container -->

<?php get_footer(); ?>