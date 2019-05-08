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
    function add_event($title, $id, $uri, $event_date) {
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
        add_event($event['name'], $event['id'], $event['uri'], $event['start_date'] );
      }

        
    } // end of foreach event
  }

?>

<nav id="nav_events">
    <div id="navmenu" class="events">
        <ul class="text-center">
            <li class="ccc"><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">All</a>
            </li><?php
                $terms = get_terms(array(
                    'taxonomy' => 'event_category'
                ));
                foreach($terms as $term) {
                    echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
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
                                echo '<a class="btn btn-primary" href="'.$event_uri[0].'" role="button btn-dark">Book Now</a>';
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
    } // end if

?>
