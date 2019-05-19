<!-- :TODO: is this file used? -->
<?php

// Enable shortcodes in text areas
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

// Enable shortcodes
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');


function top_left() {
    ob_start(); ?>
<div
  class="tile m-2">
  <?php
       $post_id = 43;
       $queried_post = get_post($post_id);
       $title = get_field('tile_title', $post_id);
       $img = get_the_post_thumbnail_url($post_id, 'frontTile');
       $tag = get_field('tile_category', $post_id);
       $link = get_field('tile_link', $post_id);
     ?>
  <a class="tile-text" href="<?php echo $link; ?>">
    <div class="img-overlay bg-success h-100">
      <img src="<?php echo $img; ?>" />
    </div>
    <div class="d-flex align-items-start flex-column tile-overlay">
      <div class="mb-auto p-2">
        <h5><span class="tag pr-2 pl-2">
            <?php echo $tag; ?> </span></h5>
      </div>
      <div class="p-2 bg-secondary">
        <h3 class="p-2">
          <?php echo $title; ?>
        </h3>
        <p class="p-2">
          <?php echo $queried_post->post_content; ?>
        </p>
      </div>
    </div>


  </a>
</div>


<?php
    return ob_get_clean();
}

add_shortcode('my_shortcode', 'top_left');






function tile_shortcode_function() {
    ob_start(); ?>
<div
  class="tile m-2">
  <?php
       $post_id = 43;
       $queried_post = get_post($post_id);
       $title = get_field('tile_title', $post_id);
       $img = get_the_post_thumbnail_url($post_id, 'frontTile');
       $tag = get_field('tile_category', $post_id);
       $link = get_field('tile_link', $post_id);
     ?>
  <a class="tile-text" href="<?php echo $link; ?>">
    <div class="img-overlay bg-success h-100">
      <img src="<?php echo $img; ?>" />
    </div>
    <div class="d-flex align-items-start flex-column tile-overlay">
      <div class="mb-auto p-2">
        <h5><span class="tag pr-2 pl-2">
            <?php echo $tag; ?> </span></h5>
      </div>
      <div class="p-2 bg-secondary">
        <h3 class="p-2">
          <?php echo $title; ?>
        </h3>
        <p class="p-2">
          <?php echo $queried_post->post_content; ?>
        </p>
      </div>
    </div>


  </a>
</div>


<?php
    return ob_get_clean();
}

add_shortcode('tile_shortcode', 'tile_shortcode_function');


function acc_ride() {
  ob_start();
  get_template_part( 'element-templates/accordion-rides' );
  return ob_get_clean();
}


add_shortcode('acc_ride_shortcode', 'acc_ride' );