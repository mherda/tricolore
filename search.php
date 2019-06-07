<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header('front');

$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> notFull" id="content">

		<div class="row">

			

			<main class="site-main" id="main">

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
						
							<h1 class="page-title"><?php printf(
							/* translators:*/
							 esc_html__( 'Search results for %s', 'understrap' ),
								'<span>&lsquo;' . get_search_query() . '&rsquo;</span>' ); ?></h1>

					</header><!-- .page-header -->

					<div class="entry-content">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>
						
					</div>
					
					<!-- The pagination component -->
					<?php understrap_pagination(); ?>
					
				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>


						</div> <!-- .col -->
						
						<div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
							<?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>
							<?php get_template_part( 'element-templates/sidebar-regular-events' ); ?>
						</div> <!-- end of Sidebar -->
						
					</div> <!-- .row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
