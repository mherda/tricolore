<?php
/**
 * Template Name: Generic Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
// $container = get_theme_mod( 'understrap_container_type' );
?>
<div
  class="wrapper" id="page-wrapper">
  <div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main mr-5 ml-5" id="main" role="main">

          <!-- Top Row  -->

          <div class="row mb-2">
            <div class="col-md-8 p-2">
              <!-- beginning of the main column -->
              <div class="w-100 text-white">
              <?php
								$img = get_the_post_thumbnail($post->ID, 'pageHeader');
								if ( $img ) { ?>
                <?php echo get_the_post_thumbnail($post->ID, 'pageHeader');  ?>
                <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/page_headers/chair.jpg" />
                <?php } ?>
                <div class="b-green w-100 text-white p-1 pt-2">
                  <h5 class="pl-3">
                    <?php echo esc_html( get_the_title() ); ?>
                  </h5>
                </div>
              </div>

              <?php
								global $post;
								$content = apply_filters('the_content', $post->post_content);
						?>
              <p>
                <?php echo $content; ?>
              </p>



              <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>



            </div> <!-- end of main column -->


            <div class="col-md-4 p-2">

              <div>
								<?php get_template_part( 'element-templates/sidebar-gallery' ); ?>				
              </div>
              
              <div>
								<?php get_template_part( 'element-templates/sidebar-events' ); ?>				
							</div>

             <?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
            </div> <!-- end of right column -->


          </div> <!-- end of Top Row-->



      </div>





      </main><!-- #main -->

    </div><!-- #primary -->

  </div><!-- .row end -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>