<?php 
get_header();
/* Template Name: liste-de-cours */ 
?>
<!-- PLEASE DONT TOUCH -->
<div class="content">
 <h1><?php  the_title(); ?></h1>
 <div class="navigation"> 
    <!-- Navigation des sessions ici -->
  </div>
  <div class="table-c">
    <table id="course-table">
      <thead>
        <tr>
          <?php 
          // Affichage des en-têtes de sessions
          for ($i = 1; $i <= 6; $i++) : ?>
            <th class="session-header" data-session="<?php echo $i; ?>">
              <button class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
              <h2>Session <?php echo $i; ?></h2>
              <button class="nav-arrow" onclick="changeSession(1)">&#10095;</button>
            </th>
          <?php endfor; ?>
        </tr>
      </thead>
<tbody id="courseRows">
  <?php
  // Boucle pour chaque session
  for ($session = 1; $session <= 6; $session++) :
    // Requête pour les cours de la session actuelle
    $courses = new WP_Query([
      'post_type' => 'post',
      'tax_query' => [
        'relation' => 'AND',
        [
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'liste-de-cours', // Catégorie principale
        ],
        [
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $session, // Catégorie de la session
        ],
      ],
    ]);
  ?>
  <tr class="session-courses <?php echo $session === 1 ? 'active' : ''; ?>" data-session="<?php echo $session; ?>">
    <?php
    if ($courses->have_posts()) :
      while ($courses->have_posts()) : $courses->the_post();
        // Champs ACF pour chaque cours
        $duree = esc_html(get_field('duree'));
        $unites = esc_html(get_field('unites'));
        $ponderation = esc_html(get_field('ponderation'));
        $prealables = esc_html(get_field('prealables'));
    ?>
        <td id="<?php echo sanitize_title(get_the_title()); ?>">
          <button class="btn" onclick="toggleCollapse('<?php the_ID(); ?>')">
            <?php the_title(); ?>
          </button>
          <div id="<?php the_ID(); ?>" class="collapse">
            <p><?php the_content(); ?></p>
            <p>Durée: <?php echo $duree; ?></p>
            <p>Unités: <?php echo $unites; ?></p>
            <p>Pondération: <?php echo $ponderation; ?></p>
            <p>Préalable(s): <?php echo $prealables; ?></p>
          </div>
        </td>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<td>' . __('aucun cours', 'text-domain') . '</td>';
    endif;
    ?>
  </tr>
  <?php endfor; ?>
</tbody>
</table>
</div>
</div>

<?php 
wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/liste-cours.js', array('jquery'), null, true);
get_footer();
?>