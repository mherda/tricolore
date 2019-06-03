<?php
/**
 * Template Name: Full Width Zoom
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
			<!-- Load the page body header -->
			<?php get_template_part( 'element-templates/page-header' ); ?>
			
			<!-- Main content -->
			<div class="entry-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    
                    <!-- :TODO: edit links in all templates -->
                    <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
                <?php endwhile; // end of the loop. ?>
			</div>
			
        <div>
            <?php
              $tile_cat = get_cat_name(get_field('tile_category_container'));
            ?>
          </div>

          <div id="front-tiles" class="grid">
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
                // :TODO: Text tile if there is no background-image
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
                  <a class="parent-tile tyle"
                    href="<?php the_field('tile_link'); ?>"
                    >
                    <div class="caption">
                        <p class="tag"><?php echo $tile_cat; ?></p>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                  </a>
                <?php }
            ?>

            <?php } // end while
            wp_reset_postdata();
            } // end if ?>
            
          </div>




        </main><!-- #main -->

      </div><!-- #primary -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>