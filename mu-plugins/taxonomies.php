<?php
add_action('init', 'event_taxonomy');
add_action('init', 'sidebar_modules');
add_action('init', 'news_taxonomy');

function news_taxonomy() {
$labels = array(
'name'              => _x( 'News Category', 'Taxonomy General Name' ),
    'singular_name'     => _x( 'News Category', 'Taxonomy Singular Name' ),
    'search_items'      => __( 'Search News Category' ),
    'all_items'         => __( 'All News Categories' ),
    'parent_item'       => __( 'Parent News Category' ),
    'parent_item_colon' => __( 'Parent News Category:' ),
    'edit_item'         => __( 'Edit News Category' ),
    'update_item'       => __( 'Update News Category' ),
    'add_new_item'      => __( 'Add News Category' ),
    'new_item_name'     => __( 'New News Category' ),
    'menu_name'         => __( 'News Category' ),
  );

  $args = array(
    'hierarchical'      => true,     // like categories or tags
    'labels'            => $labels,
    'show_in_rest'      => true,
    'show_ui'           => true,     //  add the default UI to this taxonomy
    'show_admin_column'=> true,    // add the taxonomies to the wordpress admin
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'news-cat'),
  );

  register_taxonomy( 'news_tax', 'news', $args );
}



function event_taxonomy() {
  $labels = array(
    'name'              => _x( 'Event Category', 'Taxonomy General Name' ),
    'singular_name'     => _x( 'Event Category', 'Taxonomy Singular Name' ),
    'search_items'      => __( 'Search Event Category' ),
    'all_items'         => __( 'All Event Categories' ),
    'parent_item'       => __( 'Parent Event Category' ),
    'parent_item_colon' => __( 'Parent Event Category:' ),
    'edit_item'         => __( 'Edit Event Category' ),
    'update_item'       => __( 'Update Event Category' ),
    'add_new_item'      => __( 'Add Event Category' ),
    'new_item_name'     => __( 'New Event Category' ),
    'menu_name'         => __( 'Event Category' ), 
  );

  $args = array(
    'hierarchical'      => true,     // like categories or tags
    'labels'            => $labels,
    'public'            => true,
    'show_in_rest'      => true,
    'show_ui'           => true,     //  add the default UI to this taxonomy
    'show_admin_column'=> true,    // add the taxonomies to the wordpress admin
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'event'),
  );

  register_taxonomy( 'event_category', 'event', $args );
}

function sidebar_modules() {
  $labels = array(
    'name'              => _x( 'Sidebar Module Tag', 'Taxonomy General Name' ),
    'singular_name'     => _x( 'Sidebar Module Tag', 'Taxonomy Singular Name' ),
    'search_items'      => __( 'Search Sidebar Module Tag' ),
    'all_items'         => __( 'All Sidebar Modules Tags' ),
    'edit_item'         => __( 'Edit Sidebar Module Tag' ),
    'update_item'       => __( 'Update Sidebar Module Tag' ),
    'add_new_item'      => __( 'Add Sidebar Module Tag' ),
    'new_item_name'     => __( 'New Sidbar Module Tag' ),
    'menu_name'         => __( 'Sidbar Module Tag' ), 
  );

  $args = array(
    'hierarchical'      => true,     // like categories or tags
    'labels'            => $labels,
    'show_ui'           => true,     //  add the default UI to this taxonomy
    'show_admin_column'=> true,    // add the taxonomies to the wordpress admin
    'query_var'         => true,
  );

  register_taxonomy( 'sidebar_modules', 'page', $args );
}
