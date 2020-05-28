<!-- Sidebar box for News navigation
<div class="menu">
    <ul>
        <li>
            <a href="/"><i class="fa"></i>2019</a>
            <ul>
                <li><a href="/">January <span>(4)</span></a></li>
                <li><a href="/">February <span>(7)</span></a></li>
                <li><a href="/">March <span>(6)</span></a></li>
                <li><a href="/">April <span>(3)</span></a></li>
                <li><a href="/">May <span>(5)</span></a></li>
                <li><a href="/">June <span>(12)</span></a></li>
                <li><a href="/">July <span>(8)</span></a></li>
                <li><a title="You are here">September <span>(2)</span></a></li>
                <li><a href="/">October <span>(2)</span></a></li>
                <li><a href="/">November <span>(4)</span></a></li>
                <li><a href="/">December <span>(0)</span></a></li>
            </ul>
        </li>
        <li><a href="/"><i class="fa"></i>2018</a></li>
        <li><a href="/"><i class="fa"></i>2017</a></li>
        <li><a href="/"><i class="fa"></i>2016</a></li>
        <li><a href="/"><i class="fa"></i>2015</a></li>
        <li><a href="/"><i class="fa"></i>2014</a></li>
    </ul>
</div>
-->

<?php
global $wpdb;
$limit = 0;
$year_prev = null;
$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'news' GROUP BY month , year ORDER BY post_date DESC");
?>
<div class="menu">
    <ul class="year">
        <?php
        foreach($months as $month) :
        $year_current = $month->year;
        $current = $year_current == date('Y') ? "active" : "";
        if ($year_current != $year_prev){
        if ($year_prev != null){
            echo "</ul><!-- .month -->\n\t\t\t</li><!-- .li-year -->\n";
        } ?>
        <li class="li-year<?php if ($current) echo " " . $current; ?>"><a href="<?php bloginfo('url') ?>/news/<?php echo $month->year; ?>/"><?php echo $month->year; ?></a>
            <ul class="month">
                <?php } 
                    $y = $month->year;
                    $m = date("m", mktime(0, 0, 0, $month->month, 1, $month->year));
                    $ym = $y . "/" . $m; /* archive year and month */
                    $cym = date('Y') . "/" . date('m'); /* Current Year and Month */
                    $active_month = $ym == $cym ? "active" : "";
                ?>
                <li class="<?php if ($active_month) echo $active_month; ?>">
                    <a href="<?php bloginfo('url') ?>/news/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><span class="archive-month"><?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?> (<?php echo $month->post_count; ?>)</span></a>
                </li>
                <?php $year_prev = $year_current; ?>
                <?php endforeach; ?>
            </ul><!-- .month -->
        </li><!-- .li-year -->
    </ul><!-- .year -->
</div><!-- .menu -->

