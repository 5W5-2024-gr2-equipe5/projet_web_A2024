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
