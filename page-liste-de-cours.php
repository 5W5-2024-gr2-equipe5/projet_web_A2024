<?php
get_header();
/* 
Template Name: liste-de-cours
*/
?>
    <div class="content">
  <h1>Liste des cours</h1>

  <div class="navigation">
  </div>

  <div class="table-c">
    <table id="course-table">
      <thead>
        <tr>
          <?php 
          for ($i = 1; $i <= 6; $i++) : ?>
            <th>
              <button id="prev-<?php echo $i; ?>" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
              <h2>Session <?php echo $i; ?></h2>
              <button id="next-<?php echo $i; ?>" class="nav-arrow" onclick="changeSession(1)">&#10095;</button>
            </th>
          <?php endfor; ?>
        </tr>
      </thead>
      <tbody id="courseRows">
        <tr>
          <?php
          $session = 0;
          $courses = new WP_Query([
            'post_type' => 'post', 
            'category_name' => 'liste-de-cours', 
            'category_name' => $session, //pour chaque cours alors pt pas la
          ]);
          

          if ($courses->have_posts()) :
            while ($courses->have_posts()) : $courses->the_post();
            // acf fields
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
            wp_reset_postdata(); // Reset the global post data
          else :
            echo '<td>' . __('aucun cours', 'text-domain') . '</td>';
          endif;
          ?>
        </tr>
      </tbody>
    </table>
  </div>

  <h1><?php _e('Les Logiciels', 'text-domain'); ?></h1>

<!-- POUR TESTER LE SHORTCUT -->
<!-- Icon Banner Slider -->
 <!-- LE PLUGIN EST IMPLEMENTER SUR LA PAGE LISTE DE COURS -->
<div class="icon-banner-slider">
  <?php echo do_shortcode('[icon_banner_slider]'); ?>
</div>
<!--  -->
 <?php   
 wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/liste-cours.js', array('jquery'), null, true);

 get_footer(); ?>