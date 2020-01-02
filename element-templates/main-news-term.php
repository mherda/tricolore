<?php
    $current_term = get_queried_object();
?>
<nav>
    <div id="navmenu" class="events">
        <ul class="pagination">
            <?php
            // All news items:
            if ( !$current_term->name ) {
                echo '<li class="page-item active"><a class="page-link current" href="'.get_post_type_archive_link( 'news' ).'">'.'All'.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="'.get_post_type_archive_link( 'news' ).'">'.'All'.'</a></li>';
            }
            
            // Other news categories:
            $terms = get_terms(array(
                'taxonomy' => 'news_tax'
            ));
            foreach($terms as $term) {
                if ( $term->name == $current_term->name ) {
                    echo '<li class="page-item active"><a class="page-link current" href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</nav>

<?php
if ( have_posts() ) {
    // Event list container:
    echo '<div class="events">';
    
    while ( have_posts() ) {
        the_post();


        get_template_part('loop-templates/content-news', get_post_format());


        ?>

    <?php } // end while
	
	// End: Event list container:
    echo '</div>';


} // end if
?>
