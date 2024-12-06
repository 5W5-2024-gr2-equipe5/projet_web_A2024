<?php
/* Template Name: Projets Page */
get_header(); 
?>

<div class="projets">
  <h1><?php the_title(); ?></h1>
  <?php echo do_shortcode('[ej_category_dropdown]'); ?>
<div class="container-projet">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php 
        // ACF fields sont utilisés pour récupérer les informations des projets
        // !IMPORTANT POUR QUE CA MARCHE:
        // Les champs ACF doivent être nommés comme suit:
        // 'team_name' pour le nom de l'équipe
        // 'project_description' pour la description du projet
        // 'project_image_1' à 'project_image_5' pour les images du projet
        // 'project_video' pour l'URL de la vidéo du projet
      
        // Query custom post type 'project'
        $projects = new WP_Query(array(
          'post_type' => 'project',
          'posts_per_page' => -1,
        ));

        if ($projects->have_posts()) :
          while ($projects->have_posts()) : $projects->the_post();
            $team_name = get_field('team_name');
            $project_description = get_field('project_description');
            
            // Retrieve multiple image fields and video URL 
            // METTRE LES BONNES URL POUR VIDEO (MEDIA LIBRARY sur WordPress) 
            $gallery_items = [];
            for ($i = 1; $i <= 5; $i++) { // Assuming you have up to 5 images
              $image = get_field('project_image_' . $i);
              if ($image) {
                $gallery_items[] = ['type' => 'image', 'url' => $image['url']];
              }
            }

            // Retrieve video URL
            $video_url = get_field('project_video');
            if ($video_url) {
              $gallery_items[] = ['type' => 'video', 'url' => $video_url];
            }
      ?>

        <div class="project-item 
          <?php $categories = get_the_category();
            if (!empty($categories)) {
              foreach ($categories as $category) {
                echo ' ' . esc_attr($category->slug);
              }
            } ?>">
          <div class="box">
            <span></span>
            <div class="content">
              <h1><?php the_title(); ?></h1>
              <h2><?php echo esc_html($team_name); ?></h2>
              <?php if (!empty($gallery_items)): ?>
                <?php if ($gallery_items[0]['type'] == 'image'): ?>
                  <img src="<?php echo esc_url($gallery_items[0]['url']); ?>" alt="Project Image">
                <?php else: ?>
                  <video controls>
                    <source src="<?php echo esc_url($gallery_items[0]['url']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                <?php endif; ?>
              <?php else: ?>
                <img src="https://via.placeholder.com/200" alt="Placeholder Image">
              <?php endif; ?>
              <a href="#" class="more-info" 
                 data-title="<?php the_title(); ?>" 
                 data-team="<?php echo esc_html($team_name); ?>" 
                 data-description="<?php echo esc_html($project_description); ?>" 
                 data-items="<?php echo esc_attr(json_encode($gallery_items)); ?>">En savoir plus</a>
            </div>
          </div>
        </div> 

      <?php 
          endwhile; 
          wp_reset_postdata();
        else :
          error_log('No projects found');
        endif;
      ?>
  <?php endwhile; else : ?>
      <p>Pas de projet disponible.</p>
  <?php endif; ?>
</div>
</div>
<!-- Carte Modal pour montrer les projects de façon individuel -->
<div id="projectModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 id="modalTitle">Titre du Projet</h1>
    <h2 id="modalTeam">Nom de l'équipe / élèves</h2>
    <div id="carousel" class="carousel">
      <button class="prev">&lt;</button>
      <div class="carousel-images">
        <!-- IMAGES ET VIDEO DANS LE CAROUSEL ICI VIA JAVASCRIPT -->
      </div>
      <button class="next">&gt;</button>
    </div>
    <p id="modalDescription">Description du projet</p>
  </div>
</div>

<!-- Inclure le JavaScript fichier pour que les cartes modal (PROJET Étudiants) fonctionne -->
<script src="<?php echo get_template_directory_uri(); ?>/js/projets.js"></script>
<?php get_footer(); ?>