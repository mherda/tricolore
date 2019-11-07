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