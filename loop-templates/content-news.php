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

		<?php if ( 'news' == get_post_type() ) : ?>

			<p class="entry-meta">
				<!-- Date (with last update) by author in categories. -->
				<?php understrap_posted_on(); ?>
                
                <?php
				// Categories
				global $post;
                $terms = wp_get_post_terms( $post->ID, 'news_tax');
				if ($terms) {
					esc_html_e( ' in');
	                foreach($terms as $term) {
	                    echo ' <a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	                }
					echo '.';
				}
				
				?>
			</p><!-- .entry-meta -->

		<?php endif; ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

