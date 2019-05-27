<?php
/**
 * Template Name: Rides
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
$container = get_theme_mod( 'understrap_container_type' );

?>
<div
  class="wrapper" id="page-wrapper">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="">
      <div class="content-area notFull" id="primary">
        <main class="site-main" id="main" role="main">
          

          <!-- Top Row including RiderHQ on the Left and the Weather on the right -->
          <div class="row">
            <div class="col-md-8">
                
                <!-- Breadcrumb, hero image then title -->
                <?php get_template_part( 'element-templates/page-header' ); ?>
                
                <div class="entry-content">
                    
                    <!-- Panel content -->
                    <div class="panel">
                        <p><?php echo get_field('top_info'); ?></p>
                        <p>Visit our <a href="<?php echo the_field('facebook_link'); ?>">Facebook page</a> for updates and any route changes for our rides this week.</p>
                        <p><a class="btn" href="<?php echo the_field('ridehq_link'); ?>">Sign up on Rider HQ</a></p>
                    </div>
                    
                    <?php
    					global $post;
    					$content = apply_filters('the_content', $post->post_content);
    				?>
                    <?php echo $content; ?>
                    
                </div>
                
                <!-- Tiles after main content */
                <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>

            </div>


            <!-- sidebar -->
            <div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
              <div id="weather"></div>
              
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