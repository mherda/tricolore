<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();

?>
<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					
					<div class="row"> <!-- Beginning of Content -->
						<div class="col-md-8"> <!-- beginning of main column -->
							<?php
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										?>
										<h1><?php the_title(); ?></h1>
										
											<?php the_content(); ?>
										
										<?php
									} // end while
								} // end if
							?>
						</div> <!-- end of main column -->
						
						<div class="sidebar col-md-4"> <!-- beginning of Sidebar -->
							<p>this is aside</p>
						</div> <!-- End of Side -->
					</div><!-- end of content-row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->




<?php get_footer(); ?>
