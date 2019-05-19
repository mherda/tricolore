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
            $img = get_the_post_thumbnail_url($post_id, 'tyle');
            $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback
      ?>
      <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        style="<?php echo $tile_background; ?>"
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
            $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
            $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback
      ?>
      <a class="tyle tyle-rectangle"
        href="<?php the_field('tile_link'); ?>"
        style="<?php echo $tile_background; ?>"
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
            $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
            $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback
    ?>
    <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
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
          $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
        ?>
    <a class="tyle" href="<?php the_field('tile_link'); ?>">
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
    <div class="tyle">
        <h2>Events</h2>
        <?php
                $today = date('Ymd');
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => 2,
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
          <div class="d-flex flex-column border text-center">
            <?php
                          $eventDate = new DateTime(get_field('event_date'));
                           ?>
            <div class="b-green mw50">
              <?php echo $eventDate->format('M'); ?>
            </div>
            <h4 class="p-2 mt-3">
              <?php echo $eventDate->format('d'); ?>
            </h4>
          </div>
          <div class="p-2 border-bottom w-100 mr-2">
            <!-- :TODO: Link event title -->
            <h5><?php the_title(); ?></h5>
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
                    echo '<a class="btn btn-primary" href="'.$event_uri[0].'" role="button btn-dark">Join on RiderHQ</a>';
                } else { ?>
                    <a href="<?php the_permalink(); ?>">read more</a>
                <?php } ?>
            </p>

          </div>
        </div>
        <?php } wp_reset_postdata(); ?>

        <p>
            <a class="btn btn-primary" href="<?php echo site_url('/events/'); ?>">All events</a>
        </p>

    </div> <!-- End events in a tile -->



</div> <!-- end of the bottom row -->












</div> <!-- end of middle row -->
