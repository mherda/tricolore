<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' ); // echo esc_attr( $container );
?>

<div class="wrapper" id="wrapper-footer">

	<footer class="<?php echo esc_attr( $container ); ?> site-footer" id="colophon">

		<div class="site-info notFull">

			<div class="row">
				<div class="col-md-2">
					<h3>Find us on</h3>
					<ul>
						<li><a href="https://www.facebook.com/groups/206843416040902/"><i class="fab fa-lg fa-facebook"></i>Facebook</a></li>
						<li><a href="https://twitter.com/pengecycleclub?lang=en"><i class="fab fa-lg fa-twitter"></i>Twitter</a></li>
						<li><a href="https://www.youtube.com/channel/UCldNfBQKDUfxZzQcYkKVSmw"><i class="fab fa-lg fa-youtube"></i>YouTube</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<h3><a href="https://www.flickr.com/photos/pengecc/"><i class="fab fa-lg fa-flickr"></i>Flickr</a></h3>
					<?php echo do_shortcode("[flickr_tags user_id='69040456@N07' tags='PengeCycleClub' max_num_photos='6']"); ?>
				</div>
				<div class="col-md-4">
					<h3><a href="https://www.strava.com/clubs/penge-cc"><i class="fab fa-lg fa-strava"></i>Strava</a></h3>
					<iframe allowtransparency frameborder='0' height='160' scrolling='no' src='https://www.strava.com/clubs/3542/latest-rides/ad3894ba26fc7b110e5bd78b3ada38124360b6d5?show_rides=false' width='100%'></iframe>
				</div><!--col end -->
			</div><!-- row end -->


			<div class="row organisations">
				<div class="col-md-12 col-lg-8 mx-auto">
					<ul>
						<?php
						for ($i = 1; $i <= 5; $i++) {
							echo '<li><img height="60" alt="" src="' . get_template_directory_uri() . '/assets/affiliations/' . $i . '.png" /></li>';
						}
						?>
				</ul>
				</div><!--col end -->
			</div><!-- row end -->

		</div><!-- .site-info -->

		<div class="row copyright">
			<div class="col-md-auto">
				<h3>A big thank you to all our sponsors!</h3>
				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/sponsors/sponsor_logos.png" /></p>
				<p>&copy; Penge Cycle Club 2019. All rights reserved.</p>
			</div><!--col end -->
		</div><!-- row end -->

	</footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>


</body>

</html>
