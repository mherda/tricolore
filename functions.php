<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Load Snippets
 */

require get_template_directory() . '/inc/snippets/shortcodes.php';


function penge_adjust_queries($query) {
    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
              'key'=> 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
            ));
    }
}

function taxonomy_event_category($query) {
    if (!is_admin() AND is_tax('event_category') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
              'key'=> 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
            ));
    }
}


add_action('pre_get_posts', 'penge_adjust_queries');
add_action('pre_get_posts', 'taxonomy_event_category');


function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    register_taxonomy_for_object_type( 'category', 'page' );
    }
   add_action( 'init', 'add_taxonomies_to_pages' );



   function wpse_get_category_parents( $id, $link = false, $separator = '/', $nicename = false, $visited = array(), $iscrumb=false ) {
    $chain = '';
    $parent = get_term( $id, 'category' );
    if ( is_wp_error( $parent ) ) {
        return $parent;
    }
    if ( $nicename ) {
        $name = $parent->slug;
    } else {
        $name = $parent->name;
    }
    if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
        $visited[] = $parent->parent;
        $chain .= wpse_get_category_parents( $parent->parent, $link, $separator, $nicename, $visited , $iscrumb);
    }
    if (is_rtl()){
        $sep_direction ='\\';
    } else {
        $sep_direction ='/';
    }
    if ($iscrumb){
        $chain .= '<li><span class="sep">'.$sep_direction.'</span><a href="' . esc_url( get_category_link( $parent->term_id ) ) . '"><span>'.$name.'</span></a></li>' . $separator ;
    } elseif ( $link && !$iscrumb) {
        $chain .= '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">'.$name.'</a>' . $separator ;
    } else {
        $chain .= $name.$separator;
    }
    return $chain;
}


function wpse_get_breadcrumbs() {
    global $wp_query;
        if (is_rtl()){
            $sep_direction ='\\';
        } else {
            $sep_direction ='/ ';
        }?>
    <div class="nav-breadcrumbs">
    <ul class="ml-0"><?php
        // Adding the Home Page  ?>
        <li><a href="<?php echo esc_url( home_url() ); ?>"><span> <?php bloginfo('name'); ?></span></a></li><?php
        if ( ! is_front_page() ) {
            // Check for categories, archives, search page, single posts, pages, the 404 page, and attachments
            if ( is_category() ) {
                $cat_obj     = $wp_query->get_queried_object();
                $thisCat     = get_category( $cat_obj->term_id );
                $parentCat   = get_category( $thisCat->parent );
                if($thisCat->parent != 0) {
                    $cat_parents = wpse_get_category_parents( $parentCat, true, '', false, array(), true );
                }
                if ( $thisCat->parent != 0 && ! is_wp_error( $cat_parents ) ) {
                    echo $cat_parents;
                }
                echo '<li><span class="sep">'.$sep_direction.'</span><a href="'.get_category_link($thisCat).'"><span>'.single_cat_title( '', false ).'</span></a></li>';
            } elseif ( is_archive() && ! is_category() ) { ?>
                <li><span class="sep"><?php echo $sep_direction;?></span> <?php _e( 'Archives' ); ?></li><?php
            } elseif ( is_search() ) { ?>
                <li><span class="sep"><?php echo $sep_direction;?></span> <?php _e( 'Search Results' ); ?></li><?php
            } elseif ( is_404() ) { ?>
                <li><span class="sep"><?php echo $sep_direction;?></span> <?php _e( '404 Not Found' ); ?></li><?php
            } elseif ( is_singular() ) {
                $category    = get_the_category();
                $category_id = get_cat_ID( $category[0]->cat_name );
                $cat_parents = wpse_get_category_parents( $category_id, true, '',false, array(), true );
                if ( ! is_wp_error( $cat_parents ) ) {
                    echo $cat_parents;
                }?>
                <li>
                    <a href="<?php the_permalink();?>"><span class="sep"><?php echo $sep_direction;?></span><?php the_title();?></a>
                </li><?php
            } elseif ( is_singular( 'attachment' ) ) { ?>
                <li>
                    <span class="sep"><?php echo $sep_direction;?></span> <?php the_title(); ?>
                </li><?php
            } elseif ( is_page() ) {
                $post = $wp_query->get_queried_object();
                if ( $post->post_parent == 0 ) { ?>
                    <li><?php _e( '<span class="sep">/</span>' ); the_title(); ?></li><?php
                } else {
                    $title = the_title( '','', false );
                    $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                    array_push( $ancestors, $post->ID );
                    foreach ( $ancestors as $ancestor ) {
                        if ( $ancestor != end( $ancestors ) ) { ?>
                            <li>
                                <span class="sep"><?php echo $sep_direction;?></span><a href="<?php echo esc_url( get_permalink( $ancestor ) ); ?>"> <span><?php echo strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ); ?></span></a>
                            </li><?php
                        } else { ?>
                            <li>
                                <span class="sep"><?php echo $sep_direction;?></span><?php echo strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ); ?>
                            </li><?php
                        }
                    }
                }
            }
        } ?>
    </ul></div><?php
}


add_filter('jpeg_quality', function($arg){return 100;});