<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon32.png">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<!--
		<div class="d-flex justify-content-between mt-2 ml-1 mr-1 mb-1">
      <div class="p-2">
        <a href="https://www.facebook.com/groups/206843416040902/" target="_blank"><i class="fa fa-lg fa-facebook"></i></a>
        <a href="https://www.youtube.com/channel/UCldNfBQKDUfxZzQcYkKVSmw" target="_blank"><i class="fa fa-lg fa-flickr"></i></a>                                                                                <a href="https://www.youtube.com/channel/UCldNfBQKDUfxZzQcYkKVSmw" target="_blanl"><i class="fa fa-lg fa-youtube"></i></a>
      </div>

			<img src="<?php echo get_template_directory_uri(); ?>/assets/whiteLogo.svg" width="200" />

	                    <i class="fa fa-search"></i>

    </div> -->

		<div class='row mt-3 mb-3'>
			<div class="col-md-4 offset-md-4 text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/whiteLogo.svg" width="200" />
			</div>
			<div class="col-md-3 offset-md-1 text-right mt-4">
				<?php get_search_form(); ?>
			</div>


		</div>

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-light bg-pattern mx-auto">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>


				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 3,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
