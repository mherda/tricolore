<div class="b-dark p-2 mb-2 text-white">
  <div class="m-2">

    <?php
      $tag =  get_field('gallery_tag');
      $glink = get_field('gallery_link');      
      if ( $tag ) { ?>
        <h3>Event Gallery</h3>
        <p>Click below for more photos from the event:</p>
        <p><?php the_title(); ?></p>
        <?php
          echo do_shortcode("[flickr_tags user_id='69040456@N07' tags=$tag max_num_photos='6']");
        } else {
          if ( $glink ) { ?>
            <h3>Event Gallery</h3>
            <?php $queried_object = get_queried_object(); ?>
            <p><?php echo $queried_object->post_title; ?></p>
            <p>Click below to see the event gallery</p>
            <p class="mt-3">
   
              <a href="<?php the_field('gallery_link'); ?>" role="button" target='_blank' class="btn btn-danger">Event Gallery</a>
            </p>
          <?php } else { ?>
            <h3>Club Photo Gallery</h3>
            <p>Click below to visit the club gallery</p>
            <p class="mt-3">
              <a href="https://www.flickr.com/photos/pengecc/" role="button" target='_blank' class="btn btn-danger">Club Gallery</a>
            </p>   
          <?php }
        }
    
?>
    
  </div>
</div>