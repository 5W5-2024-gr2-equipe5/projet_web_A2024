<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projet</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/normalize.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  </head>

<div class="container-projet">
      <div class="box">
        <span></span>
        <div class="content">
          <h1>Titre du Projet</h1>
          <h2>Nom de l'équipe / élèves</h2>
          <img src="https://via.placeholder.com/200" alt="Placeholder image">
          <a href="#" class="more-info" 
          data-title="Titre du Projet" 
          data-team="Nom de l'équipe / élèves" 
          data-description="Description du projet" 
          data-image="https://via.placeholder.com/200">En savoir plus</a>
        </div>
      </div>
      <div class="box">
        <span></span>
        <div class="content">
          <h1>Titre du Projet</h1>
          <h2>Nom de l'équipe / élèves</h2>
          <img src="https://via.placeholder.com/200" alt="Placeholder image">
          <a href="#" class="more-info" 
          data-title="Titre du Projet" 
          data-team="Nom de l'équipe / élèves" 
          data-description="Description du projet" 
          data-image="https://via.placeholder.com/200">En savoir plus</a>
        </div>
      </div>
      <div class="box">
        <span></span>
        <div class="content">
          <h1>Titre du Projet</h1>
          <h2>Nom de l'équipe / élèves</h2>
          <img src="https://via.placeholder.com/200" alt="Placeholder image">
          <a href="#" class="more-info" 
          data-title="Titre du Projet" 
          data-team="Nom de l'équipe / élèves" 
          data-description="Description du projet" 
          data-image="https://via.placeholder.com/200">En savoir plus</a>        
        </div>
      </div>
      <div class="box">
        <span></span>
        <div class="content">
          <h1>Titre du Projet</h1>
          <h2>Nom de l'équipe / élèves</h2>
          <img src="https://via.placeholder.com/200" alt="Placeholder image">
          <a href="#" class="more-info" 
          data-title="Titre du Projet" 
          data-team="Nom de l'équipe / élèves" 
          data-description="Description du projet" 
          data-image="https://via.placeholder.com/200">En savoir plus</a>        
        </div>
      </div>
    </div>

<!-- structure modal(popup carte) -->
<div id="projectModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 id="modalTitle">Titre du Projet</h1>
    <h2 id="modalTeam">Nom de l'équipe / élèves</h2>
    <img id="modalImage" src="" alt="Project Image" style="width: 100%; height: auto;">
    <p id="modalDescription">Description du projet</p>
  </div>
</div>

<!-- JS Projets -->
<script src="./js/projets.js"></script>