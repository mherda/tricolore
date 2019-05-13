<?php

get_header('front');

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">

					<!-- Top Row  -->
					
					<div class="row mb-2">
						<div class="col-md-8">
							<!-- Load the page body header -->
							<?php
								get_template_part( 'element-templates/page-header' );
								// Load upcoming events
								get_template_part( 'element-templates/main-upcoming-events' );
							?>

						</div>
						<div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
							<div class="events">
							<?php get_template_part( 'element-templates/sidebar-past-events' ); ?>
							</div>
							<div class="text-white">
							<?php get_template_part( 'element-templates/sidebar-regular-events' ); ?>
							</div>
							
						</div>

					</div> <!-- end of Top Row-->

				

				</div>





				</main><!-- #main -->

				<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
