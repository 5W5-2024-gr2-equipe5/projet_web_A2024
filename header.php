<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIM maisonneuve</title>
    <?php wp_head(); ?>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">

  </head>

  <body>
  <header>
  <div class="logo">
    <?php echo get_custom_logo(); ?>
  </div>
  <!-- BURGER FORMATTER AVEC ANIMATION -->
  <input id="chk_burger" type="checkbox">
  <label id="burger" for="chk_burger">
    <span></span>
    <span></span>
    <span></span>
  </label>
  <!-- Wordpress MENU pour que ca fonctionne avec nos styles -->
  <?php echo
  wp_nav_menu(array(
    "menu" => "principal",
    "container" => "nav",
    "container_class" => "menu-principal-container"
  ));
  // Le formulaire de recherche
  get_search_form();
  ?>
</header>
<!-- Avoir access au JS -->
<script src="<?php echo get_template_directory_uri() . '/js/menu.js'; ?>"></script>
</body>
</html>