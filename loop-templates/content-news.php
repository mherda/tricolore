<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php echo get_the_post_thumbnail( $post->ID, 'Article Hero' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php
		the_excerpt();
		?>
		
		<?php
		wp_link_pages( array(
			'before' => '<p class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</p>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if ( 'post' == get_post_type() ) : ?>

			<p class="entry-meta">
				<?php understrap_posted_on(); ?>. <!-- deliberate full stop -->
			</p><!-- .entry-meta -->

		<?php endif; ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
