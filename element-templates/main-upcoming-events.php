<?php
  $request = wp_remote_get( 'https://api.riderhq.com/api/v1/3446/getevents?pretty=true' );
  
  if( is_wp_error( $request ) ) {
    echo "wrong request";
    return false; // Bail early
  }
  
  function utf8ize($mixed) {
    if (is_array($mixed)) {
    foreach ($mixed as $key => $value) {
    $mixed[$key] = utf8ize($value);
    }
    } else if (is_string ($mixed)) {
    return utf8_encode($mixed);
    }
    return $mixed;
    }
  
  $body = wp_remote_retrieve_body( $request );
  $data = json_decode(utf8ize($body), true);
  $data_events = $data['events'];

  if( ! empty( $data_events ) ) {
    function add_event($title, $id, $uri, $event_date, $event_status, $entries_close_date, $type) {
      $new_post = array(
        'post_title' => $title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => '2',
        'post_type' => 'event',
        'meta_input' => array(
          'hq_id' => $id,
          'event_uri' => $uri,
          'event_date' => $event_date,
          'event_status' => $event_status,
          'entries_close_date' => $entries_close_date,
          'type' => $type,
        )
      );
      $pid = wp_insert_post($new_post);
      wp_set_object_terms($pid, 'riderhq', 'event_category');
      $get_meta_time = get_post_meta($pid, 'event_date');
      $newformat = date('Ymd', strtotime($get_meta_time[0]));
      update_post_meta($pid, 'event_date', $newformat);
      update_post_meta($pid, 'event_uri', $uri);
    }
        
	  foreach( $data_events as $event ) {
      
      $existing_posts_arguments = array(
        'hierarchical' => 1,
        'meta_key' => 'hq_id',
        'meta_value' => $event['id'],
        'post_type' => 'event',
      );

      $existing_posts = get_posts( $existing_posts_arguments );

      if ( count($existing_posts) < 1 ) {
        add_event($event['name'], $event['id'], $event['uri'], $event['start_date'], $event['status'], $event['entries_close_date'], $event['type'] );
      }

        
    } // end of foreach event
  }

?>

<!-- Event categories -->
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
                        $event_status = get_post_meta($post->ID, 'event_status');
                        $entries_close_date = get_post_meta($post->ID, 'entries_close_date');
                        $type = get_post_meta($post->ID, 'type');
                        if ( $entries_close_date ) {
                          $close_date = new DateTime($entries_close_date[0]);
                          echo '<p>Entries close date: '.$close_date->format('d-m-Y').'</p>';
                          $now =  new DateTime();
                          if ( $close_date > $now ) {
                            if ( $event_uri ) {
                              echo '<a class="btn" href="'.$event_uri[0].'">Join on RiderHQ</a>';
                            }
                          } else {
                            echo "Event closed for entries";
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

} // end if

?>
