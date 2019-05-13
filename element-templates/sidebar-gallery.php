<div class="gallery">
    <?php
    $tag =  get_field('gallery_tag');
    $glink = get_field('gallery_link');
    if ( $tag ) { ?>
        <h3><?php the_title(); ?></h3>
        <p>More photos from the event are on Flickr:</p>
        <?php
        echo do_shortcode("[flickr_tags user_id='69040456@N07' tags=$tag max_num_photos='6']");
    } else {
        if ( $glink ) { ?>
            <h3>Event Gallery</h3>
            <?php $queried_object = get_queried_object(); ?>
            <p><?php echo $queried_object->post_title; ?></p>
            <p>More photos from the event are on Flickr:</p>
            <p>
                <a href="<?php the_field('gallery_link'); ?>" class="btn btn-danger">Event Gallery</a>
            </p>
        <?php } else { ?>
            <h3>Club Photo Gallery</h3>
            <p>More photos from our events are on Flickr:</p>
            <p>
                <a href="https://www.flickr.com/photos/pengecc/" class="btn btn-danger">Club Gallery</a>
            </p>
        <?php }
    }
    ?>
</div>
