<?php
get_header();
/* 
Template Name: liste-de-cours
*/
?>
<!-- <h1>Liste des cours</h1>
    <div class="navigation">
    </div>
    <div class="table-c">
      <table id="course-table">
        <thead>
        <tr>
          <th>
            <button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
            <h2>Session 1</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button>
        </th>
          <th>
            <button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
              <h2>Session 2</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button></th>
          <th><button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
            <h2>Session 3</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button></th>
          <th><button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
            <h2>Session 4</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button></th>
          <th><button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
            <h2>Session 5</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button></th>
          <th><button id="prev" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
            <h2>Session 6</h2><button id="next" class="nav-arrow" onclick="changeSession(1)">&#10095;</button></th>
        </tr>
      </thead>
      <tbody id="courseRows">
        <tr>
          <td id="creation-video">
            <button class="btn" onclick="toggleCollapse('1')">
              Création vidéo
            </button>
            <div id="1" class="collapse">
              <p>
                Ce cours initie l’étudiant au traitement des images en
                mouvement, au traitement du son ainsi qu'aux bases de la
                scénarisation linéaire. L’étudiant apprend à utiliser les
                périphériques associés au traitement du son et de la vidéo et à
                exploiter de façon créative les fonctions des logiciels de
                traitement vidéo et sonore. Les techniques de montage (structure
                narrative, affinage de coupe, correction de couleur, etc.) sont
                étudiées. L’étudiant apprend à représenter ses idées et ses
                concepts par le dessin et l’écrit, à l’aide de scénarimages, de
                synopsis et de scénarios. Les particularités de la fonction de
                travail liées au traitement de la vidéo, du son, ainsi qu'à la
                scénarisation sont présentées de même que les compétences
                techniques et comportementales associées.
              </p>
            </div>
          </td>
          <td id="effets-speciaux">
            <button class="btn" onclick="toggleCollapse('5')">
              Effets spéciaux et animation
            </button>
            <div id="5" class="collapse">
              <p>
                Ce cours initie l’étudiant au traitement des images en
                mouvement, au traitement du son ainsi qu'aux bases de la
                scénarisation linéaire. L’étudiant apprend à utiliser les
                périphériques associés au traitement du son et de la vidéo et à
                exploiter de façon créative les fonctions des logiciels de
                traitement vidéo et sonore. Les techniques de montage (structure
                narrative, affinage de coupe, correction de couleur, etc.) sont
                étudiées. L’étudiant apprend à représenter ses idées et ses
                concepts par le dessin et l’écrit, à l’aide de scénarimages, de
                synopsis et de scénarios. Les particularités de la fonction de
                travail liées au traitement de la vidéo, du son, ainsi qu'à la
                scénarisation sont présentées de même que les compétences
                techniques et comportementales associées.
              </p>
            </div>
          </td>
          <td id="imagerie-3d">
            <button class="btn" onclick="toggleCollapse('9')">
              Imagerie 3D
            </button>
            <div id="9" class="collapse">
              <p>
                Ce cours initie l’étudiant au traitement des images en
                mouvement, au traitement du son ainsi qu'aux bases de la
                scénarisation linéaire. L’étudiant apprend à utiliser les
                périphériques associés au traitement du son et de la vidéo et à
                exploiter de façon créative les fonctions des logiciels de
                traitement vidéo et sonore. Les techniques de montage (structure
                narrative, affinage de coupe, correction de couleur, etc.) sont
                étudiées. L’étudiant apprend à représenter ses idées et ses
                concepts par le dessin et l’écrit, à l’aide de scénarimages, de
                synopsis et de scénarios. Les particularités de la fonction de
                travail liées au traitement de la vidéo, du son, ainsi qu'à la
                scénarisation sont présentées de même que les compétences
                techniques et comportementales associées.
              </p>
            </div>
          </td>
          <td id="gestion-projets">
            <button class="btn" onclick="toggleCollapse('13')">
              Gestion de projets multimédias
            </button>
            <div id="13" class="collapse">
              <p>
                Ce cours initie l’étudiant au traitement des images en
                mouvement, au traitement du son ainsi qu'aux bases de la
                scénarisation linéaire. L’étudiant apprend à utiliser les
                périphériques associés au traitement du son et de la vidéo et à
                exploiter de façon créative les fonctions des logiciels de
                traitement vidéo et sonore. Les techniques de montage (structure
                narrative, affinage de coupe, correction de couleur, etc.) sont
                étudiées. L’étudiant apprend à représenter ses idées et ses
                concepts par le dessin et l’écrit, à l’aide de scénarimages, de
                synopsis et de scénarios. Les particularités de la fonction de
                travail liées au traitement de la vidéo, du son, ainsi qu'à la
                scénarisation sont présentées de même que les compétences
                techniques et comportementales associées.
              </p>
            </div>
          </td>
          <td id="methodes-recherche">
            Méthodes de recherche et préparation au marché du travail
          </td>
          <td id="stage">Stage</td>
        </tr>
        <tr>
          <td id="conception-graphique">
            Conception graphique et imagerie matricielle
          </td>
          <td id="conception-vectorielle">
            Conception graphique et imagerie vectorielle
          </td>
          <td id="design-interactivite">Design d'interactivité</td>
          <td id="interfaces-web">
            Conception d'interfaces et développement web
          </td>
          <td id="communication-equipe">
            Communication et dynamique d'une équipe de travail
          </td>
          <td id="projet-fin-etudes">Projet de fin d'études</td>
        </tr>
        <tr>
          <td id="mise-en-page-web">Mise en page web</td>
          <td id="animation-interactivite-web">
            Animation et interactivité web
          </td>
          <td id="  ">Création de sites web dynamiques</td>
          <td id="creation-jeu-equipe">Création de jeu en équipe</td>
          <td id="projet-web-equipe">Projet web en équipe</td>
        </tr>
        <tr>
          <td id="animation-interactivite-jeu">
            Animation et interactivité en jeu
          </td>
          <td id="creation-jeu-2d">Création de jeu 2D</td>
          <td id="creation-jeu-3d">Création de jeu 3D</td>
          <td id="interfaces-web-reactives">
            Interfaces web réactives et animées
          </td>
          <td id="experimentation-jeu-creation">
            Expérimentation en jeu - volet création
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td id="animation-3d">Animation 3D</td>
          <td id="experimentation-jeu-programmation">
            Expérimentation en jeu - volet programmation
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td id="technologies-emergentes-creation">
            Technologies émergentes et avancées - volet création
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td id="technologies-emergentes-programmation">
            Technologies émergentes et avancées - volet programmation
          </td>
        </tr>
      </tbody>
      </table>
    </div>
    <!-- Section BANNER 3d -->
   <!--  <h1>Les Logiciels</h1>

    <div class="banner">
      <div class="slider" style="--quantity: 11">
        <div class="item" style="--position: 1">
          <figure>
            <img src="./picto/adobe_icon.png" alt="" />
            <figcaption>Adobe</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour la création et l'édition de contenu multimédia.
          </div>
        </div>
        <div class="item" style="--position: 2">
          <figure>
            <img src="./picto/arduino_icon.png" alt="" />
            <figcaption>Arduino</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour la création de projets électroniques interactifs.
          </div>
        </div>
        <div class="item" style="--position: 3">
          <figure>
            <img src="./picto/github_icon.png" alt="" />
            <figcaption>GitHub</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour le contrôle de version et la collaboration sur le code.
          </div>
        </div>
        <div class="item" style="--position: 4">
          <figure>
            <img src="./picto/html_css_js_v3.png" alt="" />
            <figcaption>HTML/CSS/JS</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour le développement web front-end.
          </div>
        </div>
        <div class="item" style="--position: 5">
          <figure>
            <img src="./picto/maya_icon.png" alt="" />
            <figcaption>Maya</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour la modélisation 3D et l'animation.
          </div>
        </div>
        <div class="item" style="--position: 6">
          <figure>
            <img src="./picto/react_icon.png" alt="" />
            <figcaption>React</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour le développement d'interfaces utilisateur.
          </div>
        </div>
        <div class="item" style="--position: 7">
          <figure>
            <img src="./picto/resolume_icon.png" alt="" />
            <figcaption>Resolume</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour les performances audiovisuelles en temps réel.
          </div>
        </div>
        <div class="item" style="--position: 8">
          <figure>
            <img src="./picto/touchdesigner_icon.png" alt="" />
            <figcaption>TouchDesigner</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour la création de contenu interactif et visuel.
          </div>
        </div>
        <div class="item" style="--position: 9">
          <figure>
            <img src="./picto/unity_icon.png" alt="" />
            <figcaption>Unity</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour le développement de jeux et d'applications 3D.
          </div>
        </div>
        <div class="item" style="--position: 10">
          <figure>
            <img src="./picto/vscode_icon.png" alt="" />
            <figcaption>VS Code</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour l'édition de code et le développement logiciel.
          </div>
        </div>
        <div class="item" style="--position: 11">
          <figure>
            <img src="./picto/wordpress_icon.png" alt="" />
            <figcaption>WordPress</figcaption>
          </figure>
          <div class="popup-message">
            Utilisé pour la création et la gestion de sites web.
          </div>
        </div>
      </div>
    </div> -->

    <div class="content">
  <h1>Liste des cours</h1>

  <div class="navigation">
  </div>

  <div class="table-c">
    <table id="course-table">
      <thead>
        <tr>
          <?php 
          for ($i = 1; $i <= 6; $i++) : ?>
            <th>
              <button id="prev-<?php echo $i; ?>" class="nav-arrow" onclick="changeSession(-1)">&#10094;</button>
              <h2>Session <?php echo $i; ?></h2>
              <button id="next-<?php echo $i; ?>" class="nav-arrow" onclick="changeSession(1)">&#10095;</button>
            </th>
          <?php endfor; ?>
        </tr>
      </thead>
      <tbody id="courseRows">
        <tr>
          <?php
          $courses = new WP_Query([
            'post_type' => 'course', // Replace 'course' with your custom post type or category
            'posts_per_page' => -1, 
          ]);

          if ($courses->have_posts()) :
            while ($courses->have_posts()) : $courses->the_post(); ?>
              <td id="<?php echo sanitize_title(get_the_title()); ?>">
                <button class="btn" onclick="toggleCollapse('<?php the_ID(); ?>')">
                  <?php the_title(); ?>
                </button>
                <div id="<?php the_ID(); ?>" class="collapse">
                  <p><?php the_content(); ?></p>
                </div>
              </td>
          <?php
            endwhile;
            wp_reset_postdata(); // Reset the global post data
          else :
            echo '<td>' . __('aucun cours', 'text-domain') . '</td>';
          endif;
          ?>
        </tr>
      </tbody>
    </table>
  </div>

  <h1><?php _e('Les Logiciels', 'text-domain'); ?></h1>

  <div class="banner">
    <div class="slider" style="--quantity: 11">
      <?php
      // Example array for software items
      $software_items = [
        ['src' => 'adobe_icon.png', 'caption' => 'Adobe', 'description' => 'Utilisé pour la création et l\'édition de contenu multimédia.'],
        ['src' => 'arduino_icon.png', 'caption' => 'Arduino', 'description' => 'Utilisé pour la création de projets électroniques interactifs.'],
        ['src' => 'github_icon.png', 'caption' => 'GitHub', 'description' => 'Utilisé pour le contrôle de version et la collaboration sur le code.'],
        ['src' => 'html_css_js_v3_icon.png', 'caption' => 'HTML/CSS/JS', 'description' => 'Utilisé pour le développement web front-end.'],
        ['src' => 'maya_icon.png', 'caption' => 'Maya', 'description' => 'Utilisé pour la modélisation 3D et l\'animation.'],
        ['src' => 'react_icon.png', 
        'caption' => 'React', 
        'description' => 'Utilisé pour le développement d\'interfaces utilisateur.'],
        [
          'src' => 'resolume_icon.png',
          'caption' => 'Resolume',
          'description' => 'Utilisé pour les performances audiovisuelles en temps réel.'],
      [
          'src' => 'touchdesigner_icon.png',
          'caption' => 'TouchDesigner',
          'description' => 'Utilisé pour la création de contenu interactif et visuel.'
      ],
      [
          'src' => 'unity_icon.png',
          'caption' => 'Unity',
          'description' => 'Utilisé pour le développement de jeux et d\'applications 3D.'
      ],
      [
          'src' => 'vscode_icon.png',
          'caption' => 'VS Code',
          'description' => 'Utilisé pour l\'édition de code et le développement logiciel.'
      ],
      [
          'src' => 'wordpress_icon.png',
          'caption' => 'WordPress',
          'description' => 'Utilisé pour la création et la gestion de sites web.'
      ]
      ];

      foreach ($software_items as $index => $item) : ?>
        <div class="item" style="--position: <?php echo $index + 1; ?>">
          <figure>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/picto/' . $item['src']); ?>" alt="" />
            <figcaption><?php echo esc_html($item['caption']); ?></figcaption>
          </figure>
          <div class="popup-message">
            <?php echo esc_html($item['description']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
 <?php   wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/liste-cours.js', array('jquery'), null, true);

 get_footer(); ?>