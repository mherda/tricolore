<?php
/**
 * Template Name: Single Event
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main mr-5 ml-5" id="main" role="main">
					
					<div class="row mb-2"> <!-- Beginning of Content -->
						<div class="col-md-8 p-2"> <!-- beginning of main column -->
						<?php get_template_part( 'element-templates/page-header' ); ?>

						
							<?php
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										
									$event_d = new DateTime(get_field('event_date'));
									$event_month = $event_d->format('M');
									$event_day = $event_d->format('d');
									$event_year = $event_d->format('Y');
									$event_display = $event_day . " " . $event_month . " " . $event_year;

									?>
											<h1><?php the_title(); ?></h1>
											<hr />
													<h4><?php echo $event_display; ?></h4>
													<img src="<?php the_post_thumbnail('eventFeatured'); ?>" />
													<p><?php the_content(); ?></p>

												<?php } // end while
												} // end if ?>
												<?php get_template_part( 'element-templates/bottom_tiles1' ); ?>

						</div> <!-- end of main column -->
												
						<div class="sidebar col-md-4 p-2"> <!-- Beginning of Side -->
							<div class="p-2 w-100 b-green mb-3">
								<?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>
							</div>
							<div>
								<?php get_template_part( 'element-templates/sidebar-gallery' ); ?>
							</div>

							<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
						</div> <!-- End of Side -->
					</div><!-- end of content-row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
