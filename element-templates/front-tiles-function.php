<div id="front-tiles" class="grid">

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
            $tile_background = ( $img ? "background: url({$img});" : "" ); // tri-green fallback
      ?>
      <a class="tile-text tyle"
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
      ?>
      <a class="tile-text tyle-rectangle" href="<?php the_field('tile_link'); ?>" >

            <?php
            if ($post) { ?>
              <img class="" src="<?php echo $img; ?>" />
              <div>
                  <div class="tyle-tag">
                    <h5><span class="tag">
                      <?php the_field('tile_category'); ?>
                    </span></h5>
                  </div>
                  <div class="caption">
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo $post->post_content; ?></p>

                  </div>
              </div>
            <?php
            } else { ?>
                <p>Error. Please specify a tile to be displayed!</p>
            <?php }
            wp_reset_postdata();
            ?>
        
            </a>
    <?php endforeach; ?>
</div>







<div class="row"> <!-- Homepage tiles bottom row: 1 1 2 -->

  <div class="col-xs-12 col-sm-6 col-md-3 mb-3">
    <!-- beginning of bottom left -->
    <?php
        $post_object = get_field('bottom_left_tile');
        if( $post_object ):
          // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
    ?>
    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="col bg-secondary h-100">
        <div class="p-2">
          <h5 class="tag">
              <?php the_field('tile_category'); ?>
          </h5>
          <h4>
            <?php the_title(); ?>
          </h4>
          <p>
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of bottom left -->


  <div class="col-xs-12 col-sm-6 col-md-3 mb-3">
    <!-- beginning of bottom centre -->
    <?php
        $post_object = get_field('bottom_centre_tile');
        if( $post_object ):
          // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
        ?>
    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="col bg-success h-100">
        <div class="p-2">
          <h5 class="tag">
            <?php the_field('tile_category'); ?>
          </h5>
          <h5>
            <?php the_title(); ?>
          </h5>
          <p>
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of bottom centre -->



  <div class="col-xs-12 col-sm-6 col-md-6 pr-0 mb-3">
    <div class="b-dark tile-text p-2">
      <h4>Upcoming events</h4>
      <div class="d-flex p-2 flex-column">
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

      </div>
      <div class="text-right m-2">
        <a href="<?php echo site_url('/events'); ?>">
          <button type="button" class="btn btn-danger">All events</button>
        </a>
      </div>

    </div>


  </div>

</div> <!-- end of the bottom row -->












</div> <!-- end of middle row -->
