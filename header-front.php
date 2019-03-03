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
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<!-- Area above the navbar -->
		<div class="row h-100 align-items-center m-3 mx-auto notFull">
			<div class="offset-md-4 col-md-4">
				<div class="text-center mb-2">
					<?php the_custom_logo();
					 if (!has_custom_logo()) {
						 ?>
						 	<img src="<?php echo get_template_directory_uri(); ?>/assets/whiteLogo.svg" width="200" />
					 <?php }
					 ?>
				</div>
		  </div>
		  <div class="col-md-4">
				<div>
				<form>
					<input class="form-control form-control-sm mr-3 w-55" type="text" placeholder="Search" aria-label="Search">
				</form>
			</div>
		  </div>
		</div>

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<nav class="navbar navbar-expand-md navbar-light bg-pattern">

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
					'menu_class'      => 'navbar-nav mx-auto',
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
