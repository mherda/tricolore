<?php

get_header('front');
$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );

?>
    <div class="wrapper" id="page-wrapper">
        <div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
            <div class="content-area" id="primary">
                <main class="site-main" id="main" role="main">

                    <!-- Top Row  -->

                    <div class="row">
                        <div class="col-md-8">
                            <!-- beginning of the main column -->

                            <!-- Breadcrumb, hero image then title -->
                            <?php get_template_part( 'element-templates/page-header' ); ?>



                            <div class="entry-content">

                                <?php
                                global $post;
                                $content = apply_filters('the_content', $post->post_content);
                                echo $content;
                                ?>

                            </div><!-- .entry-content -->

                            <?php get_template_part( 'element-templates/bottom_tiles1' ); ?>


                        </div> <!-- end of main column -->


                        <div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->

                            <?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>

                            <?php get_template_part( 'element-templates/rides-objects' ); ?>

                            <?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

                        </div> <!-- end of right column -->


                    </div> <!-- end of Top Row-->



                </main><!-- #main -->

            </div><!-- #primary -->





        </div><!-- Container end -->

    </div><!-- Wrapper end -->

<?php get_footer('main'); ?>