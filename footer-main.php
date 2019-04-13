<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
?>

<div class="wrapper" id="wrapper-footer">

		<div class="row bg-dark text-white">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<div class="row m-3 notFull mx-auto">
							<div class="col-md-2">
								<h3 class="mb-2">Find us at</h3>
								<p><a href="https://www.facebook.com/groups/206843416040902/" target="_blank"><i class="text-light fa fa-lg fa-facebook"></i><span class="text-light"> Facebook</span></a></p>
								<p><a href="https://twitter.com/pengecycleclub?lang=en" target="_blank"><i class="text-light fa fa-lg fa-twitter"></i><span class="text-light"> Twitter</span></a></p>
								<p><a href="https://www.youtube.com/channel/UCldNfBQKDUfxZzQcYkKVSmw" target="_blanl"><i class="text-light fa fa-lg fa-youtube"></i><span class="text-light"> Youtube</span></a></p>
							</div>
							<div class="col-md-5">
								<p><a href="https://www.flickr.com/photos/pengecc/" target="_blank"><i class="text-light fa fa-lg fa-flickr"></i><span class="text-light"> Flickr</span></a></p>
								<?php echo do_shortcode("[flickr_tags user_id='69040456@N07' tags='PengeCycleClub' max_num_photos='6']"); ?>


							</div>

							<div class="col-md-5">
								<p><a href="https://www.strava.com/clubs/penge-cc" target="_blank"><i class="text-light fa fa-lg fa-strava"></i><span class="text-light"> Strava</span></a></p>
								<iframe allowtransparency frameborder='0' height='160' scrolling='no' src='https://www.strava.com/clubs/3542/latest-rides/ad3894ba26fc7b110e5bd78b3ada38124360b6d5?show_rides=false' width='100%'></iframe>

							</div>


						</div>


						<div class="row p-3 abs-par">
							<div class="row h-100 w-75 mx-auto align-items-center bg-white abs-chi">
								<?php
									for ($i = 1; $i <= 5; $i++) { ?>
										<img class="mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/affiliations/<?php echo $i; ?>.png" />
									<?php }
								?>

							</div>
						</div>

						<div class="row b-black">

							<div class="d-flex flex-column m-3 p-3 w-75 mx-auto">
								<div class="text-center mb-1 mt-5">
									<p>A big thank you to all our sponsors!</p>
								</div>
								<div class="text-center mb-3">
									<img class="mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/assets/sponsors/sponsor_logos.png" />
								</div>
								<div class="text-center mt-2 t-dark">
									<p>&copy; Penge Cycle Club 2018. All rights reserved</p>
								</div>

							</div>
						</div>



						</div>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>


</body>

</html>
