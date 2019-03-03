<?php
    $current_term = get_queried_object();
?>
<nav>
    <div id="navmenu" class="events">
        <ul class="text-center">
            <li><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">All</a></li>
            <?php
                $terms = get_terms(array(
                    'taxonomy' => 'event_category'
                ));
                foreach($terms as $term) {
                    if ( $term->name == $current_term->name ) {
                        echo '<li class="ccc"><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                    } else {
                    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                    }
                }
            ?>
        </ul>
    </div>
</nav>

<?php
    if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();     
        $event_d = new DateTime(get_field('event_date'));
        $event_month = $event_d->format('M');
        $event_day = $event_d->format('d');
        $event_year = $event_d->format('Y');
        $term_list = wp_get_post_terms($post->ID, 'event_category');          
?>
        <div class="row border-bottom border-top m-1">
            <div class="col-md-2 bg-light d-flex align-items-center justify-content-center">
                <div class="text-center pt-1">
                    <h5><?php echo $event_day; ?> <?php echo $event_month; ?> <?php echo $event_year; ?></h5>
				</div>
            </div>
            <div class="col-md-10">
                <div class="d-flex flex-column pt-2">
                    <h3><?php the_title(); ?></h3>
                    <p>
                        <?php echo wp_trim_words(get_the_content(), 18); ?>
                        <?php
                            $event_uri = '';
                            foreach( $term_list as $term ) {
                                if($term->name == 'RiderHQ') {
                                    $event_uri = get_post_meta($post->ID, 'event_uri');
                                }
                            } 
                            if ( $event_uri ) {
                                echo '<a class="btn btn-primary" target="_blank" href="'.$event_uri[0].'" role="button btn-dark">Book Now</a>';
                            } else { ?>
                                <a href="<?php the_permalink(); ?>">read more</a>
                            <?php } ?>
                    </p>
                    <nav>
                        <div id="navmenu" class="events-categories">
                            <ul class="text-right">
                            <?php
                                foreach($term_list as $term) {
                                    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                                }
                            ?>
                            </ul>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
            <?php } // end while
    } else { // end if ?>
    <h3>There are currently no upcoming events in this category.</h3>
    <?php }
?>
