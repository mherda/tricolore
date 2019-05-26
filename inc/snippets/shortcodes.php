<?php

// Enable shortcodes in text areas
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

// Enable shortcodes
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

// Define an accordion shortcode
function acc_ride() {
  ob_start();
  get_template_part( 'element-templates/accordion-rides' );
  return ob_get_clean();
}


add_shortcode('acc_ride_shortcode', 'acc_ride' );