<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<p class="entry-meta">
				<?php understrap_posted_on(); ?>. <!-- deliberate full stop -->
				<?php understrap_entry_footer(); ?>. <!-- deliberate full stop -->
			</p><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		the_excerpt();
		?>
		
		<?php
		wp_link_pages( array(
			'before' => '<p class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</p>',
		) );
		?>

		<p class="entry-footer">
			
		</p><!-- .entry-footer -->

	</div><!-- .entry-content -->

</article><!-- #post-## -->
