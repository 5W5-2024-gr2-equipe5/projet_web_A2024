<?php
/* Template Name: Projets Page */
get_header(); 
?>

<div class="container-projet">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php 

        // Query custom post type 'project'
        $projects = new WP_Query(array(
          'post_type' => 'project',
          'posts_per_page' => -1,
        ));

        if ($projects->have_posts()) :
          while ($projects->have_posts()) : $projects->the_post();
            $team_name = get_field('team_name');
            $project_description = get_field('project_description');
            
            // Retrieve multiple image fields
            $gallery_images = [];
            for ($i = 1; $i <= 5; $i++) { // Assuming you have up to 5 images
              $image = get_field('project_image_' . $i);
              if ($image) {
                $gallery_images[] = $image['url'];
              }
            }
      ?>
          <div class="box">
            <span></span>
            <div class="content">
              <h1><?php the_title(); ?></h1>
              <h2><?php echo esc_html($team_name); ?></h2>
              <?php if (!empty($gallery_images)): ?>
                <img src="<?php echo esc_url($gallery_images[0]); ?>" alt="Project Image">
              <?php else: ?>
                <img src="https://via.placeholder.com/200" alt="Placeholder Image">
              <?php endif; ?>
              <a href="#" class="more-info" 
                 data-title="<?php the_title(); ?>" 
                 data-team="<?php echo esc_html($team_name); ?>" 
                 data-description="<?php echo esc_html($project_description); ?>" 
                 data-images="<?php echo esc_attr(json_encode($gallery_images)); ?>">En savoir plus</a>
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

<!-- Carte Modal pour montrer les projects de façon individuel -->
<div id="projectModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 id="modalTitle">Titre du Projet</h1>
    <h2 id="modalTeam">Nom de l'équipe / élèves</h2>
    <div id="carousel" class="carousel">
      <button class="prev">&lt;</button>
      <div class="carousel-images">
        <!-- Images will be injected here by JavaScript -->
      </div>
      <button class="next">&gt;</button>
    </div>
    <p id="modalDescription">Description du projet</p>
  </div>
</div>

<?php get_footer(); ?>

<!-- Inclure le JavaScript fichier pour que les cartes modal (PROJET Étudiants) fonctionne -->
<script src="<?php echo get_template_directory_uri(); ?>/js/projets.js"></script>