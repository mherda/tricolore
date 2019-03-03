<?php
/**
 * Template Name: Front Full
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
// $container = get_theme_mod( 'understrap_container_type' );
?><!-- carousel -->

<?php get_template_part( 'element-templates/carousel' ); ?>

<!-- End of Carousel -->



<div class="wrapper" id="page-wrapper">

  <div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">

    <div class="row">

      <div class="col-md-12 content-area" id="primary">

        <main class="site-main mr-5 ml-5" id="main" role="main">

          <div id="disclaimer text-center mb-3">
            <h5 class="pb-3 text-center">
              <?php echo get_post_meta($post->ID, 'disclaimer', true); ?>
            </h5>
          </div>
          <div class="mt-3">
            <?php get_template_part( 'element-templates/front', 'tiles-acf' ); ?>
          </div>



        </main><!-- #main -->

      </div><!-- #primary -->

    </div><!-- .row end -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>