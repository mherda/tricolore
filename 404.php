<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header('front');

$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="">

			<div class="content-area notFull" id="primary">

				<main class="site-main" id="main">

          		  <!-- Top Row  -->

		          <div class="row">
		            <div class="col-md-8">
						
		              <!-- beginning of the main column -->
					  <section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'understrap' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'Uh Oh! It looks like that page got dropped from the peloton. Based on GPS data, this is the best way home:'); ?></p>

							<?php get_search_form(); ?>

							<?php // the_widget( 'WP_Widget_Recent_Posts' ); ?>

							<?php if ( understrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

								<div class="widget widget_categories">

									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'understrap' ); ?></h2>

									<ul>
										<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) );
										?>
									</ul>

								</div><!-- .widget -->

							<?php endif; ?>

							<?php

							/* translators: %1$s: smiley */
							// $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'understrap' ), convert_smilies( ':)' ) ) . '</p>';
							// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							// the_widget( 'WP_Widget_Tag_Cloud' );
							?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
            	</div> <!-- end of main column -->


	            <div class="sidebar col-md-4">
					<p>Sidebar<p>
	            </div> <!-- end of right column -->
			
			
          	</div> <!-- end of Top Row-->
			
			
			</main><!-- #main -->



			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
