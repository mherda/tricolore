<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

/* $container = get_theme_mod( 'understrap_container_type' ); */
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
	<!--  Fonts: https://fonts.google.com/specimen/Karla?selection.family=Karla:700|Montserrat:400,600 -->
	<link href="https://fonts.googleapis.com/css?family=Karla:700|Montserrat:400,600" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="full_dark" itemscope itemtype="http://schema.org/WebSite">

		<div id="page-header">
			<div class="logo">
			<?php the_custom_logo();
					 if (!has_custom_logo()) {
						 ?>
						 	<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" width="200" />
					 <?php }
					 ?>
			</div>
			<div class="search-area">
			<div>
				<?php get_search_form(); ?>
			</div>
			</div>
			<nav class="navbar navbar-expand-md navbar-dark navbar-custom">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav mx-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 3,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					</div><!-- .container -->
				</nav><!-- .site-navigation -->

		</div><!-- #page-header end -->
	</div><!-- #wrapper-navbar end -->
