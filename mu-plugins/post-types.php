<?php
add_theme_support('post-thumbnails');

function post_types() {
        register_post_type('tile', array(
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'exclude_from_search' => true,
            'labels' => array(
                'name' => 'Tiles',
                'add_new_item' => 'Add New tile',
                'edit_item' => 'Edit Tile',
                'all_items' => 'All Tiles',
                'singular_name' => 'Tile'
            ),
            'menu_icon' => 'dashicons-align-center',
            'taxonomies' => array( 'category' ),
            'capability_type' => 'post',
            'map_meta_cap' => true
        ));

        register_post_type('event', array(
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Events',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Events',
                'singular_name' => 'Event'
            ),
            'menu_icon' => 'dashicons-calendar-alt'
        ));

        register_post_type('news', array(
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'News',
                'add_new_item' => 'Add News',
                'edit_item' => 'Edit News',
                'all_items' => 'All News',
                'singular_name' => 'News'
            ),
            'menu_icon' => 'dashicons-calendar-alt'
        ));
        
        register_post_type('slide', array(
            'has_archive' => true,
            'rewrite' => array('slug' => 'slides'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'labels' => array(
                'name' => 'Slides',
                'add_new_item' => 'Add New Slide',
                'edit_item' => 'Edit Slide',
                'all_items' => 'All Slides',
                'singular_name' => 'Slide'
            ),
            'menu_icon' => 'dashicons-images-alt2'
        ));
    

}


add_action('init', 'post_types');
?>
