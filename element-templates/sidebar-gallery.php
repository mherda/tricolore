<?php
$tag =  get_field('gallery_tag');
$glink = get_field('gallery_link');
if ( $tag ) {
?>
<div class="gallery">
    <h3>Club photos on <a href="https://www.flickr.com/photos/pengecc/"><i class="fab fa-lg fa-flickr"></i>Flickr</a></h3>
    <!-- <?php the_title(); ?> -->
    <?php
    echo do_shortcode("[flickr_tags user_id='69040456@N07' tags=$tag max_num_photos='6']");
    ?>
</div>
<?php
} else {
    if ( $glink ) {
    ?>
    <div class="gallery">
        <h3>Event Gallery on <a href="<?php the_field('gallery_link'); ?>"><i class="fab fa-lg fa-flickr"></i>Flickr</a></h3>
        <?php $queried_object = get_queried_object(); ?>
        <p><?php echo $queried_object->post_title; ?></p>
    </div>
    <?php } else { ?>
        <!-- No Flickr tag supplied. -->
    <?php } // end elseif ?>
<?php } // end if ?>
