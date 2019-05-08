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
        <main class="site-main" id="main" role="main">

          <!-- Top Row  -->

          <div class="row mb-2">
            <div class="col-md-8 p-2">
              <!-- beginning of the main column -->
              <div class="w-100">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php
                    if(function_exists('bcn_display'))
                    {
                            bcn_display();
                    }?>
                </div>
                
                <?php
					$img = get_the_post_thumbnail($post->ID, 'pageHeader');
					if ( $img ) { ?>
                        echo get_the_post_thumbnail($post->ID, 'pageHeader');
                    } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/page_headers/chair.jpg" />
                <?php } ?>
                  
            	<header class="entry-header">

            		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            	</header><!-- .entry-header -->

                <?php
                global $post;
                $content = apply_filters('the_content', $post->post_content);
                echo $content;
                ?>
              </div>



              <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>



            </div> <!-- end of main column -->


            <div class="sidebar col-md-4 p-2">

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