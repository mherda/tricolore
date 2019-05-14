<!-- Bottom tiles after content -->
<div class="grid"> <!-- :TODO: Home tile code to start with -->
    <!-- start of tile left column -->
    <?php
    $post_object = get_field('tile_placeholder_left');
    if( $post_object ):
        // override $post
        $post = $post_object;
        setup_postdata( $post );
        $img = get_the_post_thumbnail_url($post_id, 'frontTile');
        // $img = get_the_post_thumbnail_url($post_id, 'tyle'); // home tile
        $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback
    ?>
    <a class="tile-text tyle"
        href="<?php the_field('tile_link'); ?>"
        style="<?php echo $tile_background; ?>"
        >
        <div class="caption">
            <p class="tag"><?php the_field('tile_category'); ?> </p>
            <h2><?php the_title(); ?></h2>
            <p><?php echo $post->post_content; ?></p>
        </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
    <!-- end of tile left column -->

    <!-- start of tile right column -->
    <?php
    $post_object = get_field('tile_placeholder_right');
    if( $post_object ) {
        // override $post
        $post = $post_object;
        setup_postdata( $post );
        $img = get_the_post_thumbnail_url($post_id, 'frontTile');
        // $img = get_the_post_thumbnail_url($post_id, 'tyle'); // home tile
        $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback
    ?>
    <a class="tile-text tyle"
        href="<?php the_field('tile_link'); ?>"
        style="<?php echo $tile_background; ?>"
        >
        <div class="caption">
            <p class="tag"><?php the_field('tile_category'); ?></p>
            <h2><?php the_title(); ?></h2>
            <p><?php echo $post->post_content; ?></p>
        </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php } ?>
<!-- end of tile right column -->
</div> <!-- end of bottom tile row -->
