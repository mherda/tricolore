<?php 
$cat = get_category_by_slug('news');
$cat_id = $cat->term_id;
$child_categories=get_categories(
    array( 'parent' => $cat_id )
);

?>

<!-- Announcement categories -->
<nav id="nav_events">
    <div id="navmenu">
    <?php
    // Needed to establish if this is current category
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
    // See if that's the top level category
    $queried_object = get_queried_object();
    $is_top = ($queried_object->category_parent == 0) ? TRUE: FALSE;
    ?>
        <ul class="pagination">
            <li class="page-item <?php echo ($is_top) ? 'active' : ''; ?>"><a class="page-link current" href="<?php echo get_category_link($cat_id); ?>">All</a></li>
            <?php          
                foreach($child_categories as $child) {
                    $is_active = (!$is_top AND $child->name == $categories[0]->name) ? "active" : "";
                    echo '<li class="page-item '.$is_active.'"><a class="page-link" href="'.get_term_link($child).'">'.$child->name.'</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>

    



<?php if ( have_posts() ) : ?>
							
							<div class="entry-content">
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
								
								<?php
								get_template_part( 'loop-templates/content-news', get_post_format() );
								?>

								<?php endwhile; ?>
								
								<!-- The pagination component -->
								<?php understrap_pagination(); ?>
								
							</div>
								
							<?php else : ?>

								<?php get_template_part( 'loop-templates/content', 'none' ); ?>

							<?php endif; ?>

						






