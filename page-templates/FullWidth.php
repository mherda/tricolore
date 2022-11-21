<?php
/**
* Template Name: Full Width Page
*
* @package PCC-TriColore

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
                $img = get_the_post_thumbnail_url($post, 'tyle');
                $tile_background = ( $img ? 'style="' . "background-image: url('{$img}')" . '"' . "\n" : "" ); // tri-black fallback

            ?>
              <a class="tyle"
                href="<?php the_field('tile_link'); ?>"
                <?php echo $tile_background; ?>
                >
                <?php
                if ($post) { ?>
                <div class="caption">
                    <p class="tag"><?php echo $tile_cat; ?></p>
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo $post->post_content; ?></p>
                </div>
                <?php
                } else { ?>
                    <!-- Error: Please specify a tile to be displayed. -->
                <?php }
                wp_reset_postdata();
                ?>
              </a>

            <?php } // end while
            wp_reset_postdata();
            } // end if ?>
            
          </div>




        </main><!-- #main -->

      </div><!-- #primary -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>