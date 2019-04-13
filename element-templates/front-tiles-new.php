<div id="front-tiles" class="grid">

  
  <!-- beginning of TOP row -->

    <?php
      $post_object = get_field('top_left_tile');
      if( $post_object ): 
        // override $post
        $post = $post_object;
        setup_postdata( $post ); 
        $img = get_the_post_thumbnail_url($post_id, 'frontTile');
        $tile_background = ( $img ? "background: url({$img});" : "background-color: green;" );
    ?>

  
    <div class="tyle" style="<?php echo $tile_background; ?>">

        
        <div class="p-2">
          <h3 class="p-2">
            <?php the_title(); ?>
          </h3>
          <p class="p-2">
            <?php echo $post->post_content; ?>
          </p>
        </div>
      </div>
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
    <?php endif; ?>



  <div class="tyle">
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



  <div class="tyle">
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





        </div> <!-- end of grid -->