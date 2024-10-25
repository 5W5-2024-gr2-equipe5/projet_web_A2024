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
      <div>
        <div class="menu">
          <ul>
            <li>
              <a href="futur.php" class="test">Perspectives d'avenir</a>
              <ul class="sous-menu">
                <li><a href="futur.php#stages">Stages</a></li>
                <li><a href="futur.php#emplois">Emplois futurs</a></li>
                <li><a href="futur.php#sup">Études supérieures</a></li>
              </ul>
            </li>
            <li>
              <a href="projets.php" class="test">Projets étudiants</a>
              <ul class="sous-menu">
                <li><a href="#">Arcade</a></li>
                <li><a href="#">Web</a></li>
                <li><a href="#">Vidéo</a></li>
                <li><a href="#">Conception graphique</a></li>
              </ul>
            </li>
            <li>
              <a href="liste-cours.php" class="test">Liste des cours</a>
            </li>
            <li>
              <a href="professeurs.php" class="test">Professeurs</a>
            </li>
            <li>
              <a href="vie-etudiante.php" class="test">Vie étudiante</a>
              <ul class="sous-menu">
                <li><a href="vie-etudiante.php#comite">Comité</a></li>
                <li><a href="vie-etudiante.php#event">Évènements</a></li>
                <li><a href="vie-etudiante.php#bourses">Bourse</a></li>
              </ul>
            </li>
          </ul>
        </div>
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