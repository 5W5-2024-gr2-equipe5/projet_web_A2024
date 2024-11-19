<?php
// Add theme support for menus, custom logos, and post thumbnails
add_theme_support('menus');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// Modify the main WordPress query on the home page
function _5w5_requete($query) {
    if ($query->is_home() && $query->is_main_query() && !is_admin()) {
        $query->set('category_name', 'populaire');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', '_5w5_requete');

// Enqueue les styles et les scripts
function custom_theme_scripts()
 {
    // Enqueue FontAwesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');

    // Enqueue le style du thème
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
    
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

// Enqueue les styles et les scripts pour les projets
function enqueue_project_styles_scripts() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('projets-js', get_template_directory_uri() . '/js/projets.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_project_styles_scripts');




// Script de Performance pour la video
function enqueue_video_scripts() {
    wp_enqueue_script('video-js', 'https://vjs.zencdn.net/7.11.4/video.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_video_scripts');



//Section dans Wordpress ou on peut ajouter des images et des liens
function mytheme_customize_register($wp_customize) {
    // Section Inscription / Programme Offert
  $wp_customize->add_section('inscription_section', array(
      'title' => __('Inscription Settings', 'mytheme'),
      'priority' => 30,
  ));

  // Section Maisonneuve URL and Logo
  $wp_customize->add_setting('inscription_url', array(
      'default' => 'https://www.cmaisonneuve.qc.ca/programme/integration-multimedia/',
      'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('inscription_url', array(
      'label' => __('Inscription Link URL', 'mytheme'),
      'section' => 'inscription_section',
      'type' => 'url',
  ));

  $wp_customize->add_setting('inscription_logo', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'inscription_logo', array(
      'label' => __('Inscription Logo Image', 'mytheme'),
      'section' => 'inscription_section',
      'settings' => 'inscription_logo',
  )));

  // SRAM URL and Logo
  $wp_customize->add_setting('sram_url', array(
      'default' => 'https://admission.sram.qc.ca/',
      'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('sram_url', array(
      'label' => __('SRAM Link URL', 'mytheme'),
      'section' => 'inscription_section',
      'type' => 'url',
  ));

  $wp_customize->add_setting('sram_logo', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sram_logo', array(
      'label' => __('SRAM Logo Image', 'mytheme'),
      'section' => 'inscription_section',
      'settings' => 'sram_logo',
  )));
}
add_action('customize_register', 'mytheme_customize_register');


//Script pour la barre de recherche

function search_by_title_or_category($query) {
    if (!is_admin() && $query->is_search && $query->is_main_query()) {
        $query->set('post_type', 'post'); // Limit search to posts
        $query->set('posts_per_page', 10); // Adjust the number of posts per page

        // Add custom logic for searching by title or category
        add_filter('posts_where', function($where) use ($query) {
            global $wpdb;
            $search_term = esc_sql($query->get('s'));

            if (!empty($search_term)) {
                $where .= " AND (
                    {$wpdb->posts}.post_title LIKE '%$search_term%'
                    OR EXISTS (
                        SELECT 1 FROM {$wpdb->term_relationships} AS tr
                        INNER JOIN {$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                        INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                        WHERE tt.taxonomy = 'category' 
                        AND tr.object_id = {$wpdb->posts}.ID 
                        AND t.name LIKE '%$search_term%'
                    )
                )";
            }

            return $where;
        });
    }
}
add_action('pre_get_posts', 'search_by_title_or_category');

// Searchbar utilise AJAX pour afficher les résultats trouvés en temps réel

function live_search_handler() {
    $query = sanitize_text_field($_GET['query'] ?? '');
    $args = [
        'post_type' => 'post',
        's' => $query,
        'posts_per_page' => 5,
    ];
    $search_query = new WP_Query($args);

    $results = [];
    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $results[] = [
                'title' => get_the_title(),
                'excerpt' => get_the_excerpt(),
            ];
        }
    }

    wp_send_json(['results' => $results]);
}
add_action('wp_ajax_live_search', 'live_search_handler');
add_action('wp_ajax_nopriv_live_search', 'live_search_handler');

// Ajouter custom post type Project (NE PAS TOUCHER IMPORTANT)
// NOTE POUR LES AUTRES MEMBRES DE L'EQUIPE: NE PAS TOUCHER CE CODE
// CE CODE EST NECESSAIRE POUR QUE LES PROJETS SOIENT AFFICHES SUR LA PAGE PROJETS ÉTUDIANTS
// PS : DOWNLOAD ACF PLUGIN pour WordPress (AVOIR LES MÊMES CHAMPS QUE MOI)
// TEAM_NAME (text), PROJECT_DESCRIPTION (text), PROJECT_IMAGE (image) PROJECT LINK (bonus si on le lien)*pas tester pour les liens
function register_project_post_type() {
    $labels = array(
        'name' => _x('Projects', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'text_domain'),
        // Other labels...
    );
    $args = array(
        'label' => __('Project', 'text_domain'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'taxonomies' => array('category'), // Add the 'category' taxonomy here
    );
    register_post_type('project', $args);
}
add_action('init', 'register_project_post_type', 0);

// Empeche la search-bar de chercher du vide
function enqueue_custom_scripts() {
    wp_enqueue_script('searchbar', get_template_directory_uri() . '/js/searchbar.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
