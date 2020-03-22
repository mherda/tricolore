<?php
function penge_features() {
    add_theme_support('post-thumbnails');
    add_image_size('frontTilePort', 250, 350, array( 'center', 'center' )); // Current - Home page tile image size  - portrait orientation
    add_image_size('pageHeader', 1399, 350, array( 'center', 'center' )); // Current - 
    add_image_size('Homepage Carousel', 1210, 540, true); // new
    add_image_size('Article Hero', 800, 267, true); // new
    add_image_size('Landing Page Hero', 1210, 300, true); // new
    add_image_size('1/3 Tile', 390, 350, true); // new
    add_image_size('1/2 Tile Desktop', 290, 350, array('center', 'center' )); // new - Home page, image required 
    add_image_size('1/2 Tile Tablet', 188, 350, array('center', 'center' )); // new - Home page, on some tablets
    add_image_size('tyle', 350, 350, array('center', 'center' )); // Current - tile image size, Home page and sub pages
}

add_action('after_setup_theme', 'penge_features');

?>
