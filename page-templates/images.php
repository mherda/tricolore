<?php
/**
 * Template Name: Images
 *
 * Template for testing image sizes
 *
 * @package understrap
 */

get_header('test');
$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );
?>
<div
  class="wrapper" id="page-wrapper">
  <div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

        

          <div>
            
              
              <?php
                /* echo basename($template); */
                $img = get_the_post_thumbnail($post->ID);
	              if ( $img ) { ?>
                  <h2>The original size (depending on the markup/css might be shrunk in a browser):</h2>
                  <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                  <h2>Landing Page Hero</h2>
                  <?php echo get_the_post_thumbnail($post->ID, 'Landing Page Hero'); ?>
                  <h2>Homepage Carousel</h2>
                  <?php echo get_the_post_thumbnail($post->ID, 'Homepage Carousel'); ?>
                  <h2>Article Hero</h2>
                  <?php echo get_the_post_thumbnail($post->ID, 'Article Hero'); ?>
                  <h2>1/3 Tile</h2>
                  <?php echo get_the_post_thumbnail($post->ID, '1/3 Tile'); ?>
                  <h2>1/2 Tile Desktop</h2>
                  <?php echo get_the_post_thumbnail($post->ID, '1/2 Tile Desktop'); ?>
                  <h2>1/2 Tile Tablet</h2>
                  <?php echo get_the_post_thumbnail($post->ID, '1/2 Tile Tablet');
              
                } else {
                  ?> <h2>No Featured image selected</h2>
                <?php } ?>
              

<!--

  Notes from the image sizes: 
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
-->
          
        


          </div>


      </main><!-- #main -->

    </div><!-- #primary -->

  </div><!-- .row end -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

