<!-- Code PHP vie etudiante V1 -->

<?php
/*
Template Name: Page_Vie_Etudiante
*/

get_header(); // Include the WordPress header
?>
  <div class="container-vie-etudiante">
    <div id="fond-peinture"></div>
    <div class="fond-neon"></div>
    <div class="fond-neon"></div>
    <h1>Vie étudiante</h1>

    <div class="div-vie-etudiante" id="comite">
      <h2>Comité étudiant</h2>
      <img src="<?php echo get_template_directory_uri(); ?>/images/VieEtudiante/cetim.png" alt="CÉTIM">
      <p>
        Le comité étudiant du TIM est une organisation étudiante à but non lucratif 
        qui vise à rendre votre passage au TIM mémorable. Le comité est composé d'étudiants 
        de toutes les cohortes. Il organise également des activités dans les locaux du TIM 
        durant les pauses communes ainsi qu’après les cours. De plus, le comité contribue 
        bénévolement à l’organisation de plusieurs activités du cégep.
      </p>
    </div>

    <div class="div-vie-etudiante" id="event">
      <h2>Évènements</h2>
      <div class="conteneur-event">
        <h3>Au collège</h3>
        <p>
          À Maisonneuve, nous sommes comme une grande famille et nous avons à cœur le bonheur de nos étudiants. 
          Dans cette optique, le cégep offre plusieurs activités durant la session, incluant 
          la fête de la rentrée, le dîner des programmes (qui vise à favoriser la socialisation entre étudiants), 
          la fête d’halloween et plusieurs autres surprises que vous découvrirez le mardi et jeudi midi durant vos pauses.
        </p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/Photo_arcade_vie_etudiante.jpg" alt="Arcade jeux en équipe">
      </div>

      <div class="conteneur-event">
        <h3 class="espace-haut">Au TIM</h3>
        <p>
          Grâce à l’implication de notre comité et l’aide des incroyables professeurs du TIM, nous avons la chance d’avoir 
          énormément d'activités tout au long de notre parcours. Le BienvenueTIM, les nombreuses Soirées gaming, 
          les dîners cinéma ou Jackbox, les jeux de société, quelques Game jams, des concours de design et bien d'autres.
        </p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/VieEtudiante/activite_Jackbox.jpg" alt="*Insérer caroussel ici*">
      </div>
    </div>

    <div class="div-vie-etudiante" id="bourses">
      <h2>Bourses</h2>
      <h3>Bourse Perspective</h3>
      <p>
        En rejoignant le TIM, vous pourrez également obtenir la bourse Perspective Québec, qui vise à attirer 
        les futurs étudiants vers les professions à forte demande de main-d'œuvre! Vous pouvez recevoir 1500$ 
        par session jusqu'à un maximum de 9000$, soit l’équivalent de vos 6 sessions obligatoires au cégep 
        pour compléter la technique. Pour y être admissible, rien de plus simple!
        Il vous suffit de:
        
        <ul>
          <li>Être résident au Québec et avoir la citoyenneté canadienne</li>
          <li>Réussir tous vos cours d’une session commencée et terminée à temps plein; 
              ou réussir tous vos cours d’une session commencée et terminée à temps partiel 
              tout en ayant le statut de personne réputée aux études à temps plein</li>
          <li>Ne pas dépasser le nombre de 6 sessions admissibles</li>
        </ul>
        
        La bourse Perspective Québec peut être demandée après chaque session et est remise à toute personne 
        respectant les conditions et en faisant la réclamation par le site officiel du Québec. De plus, 
        notez que cette bourse pourra vous suivre à l'université si vous décidez de continuer vos études. 
        (Par exemple, grâce au programme Dec-Bac ou au passerelle!)
      </p>

      <h3>Aide financière aux études (AFE)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quis
        repellendus voluptatem dolorum hic eligendi amet eum facilis commodi eos
        explicabo, alias dolores obcaecati. Dolorem natus iusto beatae
        repellendus asperiores!
      </p>
      <img src="<?php echo get_template_directory_uri(); ?>/images/VieEtudiante/etudiants_groupe_2.jpg" alt="Heureuse Surprise!">
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/js/marge-neon.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/fond-peinture.js"></script>
  </div>
<?php
get_footer(); // Include WordPress footer
?>