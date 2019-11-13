<?php
    $current_term = get_queried_object();
?>
<nav>
    <div id="navmenu" class="events">
        <ul class="pagination">
            <?php
            // All events item:
            if ( !$current_term->name ) {
                echo '<li class="page-item active"><a class="page-link current" href="'.get_post_type_archive_link( 'event' ).'">'.All.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="'.get_post_type_archive_link( 'event' ).'">'.All.'</a></li>';
            }
            
            // Other events:
            $terms = get_terms(array(
                'taxonomy' => 'event_category'
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
        $event_d = new DateTime(get_field('event_date'));
        $event_month = $event_d->format('M'); // 3 letter month
        $event_day = $event_d->format('D j'); // 3 letter day and date without leading zero
        $event_year = $event_d->format('Y');
        $term_list = wp_get_post_terms($post->ID, 'event_category');
?>
    <div class="d-flex">
		<div>
			<p class="month"><?php echo $event_month; ?> <?php echo $event_year; ?></p>
			<p class="day"><?php echo $event_day; ?></p>
		</div>
	    <div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
			$content = wp_trim_words(get_the_content(), 30);
			if ($content) {
				echo '<p>' . $content . '</p>';
			} // endif
			?>
            <?php
                $event_uri = '';
                foreach( $term_list as $term ) {
                    if($term->name == 'RiderHQ') {
                        $event_uri = get_post_meta($post->ID, 'event_uri');
                        $entries_close_date = get_post_meta($post->ID, 'entries_close_date');
                        if ( $entries_close_date ) {
                            $close_date = new DateTime($entries_close_date[0]);
                            echo '<p>Entries close date: '.$close_date->format('d-m-Y').'</p>';
                            $now =  new DateTime();
                            if ( $close_date > $now ) {
                              if ( $event_uri ) {
                                echo '<a class="btn" href="'.$event_uri[0].'">Join on RiderHQ</a>';
                              }
                            } else {
                              echo "Event closed for entries.";
                            }
                        }
                }
            }
            
                ?>
		  	<!-- :TODO: remove obsolete code, even if it was good -->
			<!--
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
                -->
            </div>
        </div>
    <?php } // end while
	
	// End: Event list container:
    echo '</div>';

} else { // else if
?>
    <p>There are currently no upcoming events in this category.</p>
<?php
} // end if
?>
