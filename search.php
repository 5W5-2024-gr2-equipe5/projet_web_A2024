<?php

/* 
    Template Name: Custom Search Results 
*/

get_header(); ?>

<div class="search-results-div">
    <div id="fond-peinture"></div>
    <div class="flex-search">
        <div class="search-results-container">
            <div class="page-header">
                <h1 class="page-title">
                    <?php printf(__('Résultat de recherche pour : %s ', 'textdomain'), '<span class="espace-gauche">' . get_search_query() . '</span>'); ?>
                </h1>
            </div>
            <div class="search-results-content">
                <?php if (have_posts()) : ?>
                    <ul class="search-results-list">
                        <?php while (have_posts()) : the_post(); ?>
                        <li class="search-result-item">
                            <h2 class="search-result-title">
                                <?php the_title(); // Display the post title ?>
                            </h2>
                            <div class="search-result-content">
                                <?php 
                                // Limit content to 40 characters
                                $content = get_the_content(); 
                                echo esc_html(mb_substr(strip_tags($content), 0, 40)) . '...'; 
                                ?>
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
        
        <div class="retour">
            <h3 class="marge-retour">Revenir à l'accueil</h3>

            <div class="bouton-retour" id="retour-search">
                <a href="https://gftnth00.mywhc.ca/tim30/" class="custom-logo-link" rel="home"><img width="150" height="75" src="https://gftnth00.mywhc.ca/tim30/wp-content/uploads/2024/10/tim_icon.png" class="custom-logo" alt="TIM" decoding="async"></a>
            </div>
        </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/fond-peinture.js"></script>
</div>

<?php get_footer(); ?>