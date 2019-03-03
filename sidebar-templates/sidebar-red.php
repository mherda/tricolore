<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'red-sidebar' ) ) {
	return;
}

?>


<div class="widget-area" id="red-sidebar" role="complementary">
<?php dynamic_sidebar( 'red-sidebar' ); ?>

</div><!-- #red-sidebar -->
