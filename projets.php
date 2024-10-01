<?php get_header() ?>
    <h1>Projets étudiants</h1>
    
    <div class="cards-container">
      <div class="card" data-product="Arcade" data-description="<strong>PROJET JEUX</strong><br>Description...">
        <h1>Titre du Projet</h1>
        <h2>Nom de l'équipe / élève</h2>
        <img src="images/crazy_Dominic.JPG" alt="Jeux">
      </div>
      
      <div class="card" data-product="Web" data-description="<strong>PROJET WEB</strong><br>Description...">
        <h1>Titre du Projet</h1>
        <h2>Nom de l'équipe / élève</h2>
        <img src="images/Flirty_Manon.JPG" alt="Web">
      </div>
      
      <div class="card" data-product="Video" data-description="<strong>PROJET VIDÉO</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit.">        <h1>Titre du Projet</h1>
        <h2>Nom de l'équipe / élève</h2>
        <img src="images/Happy_Johanne.JPG" alt="Vidéo">
      </div>
    </div>
  
    <div id="modal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="modal-img">
      <div id="caption"></div>
    </div>


    <!-- <p>Text qui dit que cest les projets des élèves?</p>
    <h2>Arcade</h2>
    caroussel des projets -->
    <!-- <img src="" alt="fait par: Une Personne, session #, année, lien itch.io" />
    <h2>Web</h2>
    <img src="" alt="fait par: Une Personne, session #, année, lien" />
    <img src="" alt="" />
    <h2>Vidéo</h2>
    <h2>Conception graphique</h2> -->
    <script src="/js/projets.js"></script>
    <?php get_footer() ?>
