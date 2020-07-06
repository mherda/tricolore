<nav id="nav_events">
    <div id="navmenu" class="events">
        <ul class="pagination">
            <li class="page-item active"><a class="page-link current" href="<?php echo get_post_type_archive_link( 'news' ); ?>">All</a></li><?php
            $terms = get_terms(array(
                'taxonomy' => 'news_tax'
            ));
            foreach($terms as $term) {
                echo '<li class="page-item"><a class="page-link" href="'.get_term_link($term).'">'.$term->name.'</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<?php if ( have_posts() ) : ?>
							
							<div class="entry-content">
								<?php
                                /* Start the Loop */
								while ( have_posts() ) : the_post();

    								get_template_part( 'loop-templates/content-news', get_post_format() );

                                endwhile;
                                ?>
							</div>
								
<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

<?php endif; ?>
