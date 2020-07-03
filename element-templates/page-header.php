<!-- Breadcrumb -->
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<?php
	if(function_exists('bcn_display')) {
		bcn_display();
	}
	?>
</div>

<!-- Page hero image -->
<!-- :TODO: Refactor all Penge page templates to call this element template. -->
<?php
	
	$img = get_the_post_thumbnail($post->ID);
	if ( $img ) {
		switch(basename(get_page_template())) {
			case "Full-Width-Zoom.php":
				echo get_the_post_thumbnail($post->ID, 'Landing Page Hero');
				break;
			case "Rides.php":
				echo get_the_post_thumbnail($post->ID, 'Article Hero');
				break;
			case "Generic Page.php":
				echo get_the_post_thumbnail($post->ID, 'Article Hero');
				break;
		}
	}
?>

<header class="entry-header">
	<?php
		$url = home_url( $wp->request );
		$parsed_url = explode('/',$url);

		if ( is_tax('news_tax') ) {
			echo '<h1 class="entry-title">' . 'News' . '</h1>';
		}
		if ( is_post_type_archive('news')) {
			$title = 'News';
			if ( is_year() ) {
				$title = 'News from ' . $parsed_url[4];
			} elseif ( is_month() ) {
				$month_name = date("F", mktime(0, 0, 0, $parsed_url[5], 10)); 
				$title = 'News from ' . $month_name . ' ' . $parsed_url[4];
			}
			echo '<h1 class="entry-title">' . $title . '</h1>';
		}
	?>
</header><!-- .entry-header -->
