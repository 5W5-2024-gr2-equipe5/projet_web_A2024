<?php
/*
Plugin Name: Filtre
Description: Crée un filtre selon les catégories des projets étudiants dans WordPress.
Version: 1.0
Author: Emily
*/

// Enqueue les scripts et styles du plugin
function ej_enqueue_scripts() {
    // Générer des versions dynamiques pour le cache
    $version_css = filemtime(plugin_dir_path(__FILE__) . "style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/filtre.js");

    // Charger le CSS
    wp_enqueue_style(
        'filtre_css',
        plugin_dir_url(__FILE__) . "style.css",
        array(),
        $version_css
    );

    // Charger le JavaScript
    wp_enqueue_script(
        'filtre_js',
        plugin_dir_url(__FILE__) . "js/filtre.js",
        array('jquery'), // Dépend de jQuery
        $version_js,
        true // Charger dans le footer
    );
}
add_action('wp_enqueue_scripts', 'ej_enqueue_scripts');

function ej_generate_dropdown() {
    // Exclure la catégorie "projets" pour éviter qu'elle apparaisse dans le filtre
    $categories = get_categories(array(
        'taxonomy' => 'category',
        'exclude' => array(27, 28, 29, 30, 31, 32, 5, 6, 7),
        'orderby' => 'name',
        'order' => 'ASC',
    ));
  
    // Construire le menu déroulant
    $output = '<div class="dropdown">';
    $output .= '<button class="dropbtn">Filtrer</button>';
    $output .= '<div id="myDropdown" class="dropdown-content">';
    $output .= '<a href="#tous">Tous</a>'; // Option "Tous" par défaut
  
    foreach ($categories as $category) {
        $output .= '<a href="#' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</a>';
    }
  
    $output .= '</div>';
    $output .= '</div>';
  
    return $output;
  }
  

// Shortcode pour afficher le menu déroulant
add_shortcode('ej_category_dropdown', 'ej_generate_dropdown');
