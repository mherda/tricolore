<?php
/**
 * Template Name: Rides
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
?>
<div
  class="wrapper" id="page-wrapper">
  <div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">
          

          <!-- Top Row including RiderHQ on the Left and the Weather on the right -->
          <div class="row mb-2">
            <div class="col-md-8 p-2">
              
            <?php get_template_part( 'element-templates/page-header' ); ?>
            
            
              <div class="b-dark w-100 text-white p-2">
                <h5>
                  <?php echo get_field('top_info'); ?>
                </h5>
                <p>For the latest updates on our Sunday rides visit our
                  <a class="p-link" href="<?php echo the_field('facebook_link'); ?>">Facebook page</a>
                </p>
              </div>
              <div class="b-red w-100 text-white p-1 pt-2">
                <h5 class="text-center">Sign up now using <a class="w-link" href="<?php echo the_field('ridehq_link'); ?>">Rider HQ</a></h5>
              </div>
              <div>
                <?php
					global $post;
					$content = apply_filters('the_content', $post->post_content);
				?>
                <?php echo $content; ?>
              </div>


              <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>


            </div>


            <!-- sidebar -->
            <div class="col-md-4 text-white p-2">
              <div id="weather" class="b-green p-2 mb-2"></div>
              <?php get_template_part( 'element-templates/rides-objects' ); ?>
              <?php get_template_part( 'element-templates/sidebar-routes' ); ?>
              <?php get_template_part( 'element-templates/sidebar-rideleaders' ); ?>
            </div>

          </div>





        </main><!-- #main -->

      </div><!-- #primary -->

    </div><!-- .row end -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>