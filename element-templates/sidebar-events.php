<div class="b-dark p-2 mb-2 text-white">
  <div class="m-2">
    <div class="d-flex p-2 flex-column">
        <?php
        $categories = get_the_category();
 
          if ( ! empty( $categories ) ) { ?>
          <h3>Events: <?php echo esc_html( $categories[0]->name ); ?></h3><?php
          
                $today = date('Ymd');
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => 5,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                      array(
                        'key'=> 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                      )
                      ),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'event_category',
                        'field' => 'name',
                        'terms' => $categories[0]->name
                      )
                    )
                    
                ));
                if ( have_posts() ) {
                while($homepageEvents->have_posts()) {
                  $homepageEvents->the_post();
                  $term_list = wp_get_post_terms($post->ID, 'event_category');
                  ?>
                  <div class="d-flex">
                    <div class="d-flex flex-column border text-center">
                      <?php $eventDate = new DateTime(get_field('event_date')); ?>
                      <div class="b-green mw50"><?php echo $eventDate->format('M'); ?></div>
                      <h4 class="p-2 mt-3"><?php echo $eventDate->format('d'); ?></h4>
                    </div>
                  <div class="p-2 border-bottom w-100 mr-2">
                    <h5><?php the_title(); ?></h5>
                    <p><?php echo wp_trim_words(get_the_content(), 18);
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
                    </div>
                  </div>
                  <?php } wp_reset_postdata(); ?>
                        <?php } else {
                          ?> <h4>No upcoming events</h4>
                        <?php } ?>
      </div>
                        <?php } else { ?>
                          <h3>Upcoming events</h3>
                       <?php } ?>
                        
      <div class="text-right m-2">
        <a href="<?php echo site_url('/events'); ?>">
          <button type="button" class="btn btn-danger">All events</button>
        </a>
      </div>

    </div>
  </div> <!-- end of module -->
    