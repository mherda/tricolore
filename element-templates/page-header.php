<!-- :TODO: Refactor all Penge page templates to call this element template. -->

<!-- Breadcrumb -->
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<?php
	if(function_exists('bcn_display')) {
		bcn_display();
	}
	?>
</div>

<!-- Page hero image -->
<?php
	
	if ( is_singular() || is_page() ) {
		$img = get_the_post_thumbnail($post->ID);
		if ( $img ) {
			echo '<!-- Template: ' . basename(get_page_template()) .  '-->';
			switch(basename(get_page_template())) {
				case "Full-Width-Zoom.php":
					echo get_the_post_thumbnail($post->ID, 'Landing Page Hero');
					break;
				case "page-61.php":
					echo get_the_post_thumbnail($post->ID, 'Article Hero');
					break;
				case "page-238.php":
					echo get_the_post_thumbnail($post->ID, 'Article Hero');
					break;
				case "page.php":
					if ( is_singular() ) {
						// News entry, not a News Archive page:
						echo get_the_post_thumbnail($post->ID, 'Article Hero');
						break;
					}
			}
		}
	}
?>

<header class="entry-header">
	<?php
		$url = home_url( $wp->request );
		$parsed_url = explode('/',$url);
		
		// News/Events taxonomies:
		if ( is_tax('news_tax') || is_tax('event_category') ) {
			$tax = $wp_query->get_queried_object();
			// Get taxonomy name
			$tax_name = get_taxonomy($tax->taxonomy);
			$tax_label = $tax_name->label;
			$arr = explode(' ',trim($tax_label));
			$title = $arr[0] . ' - ' . $tax->name; 
			echo '<h1 class="entry-title">' . $title . '</h1>';
		}
		
		// News archive:
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

		if ( is_post_type_archive('event')) {
			$title = 'Events';
			echo '<h1 class="entry-title">' . $title . '</h1>';
		}
		
		// Everything else provides a normal title:
		if ( is_singular() || is_page() ) {
	    	the_title( '<h1 class="entry-title">', '</h1>' );
		}
	?>
</header><!-- .entry-header -->
