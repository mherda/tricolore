<?php
/**
 * Template Name: Past Events
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
// $container = get_theme_mod( 'understrap_container_type' );
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
							<?php get_template_part( 'element-templates/page-header' ); ?>
							<?php
								global $post;
								$content = apply_filters('the_content', $post->post_content);
						?>
							<p><?php echo $content; ?></p>
							<?php get_template_part( 'element-templates/main-past-events' ); ?>
						</div>
						<div class="col-md-4"> <!-- beginning of Sidebar -->
							<div class="p-2 w-100 b-green mb-3">
								<?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>
							</div>
							<div class="text-white">
							<?php get_template_part( 'element-templates/sidebar-regular-events' ); ?>

							</div>
						</div>

					</div> <!-- end of Top Row-->

			

				</div>





				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
