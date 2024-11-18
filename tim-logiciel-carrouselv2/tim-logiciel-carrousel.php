<?php
/*
Plugin Name: TIM LOGICIELS CARROUSEL 3D USER INTERFACE
Description: Un carrousel d'icônes de logiciels utilisés dans le programme TIM qui affiche une image et une légende pour chaque logiciel.
ON peut les modifier dans le menu "Icon Banner Slider" dans l'admin de WordPress. Carrousel 3D avec GSAP. 
Les utilisateurs peuvent cliquer sur les icônes pour afficher une légende. Environnement 3D du carrousel
Version: 4.0
Author: Eric
*/

// Enregistre la page dans WordPress Admin
function icon_banner_slider_menu() {
    add_menu_page(
        'Icon Banner Slider Settings',
        'Icon Banner Slider',
        'manage_options',
        'icon-banner-slider-settings',
        'icon_banner_slider_settings_page',
        'dashicons-images-alt2'
    );
}
add_action('admin_menu', 'icon_banner_slider_menu');

// Setup la Page Content sur la page de Admin
function icon_banner_slider_settings_page() {
    ?>
    <div class="wrap">
        <h1>Icon Banner Slider Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('icon_banner_slider_options');
            do_settings_sections('icon-banner-slider-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Enregistrer les Settings et Fields
function icon_banner_slider_register_settings() {
    register_setting('icon_banner_slider_options', 'icon_banner_slider_images');
    
    add_settings_section(
        'icon_banner_slider_section',
        'Icon Settings',
        null,
        'icon-banner-slider-settings'
    );
    
    $items = [
        'Adobe', 'Arduino', 'GitHub', 'HTML/CSS/JS', 'Maya', 'React', 'Resolume', 'TouchDesigner', 'Unity', 'VS Code', 'WordPress'
    ];

    foreach ($items as $index => $label) {
        add_settings_field(
            "icon_banner_slider_image_$index",
            "$label Icon",
            'icon_banner_slider_image_field',
            'icon-banner-slider-settings',
            'icon_banner_slider_section',
            ['index' => $index, 'label' => $label]
        );
    }
}
add_action('admin_init', 'icon_banner_slider_register_settings');

// Field Callback pour uploader les Image des Logiciels dans le Carrousel
function icon_banner_slider_image_field($args) {
    $index = $args['index'];
    $label = $args['label'];
    $options = get_option('icon_banner_slider_images');
    $image_url = isset($options[$index]) ? esc_url($options[$index]) : '';

    ?>
    <div>
        <input type="text" id="icon_banner_slider_image_<?php echo $index; ?>" name="icon_banner_slider_images[<?php echo $index; ?>]" value="<?php echo $image_url; ?>" />
        <button class="button icon-banner-slider-upload" data-input-id="icon_banner_slider_image_<?php echo $index; ?>">Upload</button>
        <?php if ($image_url): ?>
            <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr($label); ?>" style="max-width: 100px; display: block; margin-top: 10px;">
        <?php endif; ?>
    </div>
    <?php
}

// Enqueue Media Library le Script pour la Page Settings
function icon_banner_slider_admin_scripts($hook) {
    if ($hook != 'toplevel_page_icon-banner-slider-settings') {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('icon-banner-slider-admin', plugin_dir_url(__FILE__) . 'admin.js', ['jquery'], null, true);
    wp_enqueue_style('icon-banner-slider-style', plugin_dir_url(__FILE__) . 'style.css');
}
add_action('admin_enqueue_scripts', 'icon_banner_slider_admin_scripts');

// Créer les shortcode pour montrer le Banner sur la page
function icon_banner_slider_shortcode() {
    ob_start();

    // Get the images
    $options = get_option('icon_banner_slider_images');
    $items = [
        ["caption" => "Adobe", "message" => "Utilisé pour la création et l'édition de contenu multimédia."],
        ["caption" => "Arduino", "message" => "Utilisé pour la création de projets électroniques interactifs."],
        ["caption" => "GitHub", "message" => "Utilisé pour le contrôle de version et la collaboration sur le code."],
        ["caption" => "HTML/CSS/JS", "message" => "Utilisé pour le développement web front-end."],
        ["caption" => "Maya", "message" => "Utilisé pour la modélisation 3D et l'animation."],
        ["caption" => "React", "message" => "Utilisé pour le développement d'interfaces utilisateur."],
        ["caption" => "Resolume", "message" => "Utilisé pour les performances audiovisuelles en temps réel."],
        ["caption" => "TouchDesigner", "message" => "Utilisé pour la création de contenu interactif et visuel."],
        ["caption" => "Unity", "message" => "Utilisé pour le développement de jeux et d'applications 3D."],
        ["caption" => "VS Code", "message" => "Utilisé pour l'édition de code et le développement logiciel."],
        ["caption" => "WordPress", "message" => "Utilisé pour la création et la gestion de sites web."]
    ];

    ?>
    <div class="banner">
        <div class="slider" style="--quantity: <?php echo count($items); ?>">
            <?php foreach ($items as $index => $item): ?>
                <div class="item" style="--position: <?php echo $index + 1; ?>">
                    <figure>
                        <img src="<?php echo esc_url($options[$index] ?? ''); ?>" alt="<?php echo esc_attr($item['caption']); ?>" />
                        <figcaption><?php echo esc_html($item['caption']); ?></figcaption>
                    </figure>
                    <div class="popup-message">
                        <?php echo esc_html($item['message']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="reset-button-container">
            <button>Reset</button>
        </div>
    </div>
    <?php

    return ob_get_clean();
}
add_shortcode('icon_banner_slider', 'icon_banner_slider_shortcode');

// Enqueue les scripts et styles pour le front-end
function icon_banner_slider_enqueue_scripts() {
    wp_enqueue_style('banner-carousel-style', plugin_dir_url(__FILE__) . 'styleBanner.css');
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/gsap.min.js', array(), null, true);
    wp_enqueue_script('banner-carousel-script', plugin_dir_url(__FILE__) . 'banner.js', array('jquery', 'gsap'), null, true);
}
add_action('wp_enqueue_scripts', 'icon_banner_slider_enqueue_scripts');
?>