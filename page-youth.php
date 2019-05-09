<?php
/**
 * Template Name: Youth - Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('front');


?>

<div class="wrapper" id="page-wrapper">

  <div class="<?php echo esc_attr( $container ); ?> notFull mx-auto" id="content">

    <div class="row">

      <div class="col-md-12 content-area" id="primary">

        <main class="site-main" id="main" role="main">
          <div class="row mb-2">
            <div class="col-md-8">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php
          if(function_exists('bcn_display'))
          {
                  bcn_display();
          }?>
        </div>
          <div>
            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'loop-templates/content', 'page' ); ?>
            <?php endwhile; // end of the loop. ?>
            <?php
              $tile_cat = get_cat_name(get_field('tile_category_container'));
            ?>
          </div>

          <div class="mt-3 grid">
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
                $img = get_the_post_thumbnail_url($post_id, 'frontTile');
                $tile_background = ( $img ? "background: url({$img});" : "" ); // tri-green fallback

                if ( $img ) { ?>
                <a class=" tile-text" href="<?php the_field('tile_link'); ?>">
                    <div class="d-flex flex-column justify-content-between h-100 outer-tile">
                      <div class="mb-auto p-2">
                      <div class="inner-tile text-white" style="<?php echo $tile_background; ?>"></div>

                        <span class="b-dark p-1"><?php echo $tile_cat; ?></span>
                      </div>
                      <div class="b-dark w-100 p-2 ti">
                        <h5><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                      </div>
                  </div> <!-- end of d-flex -->
                </a>

                <?php } else { ?>
                  <a class="parent-tile tile-text" href="<?php the_field('tile_link'); ?>">
                  <div class="grid-tile text-white" style="<?php echo $tile_background; ?>">
                    <div class="p-2"><span class="b-dark p-1"><?php echo $tile_cat; ?></span></div>
                    <div class="w-100 p-3">
                      <h3><?php the_title(); ?></h3>
                      <?php the_content(); ?>
                    </div>
                  </div>
                  </a>
                <?php }
            ?>



            <?php } // end while
            wp_reset_postdata();
            } // end if ?>
          </div>
        </div> <!-- end of left column -->
        <div class="col-md-4"> <!-- beginning of Sidebar -->

          

          <div>
            <?php get_template_part( 'element-templates/sidebar-events' ); ?>
          </div>

         <?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
        </div> <!-- end of right column -->



          </div>




        </main><!-- #main -->

      </div><!-- #primary -->

    </div><!-- .row end -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
