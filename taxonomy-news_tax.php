<?php

get_header('front');
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
        <div class="row">
            <div class="col-md-12 content-area" id="primary">
                <main class="site-main" id="main" role="main">

                    <div class="row"> <!-- Top Row  -->
                        <div class="col-md-8">
                            <!-- Load the page body header -->
                            <?php get_template_part( 'element-templates/page-header-generic' ); ?>

                            <!-- Main content -->
                            <div class="entry-content">
                                <!-- Events -->
                                <?php get_template_part( 'element-templates/main-news-term' ); ?>
                            </div>
                        </div>
                        <div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
                            <?php get_template_part( 'element-templates/sidebar-news' ); ?>
                            <?php get_template_part( 'element-templates/sidebar-gallery' ); ?>						

                        </div>

                    </div> <!-- end of Top Row-->



            </div>





            </main><!-- #main -->

            <!-- The pagination component -->
            <?php understrap_pagination(); ?>

        </div><!-- #primary -->

    </div><!-- .row end -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
