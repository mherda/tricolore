<!-- Sidebar box for News navigation -->

<?php
global $wpdb;
global $wp;
$limit = 0;
$year_prev = null;
$url = home_url( $wp->request );
$parsed_url = explode('/',$url);
$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'news' GROUP BY month , year ORDER BY post_date DESC");
?>
<div class="menu">
    <ul class="year">
        <?php
        if ( is_year() ) {
            // This is a year archive
            echo "This is a yearly archive";
            $displayed_year = $parsed_url[4];
        } elseif ( is_month() ) {
            // This is a month archive
            echo "This is a monthly archive";
            $displayed_year = $parsed_url[4]; 
            $displayed_month = $parsed_url[5];
        } elseif ( is_singular() ) {
            // Is a single news post
            $displayed_year = get_the_date('Y');
            echo "This is a single news";
        } else {
            // This will be a 'term' archive
            $displayed_year = $months[0]->year;
            echo "That must be a term archive";
        }
        
        foreach($months as $month) :
        $year_current = $month->year;
        $current = $year_current == $displayed_year ? "active" : ""; /* current _entry_ Year */
        if ($year_current != $year_prev){
        if ($year_prev != null){
            echo "</ul><!-- .month -->\n\t\t\t</li><!-- .li-year -->\n";
        } ?>
        <li class="li-year<?php if ($current) echo " " . $current; ?>"><a href="<?php bloginfo('url') ?>/news/<?php echo $month->year; ?>/"><?php echo $month->year; ?></a>
            <ul class="month">
                <?php }
                    $y = $month->year;
                    $m = date("m", mktime(0, 0, 0, $month->month, 1, $month->year));
                    $ym = $y . "/" . $m; /* archive year and month for URL */
                    $cym = $displayed_year . "/" . $displayed_month; /* current _entry_ Year and Month */
                    $active_month = $ym == $cym ? "active_month" : "";
                ?>
                <li class="<?php if ($active_month) echo $active_month; ?>">
                    <a href="<?php bloginfo('url') ?>/news/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                        <?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>
                        <span class="archive-month">(<?php echo $month->post_count; ?>)</span>
                    </a>
                </li>
                <?php $year_prev = $year_current; ?>
                <?php endforeach; ?>
            </ul><!-- .month -->
        </li><!-- .li-year -->
    </ul><!-- .year -->
</div><!-- .menu -->

