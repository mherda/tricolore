<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'blue-sidebar' ) ) {
	return;
}

?>


<div class="widget-area" id="blue-sidebar" role="complementary">
<?php dynamic_sidebar( 'blue-sidebar' ); ?>

</div><!-- #blue-sidebar -->
