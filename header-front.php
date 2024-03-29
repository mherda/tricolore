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
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-26591999-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

		gtag('config', 'UA-26591999-1');
	</script>

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
	<!-- Flex Header with Content -->
	<div id="wrapper-navbar" class="wrapper">
		<div class="container-fluid notFull">
			<div class="row">
				<div class="col-md-3 col-sm-12 logo">
					<?php
					the_custom_logo();
					if (!has_custom_logo()) {
					?>
					<a href="/">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" width="259" height="105" />
					</a>
					<?php } ?>
				</div>
				<div class="col-md-4 offset-md-5 col-sm-12">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9 offset-md-3 col-sm-12">
					<nav class="navbar navbar-expand-md navbar-dark navbar-custom">
					

						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'navbar-marcin',
								'fallback_cb'     => '',
								'menu_id'         => '',
								'depth'           => 2,
								'item_spacing'    => 'discard',
							)
						); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ******************* End of The Navbar Area ******************* -->
