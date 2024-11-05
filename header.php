<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIM maisonneuve</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <?php wp_head(); ?>
  </head>

  <body>
    <header>
      <div class="logo">
        <a href="index.php">
          <img src="./picto/tim_icon.png" alt="LOGOTIM" />
        </a>
      </div>
      <!-- MENU -->
        <!-- Burger Icon -->
        <a href="#" id="openBtn" class="burger">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <?php echo
      wp_nav_menu(array(
        "menu" => "principal",
        "container" => "nav"
      ));
      get_search_form()
      ?>
    </header>
    <script src="/js/menu.js"></script>