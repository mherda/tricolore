<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */



get_header('front');
$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );

?>
<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
		<div class="content-area" id="primary">
			<main class="site-main" id="main" role="main">
				
				<div class="row"> <!-- Beginning of Content -->
          			<!-- beginning of the main column -->
					<div class="col-md-8"> <!-- beginning of main column -->
						<?php
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post();
									?>
					                
					                <!-- Breadcrumb, hero image then title -->
					                <?php get_template_part( 'element-templates/page-header' ); ?>
						              
									<div class="entry-content">
										<?php the_content(); ?>
									</div>
					              
					                <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>
									
									<?php
								} // end while
							} // end if
						?>
					</div> <!-- end of main column -->

		            <div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
						<?php get_template_part( 'element-templates/sidebar-news' ); ?>
						<?php get_template_part( 'element-templates/sidebar-gallery' ); ?>
		            </div> <!-- end of right column -->


		          </div> <!-- end of Top Row-->

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->




<?php get_footer('main'); ?>
