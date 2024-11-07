<?php
// Footer.php content starts
?>

<footer class="footer">
  <div class="footer-content">
    <!-- Map Maisonneuve -->
    <div class="map-info">
      <h2>Collège de Maisonneuve</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.9620990590347!2d-73.55611928684945!3d45.55108797095504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91bf575ab9357%3A0xa64ecd7388cc64f0!2s3800%20R.%20Sherbrooke%20E%2C%20Montr%C3%A9al%2C%20QC%20H1X%202A2!5e0!3m2!1sfr!2sca!4v1725993135753!5m2!1sfr!2sca"
        width="400"
        height="200"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
      <p>(514) 254-7131</p>
    </div>

    <!-- Inscription & Logo -->
    <div class="inscription-logo">
      <!-- First Inscription Link and Logo -->
      <p>Programme offert à Maisonneuve</p>
      <a href="<?php echo esc_url(get_theme_mod('inscription_url')); ?>" target="_blank">
        <img class="logoM9" src="<?php echo esc_url(get_theme_mod('inscription_logo')); ?>" alt="logo de collège Maisonneuve" />
      </a>

      <!-- Second Inscription Link and SRAM Logo -->
      <p>S'inscrire avec le SRAM</p>
      <a href="<?php echo esc_url(get_theme_mod('sram_url')); ?>" target="_blank">
        <img class="logoSRAM" src="<?php echo esc_url(get_theme_mod('sram_logo')); ?>" alt="logo de SRAM" />
      </a>
    </div>

    <!-- Section Sociaux HARD CODED -->
    <div class="sociaux">
      <h2>Sociaux</h2>
      <p class="social-icons">
        <a href="https://www.instagram.com/maisonneuvetim/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>