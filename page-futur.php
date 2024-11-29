<?php 
/*
Template Name: Page_Futur
*/

get_header() ?>
<div class="container-futur">

  <div id="fond-peinture"></div>
  <div class="fond-neon"></div>
  <div class="fond-neon"></div>

  <h1>Perspectives d'avenir</h1>

  <div class="div-vie-etudiante" id="stages">
    <div class="div-perspective">
      <h2>Stages</h2>
      <div class="conteneur-event">
        <h3>ATE</h3>
          <p>
            Les stages Alternance Travail-Étude (ATE) sont une opportunité offerte aux étudiants du TIM. Ils vous permettent de réaliser des stages d'été dès votre première année. Vous développerez rapidement des compétences utiles aux employeurs, ce qui vous aidera à décrocher un stage lors de vos premières vacances. Ces stages sont non seulement rémunérés, mais également subventionnés par le gouvernement, vous offrant ainsi un avantage significatif par rapport à vos concurrents. D'une durée de 8 à 12 semaines, ces stages vous permettront de perfectionner vos compétences, de vivre des expériences uniques et d'acquérir une précieuse expérience qui facilitera grandement votre entrée dans le monde du travail.
          </p>
          <img src="images/Avenir/lumiere_Apprentissage.jpg" alt="image de stage">
      </div>
      <div class="conteneur-event">
        <h3>Stage de fin d'étude</h3>
        <p>
          À la fin de votre parcours, vous aurez la chance de vivre un stage de 2 mois en entreprise dans le domaine de votre choix : vidéo, animation, web ou jeu. Peu importe votre domaine d'intérêt, de nombreuses opportunités d'embauche s'offrent à vous ! De plus, si votre stage se déroule bien, l'entreprise peut vous proposer un poste, ce qui vous permettrait d'intégrer directement le marché du travail à la fin de vos études. Selon les dernières statistiques, 85 % des étudiants ayant terminé leur formation sont engagés ou poursuivent leurs études à l’université.
        </p>
        <div class="contenantVideo">
          <iframe class="video-futur" src="https://www.youtube.com/embed/eGQ5g3shB_0?si=XigY7089zO3T74MC" title="Stage 2023 YouTube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="div-vie-etudiante" id="emplois">
    <div class="div-perspective">
      <h2>Emplois</h2>
      <div class="conteneur-event reverse-row">
        <h3>Trouvez-vous un travail</h3>
        <p>
          À la fin de votre parcours, vous aurez acquis toutes les connaissances nécessaires pour entrer sur le marché du travail. Grâce à la diversité du programme, aussi bien créatif que technique, vous pouvez devenir une pièce maîtresse dans divers domaines. Si vous êtes davantage porté sur la créativité, des opportunités s’offrent à vous dans des secteurs tels que designer, infographiste ou animateur 2D/3D. Si la programmation vous intéresse, des postes comme concepteur et développeur de jeux, développeur de sites web, programmeur multimédia ou développeur d'applications mobiles s’ouvrent à vous. Si vous avez un intérêt pour plusieurs domaines, des postes comme chargé de projet ou intégrateur multimédia sont faits pour vous !
        </p>
        <img src="images/Avenir/sdf.jpg" alt="Nicolas Carrière en tenue de cinéma">
      </div>
    </div>
  </div>
  <div class="div-vie-etudiante" id="etude-sup">
    <div class="div-perspective">
      <div class="conteneur-event">
        <h2>Études supérieurs</h2>
        <p>
          Le programme vous offre également la possibilité de poursuivre vos études à l’université ! Plusieurs baccalauréats sont accessibles grâce aux passerelles DEC-BAC, comme celui en création de jeux vidéo à l'UQAT, en génie des technologies de l’information ou en génie logiciel à l’ÉTS, en médias interactifs à l’UQAM, ainsi que des programmes en création 3D pour le cinéma ou pour le jeu vidéo.
          En plus de ces options, la technique ouvre d'autres débouchés dans les domaines des arts visuels et de l’informatique !
        </p>
        <img src="images/Avenir/Finissants_Ahmed.jpeg" alt="image de finissant">
      </div>
    </div>
  </div>
  <script src="<?php echo get_template_directory_uri(); ?>/js/marge-neon.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/fond-peinture.js"></script>
</div>
    <?php get_footer() ?>
