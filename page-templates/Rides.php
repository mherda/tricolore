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
  <div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
      <div class="content-area" id="primary">
        <main class="site-main" id="main" role="main">
          

          <!-- Top Row including RiderHQ on the Left and the Weather on the right -->
          <div class="row">
            <div class="col-md-8">
                
                <!-- Breadcrumb, hero image then title -->
                <?php get_template_part( 'element-templates/page-header' ); ?>
                
                <div class="entry-content">
                    
                    <!-- Panel content -->
                    <div class="panel">
                        <?php echo get_field('header_information'); ?>
                        <p><a class="btn" href="<?php echo the_field('ridehq_link'); ?>"><?php echo the_field('button_label'); ?></a></p>
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
              
			  <?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
            </div>

          </div>





        </main><!-- #main -->

      </div><!-- #primary -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>