
<?php
if ( is_page() ) {
  $display = get_the_title();
} elseif ( is_category() ) {
  $display = "category";
} elseif ( is_archive() ) {
  $display = "archivum";
} elseif ( is_tax() ) {
  $display = "taxonomy";
} else {
  $display = "WHAT THE hell is this?";
}
echo esc_html( $display ); 
?>	