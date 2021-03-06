<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title( sprintf(
			'<h2 class="entry-title">
				<a href="%s" rel="bookmark">',
					esc_url( get_permalink() ) ),
				'</a>
			</h2>'
		);
		?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); 
		
		$event_meta_desc = get_post_meta( get_the_ID(), 'event_description' );
		if ( $event_meta_desc ) {
			$str = strtok($event_meta_desc[0], "\n");

			echo $str;
		}
		
		
		
		?>



	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<p>
					<?php understrap_posted_on(); ?>. <!-- deliberate full stop -->
					<?php understrap_entry_footer(); ?>. <!-- deliberate full stop -->
				</p>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
