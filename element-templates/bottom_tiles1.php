<?php
// Only add HTML if there is at least one tile:
if ( get_field('tile_placeholder_left')
    OR get_field('tile_placeholder_right') ) {
    $hasTiles == true;
?>

<!-- Bottom tiles after content -->
<div class="grid">
    
    <!-- start of tile left column -->
    <?php
    $post_object = get_field('tile_placeholder_left');
    if( $post_object ):
        // override $post
        $post = $post_object;
        setup_postdata( $post );
        $tile_cat = get_the_terms( $post, 'category');
        $img = get_the_post_thumbnail_url($post, '1/2 Tile Desktop');
        $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
    ?>
    <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
        <div class="caption">
            <p class="tag"><?php echo $tile_cat[0]->name; ?> </p>
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
        $tile_cat = get_the_terms( $post, 'category');
        $img = get_the_post_thumbnail_url($post, '1/2 Tile Desktop');
        $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback
    ?>
    <a class="tyle"
        href="<?php the_field('tile_link'); ?>"
        <?php echo $tile_background; ?>
        >
        <div class="caption">
            <p class="tag"><?php echo $tile_cat[0]->name; ?></p>
            <h2><?php the_title(); ?></h2>
            <p><?php echo $post->post_content; ?></p>
        </div>
    </a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php } ?>
    <!-- end of tile right column -->
    
</div> <!-- end of bottom tile row -->

<?php
} // endif
?>
