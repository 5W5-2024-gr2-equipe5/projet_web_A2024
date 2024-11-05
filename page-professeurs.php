<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Professeurs</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
  </head>

<div id="professors-container"></div>

<div class="container">
  
  <?php

/* Template Name: Professeurs */
//get_header(); // Inclut le header du thème

// Requête pour récupérer les articles de la catégorie "Professeurs"
$args = array(
    'category_name' => 'professeurs', // Assurez-vous que la catégorie est bien "professeurs"
    'post_type' => 'post',
    'posts_per_page' => -1 // Récupère tous les articles de la catégorie
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="professeur"  style = 'background-image : url("<?= get_the_post_thumbnail_url(); ?>")' >
                <div class="content" 
                     data-description="<?php the_content(); ?>" 
                     data-quote="Quote for <?php the_title(); ?>"
                     data-image="<?= get_the_post_thumbnail_url(); ?>" 
                     data-icons='[{"class":"brush","url":"./liste-cours.htm#conception-graphique"},
                     {"class":"palette","url":"./liste-cours.htm#conception-vectorielle"}]'>
                    <h2><?php the_title(); ?></h2>
                    <span>Prof</span>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            <?php else : ?>
              <p>Aucun professeur trouvé.</p>
<?php endif;

wp_reset_postdata();


//get_footer(); // Inclut le footer du thème
?>

<!-- JS page prof -->
<script src="<?php echo get_template_directory_uri() . '/js/scriptprof.js' ;?>"> </script>