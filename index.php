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
    <!--
        Unlink les stylesheets randoms
    <link rel="stylesheet" href=" <?php /*echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; */?> ">

-->
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="index.htm">
          <img src="./picto/tim_icon.png" alt="LOGOTIM" />
        </a>
      </div>
      <!-- MENU -->
      <div>
        <div class="menu">
          <ul>
            <li>
              <a href="futur.htm" class="test">Perspectives d'avenir</a>
              <ul class="sous-menu">
                <li><a href="futur.htmstages">Stages</a></li>
                <li><a href="futur.htm#emplois">Emplois futurs</a></li>
                <li><a href="futur.htm#sup">Études supérieures</a></li>
              </ul>
            </li>
            <li>
              <a href="projets.htm" class="test">Projets étudiants</a>
              <ul class="sous-menu">
                <li><a href="#">Arcade</a></li>
                <li><a href="#">Web</a></li>
                <li><a href="#">Vidéo</a></li>
                <li><a href="#">Conception graphique</a></li>
              </ul>
            </li>
            <li>
              <a href="liste-cours.htm" class="test">Liste des cours</a>
            </li>
            <li>
              <a href="professeurs.htm" class="test">Professeurs</a>
            </li>
            <li>
              <a href="vie-etudiante.htm" class="test">Vie étudiante</a>
              <ul class="sous-menu">
                <li><a href="vie-etudiante.htm#comite">Comité</a></li>
                <li><a href="vie-etudiante.htm#event">Évènements</a></li>
                <li><a href="vie-etudiante.htm#bourses">Bourse</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <a href="#" id="openBtn" class="burger">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </header>
    <!-- Section Video -->
    <div class="video">
      <video autoplay loop muted>
        <source src="video/WORK2.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>

    <footer class="footer">
      <div class="footer-content">
        <!-- Map Maisonneuve -->
        <div class="map-info">
          <h2>Collège de Maisonneuve</h2>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.9620990590347!2d-73.55611928684945!3d45.55108797095504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91bf575ab9357%3A0xa64ecd7388cc64f0!2s3800%20R.%20Sherbrooke%20E%2C%20Montr%C3%A9al%2C%20QC%20H1X%202A2!5e0!3m2!1sfr!2sca!4v1725993135753!5m2!1sfr!2sca"
            width="400"
            height="200"
            style="border: 1"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
          <p>(514) 254-7131</p>
        </div>

        <!-- Inscription & Logo -->
        <div class="inscription-logo">
          <p>Programme offert à Maisonneuve</p>
          <a href="https://www.cmaisonneuve.qc.ca/programme/integration-multimedia/">
            <img class="logoM9" src="./images/LOGOM9.png" alt="logo de collège Maisonneuve" />
          </a>
                  
          <p>S'inscrire avec le SRAM</p>
          <a href="https://admission.sram.qc.ca/">
            <img class="sram" src="./picto/sram_icon.png" alt="logo de SRAM" />
          </a>
        </div>

        <!-- Section Sociaux -->
        <div class="sociaux">
          <h2>Sociaux</h2>
          <p class="social-icons">
            <a href="https://www.instagram.com/maisonneuvetim/" target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
            <a href="https://www.facebook.com" target="_blank"
              ><i class="fab fa-facebook"></i
            ></a>
            <a href="https://www.youtube.com" target="_blank"
              ><i class="fab fa-youtube"></i
            ></a>
          </p>
        </div>
      </div>
    </footer>
    <!-- JS POUR MENU -->
    <script src="/js/menu.js"></script>
  </body>
</html>