    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <!-- POUR QUE GOOGLE MATERIALS FONCTIONNE !IMPORTANT -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <?php

  get_header(); // Inclut le header du thème
    ?>
<div id="professors-container" class="container">


  <?php

/* Template Name: Professeurs */



// Requête pour récupérer les articles de la catégorie "Professeurs"
$args = array(
    'category_name' => 'professeurs', // Assurez-vous que la catégorie est bien "professeurs"
    'post_type' => 'post',
    'posts_per_page' => -1 // Récupère tous les articles de la catégorie
);
$query = new WP_Query($args);
//si la requête correspond à des posts
if ($query->have_posts()) : ?>
        <!-- tant qu'il y à des post qui corresponde à la requête: on les crées avec les bonnes informations-->
        <?php while ($query->have_posts()) : $query->the_post(); 
        /*Champs personalisés*/

$lesCours = array();
// S'il y a des champs personalisés, on va les chercher et on les atribut à des variables
if( have_rows('cours') ):
  while ( have_rows('cours') ) : the_row();
      if(get_sub_field('cours1')) array_push($lesCours,get_sub_field('cours1'));
      if(get_sub_field('cours2')) array_push($lesCours,get_sub_field('cours2'));
      if(get_sub_field('cours3')) array_push($lesCours,get_sub_field('cours3'));
      if(get_sub_field('cours4')) array_push($lesCours,get_sub_field('cours4'));
  endwhile;
else :
  // no rows found
endif;
?>
            <!-- on met l'image du prof en background -->
            <div class="professeur"  style = 'background-image : url("<?= get_the_post_thumbnail_url(); ?>")' >
                <!-- on remplie la class content avec toutes les informations nessessaire à la création de la carte prof -->
                <div class="content" 
                     data-description="<?= strip_tags(get_the_content()); ?>" 
                     data-quote="<?php the_title(); ?>: <?php the_field("citation") ?>"
                     data-image="<?= get_the_post_thumbnail_url(); ?>" 
                     data-icons='[
                      <?php //on cherche dans tous les champs personnalisé pour compléter les informations et on sépare les requète par une vigule s'il y a un élémet suivant 
                        foreach($lesCours AS $cours): ?>
                      {"class":"<?= $cours ?>","url":"./liste-cours.php#conception-graphique"}<?php if( next( $lesCours )) echo ',';?>
                      <?php endforeach ?>
                      ]'>
                    <h2><?php the_title(); ?></h2>
                    <!-- <span>Prof</span> -->
                    <span>


                    </span>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            <?php else : ?>
              <p>Aucun professeur trouvé.</p>
<?php endif;

wp_reset_postdata();



?>


<!-- Popup-card pour les profs -->
<div id="popup-card" class="popup">
  <div class="popup-content">
    <span id="close-popup" class="close">&times;</span>
    <h2 id="popup-name"></h2>
    <p id="popup-description"></p>
    <div id="popup-icons-container">
      <?php 
      
      
      ?>
    </div>
    <img id="popup-image" src="" alt="Popup Image" />
    <blockquote id="popup-quote"></blockquote>
  </div>
</div>

<?php get_footer(); // Inclut le footer du thème?>

<!-- JS page prof -->
<script src="<?php echo get_template_directory_uri() . '/js/scriptprof.js' ;?>"> </script>
