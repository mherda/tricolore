<?php
$today = date('Ymd');
$pastEvents = new WP_Query(array(
	'paged' => get_query_var('paged', 1),
	'post_type' => 'event',
	'meta_key' => 'event_date',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'meta_query' => array(
	array(
		'key'=> 'event_date',
		'compare' => '<',
		'value' => $today,
		'type' => 'numeric'
		)
	)
));
?>

<nav id="nav_events">
    <div id="navmenu" class="events">
        <ul class="pagination">
            <li class="page-item active"><a class="page-link current" href="<?php echo get_post_type_archive_link( 'event' ); ?>">All</a></li><?php
                $terms = get_terms(array(
                    'taxonomy' => 'event_category'
                ));
                foreach($terms as $term) {
                    echo '<li class="page-item"><a class="page-link" href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>

<?php
if ( $pastEvents->have_posts() ) {
	// Event list container:
    echo '<div class="events">';
	
	
	while ( $pastEvents->have_posts() ) {
		$pastEvents->the_post();
		
		$event_d = new DateTime(get_field('event_date'));
		$event_month = $event_d->format('F'); // full name of month
		$event_day = $event_d->format('j'); // day of the month without leading zero
		$event_year = $event_d->format('Y'); // 4-digit year
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
		  	<!-- :TODO: remove obsolete code, even if it was good -->
			<!--
			<div id="navmenu" class="events-categories">
				<ul class="tag">
					<?php
			    	foreach($term_list as $term) {
			        	echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
			    	}
					?>
				</ul>
			</div>
			-->
    	</div>

    </div>
    <?php
	} // end while
	
	// End: Event list container:
    echo '</div>';
	
} // end if

echo paginate_links(array(
	'total' => $pastEvents->max_num_pages
));

?>

<!-- :TODO: The pagination component -->
<?php // :TODO: understrap_pagination(); ?>
