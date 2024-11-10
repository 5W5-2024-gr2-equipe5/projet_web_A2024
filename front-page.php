<?php get_header(); ?>

<!-- Section Video -->
<div class="video">
  <video autoplay loop muted>
    <source src="<?php echo esc_url( 'http://tim2.local/wp-content/uploads/2024/11/WORK2.mp4' ); ?>" type="video/mp4" />
    Your browser does not support the video tag.
  </video>
</div>


<!-- POUR TESTER LE SHORTCUT -->
<!-- Icon Banner Slider -->
<div class="icon-banner-slider">
  <?php echo do_shortcode('[icon_banner_slider]'); ?>
</div>
<!--  -->

<?php get_footer(); ?>