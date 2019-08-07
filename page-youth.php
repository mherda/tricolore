<?php
/**
 * Template Name: Youth - Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

  <div class="<?php echo esc_attr( $container ); ?> notFull" id="content">

      <div class="content-area" id="primary">

        <main class="site-main" id="main" role="main">
          <div class="row">
            <div class="col-md-8">
              <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php
                if(function_exists('bcn_display')) {
                    bcn_display();
                }?>
              </div>
              
              <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'loop-templates/content', 'page' ); ?>
              <?php endwhile; // end of the loop. ?>
              
              <?php
              $tile_cat = get_cat_name(get_field('tile_category_container'));
              ?>

              <div class="grid">
                <?php
                  $tile_selection = new WP_Query(array(
    								'posts_per_page' => -1,
                    'post_type' => 'tile',
                    'category_name' => $tile_cat
    								)
                  );

                  if ( $tile_selection->have_posts() ) {
                    while ( $tile_selection->have_posts() ) {
                    $tile_selection->the_post();
                    $img = get_the_post_thumbnail_url($post_id, 'tyle');
                    $tile_background = ( $img ? "background-image: url({$img});" : "" ); // tri-green fallback

                    if ( $img ) { ?>
                    <a class="tyle"
                        href="<?php the_field('tile_link'); ?>"
                        style="<?php echo $tile_background; ?>"
                        >
                        <div class="caption">
                            <p class="tag"><?php echo $tile_cat; ?></p>
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </a>

                    <?php } else { ?>
                      <a class="tyle"
                        href="<?php the_field('tile_link'); ?>"
                        >
                        <div class="caption">
                            <p class="tag"><?php echo $tile_cat; ?></p>
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                      </a>
                    <?php } ?>

                <?php } // end while
                wp_reset_postdata();
                } // end if ?>
              </div>
            </div> <!-- end of left column -->
            
            
            <div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
                
                <?php get_template_part( 'element-templates/sidebar-events' ); ?>

                <?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
                
            </div> <!-- end of right column -->



          </div>




        </main><!-- #main -->

      </div><!-- #primary -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
