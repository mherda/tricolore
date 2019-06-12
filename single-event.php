<?php
/**
 * Template Name: Single Event
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					
					<div class="row"> <!-- Beginning of Content -->
						<div class="col-md-8"> <!-- beginning of main column -->
							<?php get_template_part( 'element-templates/page-header' ); ?>

							<div class="entry-content">
								<?php
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										
										$event_d = new DateTime(get_field('event_date'));
										$event_month = $event_d->format('F');
										$event_day = $event_d->format('l j');
										$event_year = $event_d->format('Y');
										$event_display = $event_day . " " . $event_month . " " . $event_year;
								?>
								<p><?php echo $event_display; ?></p>
								
								<!-- <img src="<?php the_post_thumbnail('eventFeatured'); ?>" /> -->
								
								<?php the_content(); ?>
								<?php
									} // end while
								} // end if
								?>
								
							</div> <!-- .entry-content -->
							
							<?php get_template_part( 'element-templates/bottom_tiles1' ); ?>
							
						</div> <!-- end of main column -->
						
						
						<div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
							
							<?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>
							
							<?php get_template_part( 'element-templates/sidebar-gallery' ); ?>
							
							<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
							
						</div> <!-- End of Side -->
						
					</div><!-- end of content-row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
