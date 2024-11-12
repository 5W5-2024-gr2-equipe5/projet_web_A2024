<?php
/* Template Name: Projets Page */
get_header(); 
?>

<div class="container-projet">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php 

        // Query custom post type 'project'
        $projects = new WP_Query(array(
          
          'post_type' => 'post',
          'posts_per_page' => -1,
        ));

        // Debuggage: Check if projects are found
        if ($projects->have_posts()) :
          error_log('Projects found: ' . $projects->found_posts);
          while ($projects->have_posts()) : $projects->the_post();
            // Retrieve ACF fields (importance de mettre le nom du champ exactement comme dans ACF)
            $team_name = get_field('team_name');
            $project_description = get_field('project_description');
            $project_image = get_field('project_image');

            // Debuggage: Check if ACF fields are found
            error_log('Project Image: ' . print_r($project_image, true));

            $project_image_url = !empty($project_image) && is_array($project_image) && isset($project_image['url']) ? $project_image['url'] : '';

            // Debuggage: Check if ACF fields are retrieved
            error_log('Project Title: ' . get_the_title());
            error_log('Team Name: ' . $team_name);
            error_log('Project Description: ' . $project_description);
            error_log('Project Image URL: ' . $project_image_url);
      ?>
          <div class="box">
            <span></span>
            <div class="content">
              <h1><?php the_title(); ?></h1>
              <h2><?php echo esc_html($team_name); ?></h2>
              <?php if ($project_image_url): ?>
                <img src="<?php echo esc_url($project_image_url); ?>" alt="Project Image">
              <?php else: ?>
                <img src="https://via.placeholder.com/200" alt="Placeholder Image">
              <?php endif; ?>
              <a href="#" class="more-info" 
                 data-title="<?php the_title(); ?>" 
                 data-team="<?php echo esc_html($team_name); ?>" 
                 data-description="<?php echo esc_html($project_description); ?>" 
                 data-image="<?php echo esc_url($project_image_url); ?>">En savoir plus</a>
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
    <img id="modalImage" src="" alt="Project Image" style="width: 100%; height: auto;">
    <p id="modalDescription">Description du projet</p>
  </div>
</div>

<?php get_footer(); ?>

<!-- Inclure le JavaScript fichier pour que les cartes modal (PROJET Étudiants) fonctionne -->
<script src="<?php echo get_template_directory_uri(); ?>/js/projets.js"></script>