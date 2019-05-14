<!-- :TODO: Is this file used? -->
<hr />
<div class="row my-3 mr-2 row-eq-height">
  <!-- beginning of the bottom tile row -->
  <div class="col-xs-12 col-md-6 pr-0 mb-3 h-100">
    <!-- start of tile left column -->
    <?php
                    $post_object = get_field('tile_placeholder_left');
                    if( $post_object ):
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post );
                      $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                    ?>
    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
      <div class="img-overlay h-100">
      <?php if ( $img ) { ?>
        <img src="<?php echo $img; ?>" />
      <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/tiles/tile.jpg" />
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
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
  </div> <!-- end of tile left column -->

  <div class="col-xs-12 col-md-6 pr-0 h-100">
    <!-- start of tile left column -->
    <?php
                    $post_object = get_field('tile_placeholder_right');
                    if( $post_object ) {
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post );
                      $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                    ?>
                    <a class="tile-text" href="<?php the_field('tile_link'); ?>">
                      <div class="img-overlay h-100">
                        <?php if ( $img ) { ?>
                            <img src="<?php echo $img; ?>" />
                        <?php } else { ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/tiles/tile.jpg" />
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
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php } ?>
  </div> <!-- end of tile left column -->
</div> <!-- end of bottom tile row -->
