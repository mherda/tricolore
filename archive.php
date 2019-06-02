<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header('front');
$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">

					<div class="row"><!-- Top Row  -->
						<div class="col-md-8">
							
							<!-- Breadcrumb -->
							<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
								<?php
								if(function_exists('bcn_display')) {
									bcn_display();
								}
								?>
							</div>

							<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header -->
							
							<div class="entry-content">
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
								
								<?php
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'loop-templates/content', get_post_format() );
								?>

								<?php endwhile; ?>
								
							</div>
								
							<?php else : ?>

								<?php get_template_part( 'loop-templates/content', 'none' ); ?>

							<?php endif; ?>

							<!-- The pagination component -->
							<?php understrap_pagination(); ?>

						</div> <!-- .col -->
						
						<div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
							<?php get_template_part( 'element-templates/sidebar-gallery' ); ?>
							<?php get_template_part( 'element-templates/sidebar-regular-events' ); ?>
						</div> <!-- end of Sidebar -->
						
					</div> <!-- .row -->

				</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php // get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
