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
	$img = get_the_post_thumbnail($post->ID, 'Landing Page Hero');
	if ( $img ) {
      echo get_the_post_thumbnail($post->ID, 'Landing Page Hero');
  }
?>

<!-- Page title -->
<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
