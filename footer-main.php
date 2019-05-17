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

	<footer class="<?php echo esc_attr( $container ); ?> site-footer notFull" id="colophon">

		<div class="row">

			<div class="col-md-12">

				<div class="site-info">

					<div class="row">
						<div class="col-md-2">
							<h3>Find us at</h3>
							<p><a href="https://www.facebook.com/groups/206843416040902/"><i class="fa fa-lg fa-facebook"></i>Facebook</a></p>
							<p><a href="https://twitter.com/pengecycleclub?lang=en"><i class="fa fa-lg fa-twitter"></i>Twitter</a></p>
							<p><a href="https://www.youtube.com/channel/UCldNfBQKDUfxZzQcYkKVSmw"><i class="fa fa-lg fa-youtube"></i>YouTube</a></p>
						</div>
						<div class="col-md-5">
							<h3><a href="https://www.flickr.com/photos/pengecc/"><i class="fa fa-lg fa-flickr"></i>Flickr</a></h3>
							<?php echo do_shortcode("[flickr_tags user_id='69040456@N07' tags='PengeCycleClub' max_num_photos='6']"); ?>
						</div>
						<div class="col-md-5">
							<h3><a href="https://www.strava.com/clubs/penge-cc"><i class="fa fa-lg fa-strava"></i>Strava</a></h3>
							<iframe allowtransparency frameborder='0' height='160' scrolling='no' src='https://www.strava.com/clubs/3542/latest-rides/ad3894ba26fc7b110e5bd78b3ada38124360b6d5?show_rides=false' width='100%'></iframe>
						</div>
					</div>


					<div class="row abs-par">
						<div class="row h-100 w-75 mx-auto align-items-center bg-white abs-chi">
							<?php
								for ($i = 1; $i <= 5; $i++) { ?>
									<img class="mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/affiliations/<?php echo $i; ?>.png" />
								<?php }
							?>
						</div>
					</div>

				</div><!-- .site-info -->

			</div><!--col end -->

		</div><!-- row end -->

		<div class="row b-black">
			<div class="col-md-12">
				<div class="text-center">
					<p>A big thank you to all our sponsors!</p>
				</div>
				<div class="text-center">
					<img class="mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/sponsors/sponsor_logos.png" />
				</div>
				<div class="text-center">
					<p>&copy; Penge Cycle Club 2019. All rights reserved</p>
				</div>
			</div><!--col end -->
			
		</div><!-- row end -->

	</footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>


</body>

</html>
