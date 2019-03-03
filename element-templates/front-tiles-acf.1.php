
<div class="row mb-3">
  <!-- beginning of TOP row -->

  <div class="col-xs-12 col-sm-6 col-md-4 tile pr-0 mb-3">
    <?php
                    $post_object = get_field('top_left_tile');
                    if( $post_object ): 
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post ); 
                      $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                    ?>
    <a class="tile-text" href="<?php the_field('tile_url'); ?>">
      <div class="img-overlay h-100">
        <?php
                        if ( $img ) { ?>
        <img src="<?php echo $img; ?>" />
        <?php } else { ?>
        <img src="https://via.placeholder.com/500x500" />
        <?php } ?>
      </div>
      <div class="d-flex align-items-start flex-column tile-overlay">
        <div class="mb-auto p-2">
          <h5><span class="tag pr-2 pl-2">
              <?php the_field('tile_category'); ?> </span></h5>
        </div>
        <div class="p-2 bg-secondary">
          <h3 class="p-2">
            <?php the_title(); ?>
          </h3>
          <p class="p-2">
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of top left -->



  <div class="col-xs-12 col-sm-6 col-md-4 tile pr-0 mb-3">
    <!-- beginning of top centre -->
    <?php
                    $post_object = get_field('top_centre_tile');
                    if( $post_object ): 
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post ); 
                      $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                    ?>
    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="img-overlay h-100">
        <?php
        if ( $img ) { ?>
        <img src="<?php echo $img; ?>" />
        <?php } else { ?>
        <img src="https://via.placeholder.com/500x500" />
        <?php } ?>
      </div>
      <div class="d-flex align-items-start flex-column tile-overlay">
        <div class="mb-auto p-2">
          <h5><span class="tag pr-2 pl-2">
              <?php the_field('tile_category'); ?> </span></h5>
        </div>
        <div class="p-2 bg-secondary">
          <h3 class="p-2">
            <?php the_title(); ?>
          </h3>
          <p class="p-2">
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of top centre -->



  <div class="col-xs-12 col-sm-6 col-md-4 tile pr-0 mb-3">
    <!-- beginning of top right -->
    <?php
                    $post_object = get_field('top_right_tile');
                    if( $post_object ): 
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post ); 
                      $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                    ?>
    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="img-overlay h-100">
        <?php
                        if ( $img ) { ?>
        <img src="<?php echo $img; ?>" />
        <?php } else { ?>
        <img src="https://via.placeholder.com/500x500" />
        <?php } ?>
      </div>
      <div class="d-flex align-items-start flex-column tile-overlay">
        <div class="mb-auto p-2">
          <h5><span class="tag pr-2 pl-2">
              <?php the_field('tile_category'); ?> </span></h5>
        </div>
        <div class="p-2 bg-secondary">
          <h3 class="p-2">
            <?php the_title(); ?>
          </h3>
          <p class="p-2">
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of top right -->

</div> <!-- end of TOP row -->


<div class="row mb-3">
  <!-- beginning of middle row -->

  <div class="col-xs-12 col-sm-6 col-md-6 mb-3">
    <!-- beginning of middle left -->
    <?php
                    $post_object = get_field('middle_left_tile');
                    if( $post_object ): 
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post ); 
                      $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
    ?>

    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="row text-white">
        <div class="col-5 mr-0 pr-0 d-none d-md-block">
          <img class="" src="<?php echo $img; ?>" />
        </div>
        <div class="col ml-0 bg-secondary">
          <h5 class="py-2"><span class="tag px-2">
              <?php the_field('tile_category'); ?> </span></h5>
          <div class="p-1">
            <h5>
              <?php the_title(); ?>
            </h5>
            <p>
              <?php echo $post->post_content; ?>
            </p>
          </div>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of middle left -->




  <div class="col-xs-12 col-sm-6 col-md-6 mb-3">
    <!-- beginning of middle right -->
    <?php
                    $post_object = get_field('middle_right_tile');
                    if( $post_object ): 
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post ); 
                      $img = get_the_post_thumbnail_url($post_id, 'frontTilePort');
    ?>

    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="row text-white">
        <div class="col-5 mr-0 pr-0 d-none d-md-block">
          <img class="" src="<?php echo $img; ?>" />
        </div>
        <div class="col ml-0 bg-secondary">
          <h5 class="py-2"><span class="tag px-2">
              <?php the_field('tile_category'); ?> </span></h5>
          <div class="p-1">
            <h5>
              <?php the_title(); ?>
            </h5>
            <p>
              <?php echo $post->post_content; ?>
            </p>
          </div>
        </div>
      </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of middle right -->

</div> <!-- end of middle row -->



<div class="row mb-3">
  <!-- beginning of the bottom row -->

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
          <h5><span class="tag px-2 my-2">
              <?php the_field('tile_category'); ?></span></h5>
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
          <h5><span class="tag px-2 my-2">
              <?php the_field('tile_category'); ?></span></h5>
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
            <h5>
              <?php the_title(); ?>
            </h5>
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