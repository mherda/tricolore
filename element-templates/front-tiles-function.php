<!-- Middle Row -->
<div id="front-tiles" class="grid">

<!-- Top Row -->
<?php
    $posts = [
        'top_left_tile',
        'top_centre_tile',
        'top_right_tile'
    ];

    foreach ($posts as $title): ?>
      <?php
            $post_object = get_field($title);
            $post = $post_object;
            setup_postdata($post);
            $img = get_the_post_thumbnail_url($post, '1/2 Tile Desktop');
            $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
      ?>
      <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
        <?php
        if ($post) { ?>
        <div class="caption">
            <p class="tag"><?php the_field('tile_category'); ?></p>
            <h2><?php the_title(); ?></h2>
            <p><?php echo $post->post_content; ?></p>
        </div>
        <?php
        } else { ?>
            <!-- Error: Please specify a tile to be displayed. -->
        <?php }
        wp_reset_postdata();
        ?>
      </a>
    <?php endforeach; ?>
</div>


<!-- Middle Row -->
<div id="rect-tiles" class="grid">

<?php
    $posts = [
        'middle_left_tile',
        'middle_right_tile',
    ];

    foreach ($posts as $title): ?>
      <?php
            $post_object = get_field($title);
            $post = $post_object;
            setup_postdata($post);
            $img = get_the_post_thumbnail_url($post, 'frontTilePort');
            $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
      ?>
      <a class="tyle tyle-rectangle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
            <?php
            if ($post) { ?>
              <div class="caption">
                <p class="tag"><?php the_field('tile_category'); ?></p>
                <h2><?php the_title(); ?></h2>
                <p><?php echo $post->post_content; ?></p>
              </div>
            <?php
            } else { ?>
                <!-- Error. Please specify a tile to be displayed! -->
            <?php }
            wp_reset_postdata();
            ?>
        
            </a>
    <?php endforeach; ?>
</div>






<!-- Bottom Row -->

<div id="front-tiles" class="grid"> <!-- :TODO: Homepage tiles bottom row: 1 1 2 -->

    <!-- beginning of bottom left -->
    <?php
        $post_object = get_field('bottom_left_tile');
        if( $post_object ):
            // override $post
            $post = $post_object;
            setup_postdata( $post );
            $img = get_the_post_thumbnail_url($post, 'frontTilePort');
            $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
    ?>
    <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
        <div class="caption">
          <p class="tag"><?php the_field('tile_category'); ?></p>
          <h2><?php the_title(); ?></h2>
          <p><?php echo $post->post_content; ?></p>
        </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
    <!-- end of bottom left -->


    <!-- beginning of bottom centre -->
    <?php
        $post_object = get_field('bottom_centre_tile');
        if( $post_object ):
          // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = get_the_post_thumbnail_url($post, 'frontTilePort');
          $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
        ?>
    <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
        <div class="caption">
          <p class="tag"><?php the_field('tile_category'); ?></p>
          <h2><?php the_title(); ?></h2>
          <p><?php echo $post->post_content; ?></p>
        </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
    <!-- end of bottom centre -->


    <!-- Start events in a tile -->
    <div class="tyle events">
        <h2>Events</h2>
        <?php
                $today = date('Ymd');
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => 3,
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
                    )
                ));

                while($homepageEvents->have_posts()) {
                  $homepageEvents->the_post();
                  $term_list = wp_get_post_terms($post->ID, 'event_category');
                  ?>
        <div class="d-flex">
          <div>
            <?php
            $eventDate = new DateTime(get_field('event_date'));
            ?>
            <p class="month"><?php echo $eventDate->format('F Y'); ?></p>
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
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php } ?>
            
            <!-- Event description -->
            <?php
            $content = wp_trim_words(get_the_content(), 8);
            if ($content) {
            ?>
                <p><?php echo $content ?></p>
            <?php } ?>
            
            <!-- Sign-up button: :TODO: remove obsolete code -->
            <?php
            if ( $event_uri ) {
                echo '<p><a class="btn" href="'.$event_uri[0].'">Join on RiderHQ</a></p>';
            }
            ?>

          </div>
        </div>
        <?php } wp_reset_postdata(); ?>

        <p>
            <a class="btn" href="<?php echo site_url('/events/'); ?>">All events</a>
        </p>

    </div> <!-- End events in a tile -->



</div> <!-- end of the bottom row -->












</div> <!-- end of middle row -->
