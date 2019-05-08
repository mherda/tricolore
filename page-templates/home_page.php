<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the home page
 *
 * 
 */

get_header('front');
?>

<!-- carousel -->
<div id="carousel" class="full_dark">
  <?php get_template_part( 'element-templates/carousel' ); ?>
</div>
<!-- End of Carousel -->



<div class="wrapper" id="page-wrapper">

  <div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">

    <div class="row">

      <div class="col-md-12 content-area" id="primary">

        <main class="site-main" id="main" role="main">

          <div id="disclaimer text-center mb-3">
            <h5 class="pb-3 text-center">
              <?php echo get_post_meta($post->ID, 'disclaimer', true); ?>
            </h5>
          </div>
          <div class="mt-3 mx-a">
            <?php get_template_part( 'element-templates/front', 'tiles-function' ); ?>
          </div>



        </main><!-- #main -->

      </div><!-- #primary -->

    </div><!-- .row end -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>