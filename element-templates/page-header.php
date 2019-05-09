<!-- Breadcrumb -->
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<?php
	if(function_exists('bcn_display')) {
		bcn_display();
	}
	?>
</div>

<!-- Page hero image -->
<div class="w-100 text-white mb-3">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/page_headers/chair.jpg" />
	
	<!--	<img src="<?php echo get_the_post_thumbnail($post->ID); ?>" /> -->
</div>

<!-- :TODO: Page title -->
<!-- <h1></h1> -->
