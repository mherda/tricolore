<div class="events">
    <?php
    $categories = get_the_category();

    if ( ! empty( $categories ) ) { ?>
        <h2><?php echo esc_html( $categories[0]->name ); ?> Events</h2>
    <?php

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
        <div>
            <?php $eventDate = new DateTime(get_field('event_date')); ?>
            <p class="month"><?php echo $eventDate->format('M Y'); ?></p>
            <p class="day"><?php echo $eventDate->format('D j'); ?></p>
        </div>
        <div>
            
            <!-- Event in a title -->
            <?php
            $event_uri = '';
            foreach( $term_list as $term ) {
                if($term->name == 'RiderHQ') {
                    $event_uri = get_post_meta($post->ID, 'event_uri');
                }
            } ?>
            
            <?php
            // Title:
            if ( $event_uri ) {
                echo '<h3><a href="'.$event_uri[0].'">';
                    the_title();
                echo '</a></h3>';
            } else { ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php } ?>
            
            <?php
            // Description:
            echo wp_trim_words(get_the_content(), 18);
            ?>
            
            <?php
            // Sign-up button: :TODO: remove obsolete code
            if ( $event_uri ) {
                echo '<p><a class="btn" href="'.$event_uri[0].'">Join on RiderHQ</a></p>';
            }
            ?>

      </div>
    </div>
    <?php } wp_reset_postdata(); ?>
    <?php } else {
      ?> <p>No upcoming events.</p>
    <?php } ?>
    
    <?php } else { ?>
        
        <h3>Upcoming events</h3>
    <?php } ?>
    <p>
        <a class="btn" href="<?php echo site_url('/event/' . strtolower($categories[0]->name) . '/'); ?>"><?php echo esc_html( $categories[0]->name ); ?> Events</a>
    </p>

</div> <!-- end of module -->
    