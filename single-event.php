<?php

if ( $post->hq_id ) {
	$post_id = $post->hq_id;
	$request_root = "https://api.riderhq.com/api/v1/3446/getevent?eventid=";
	$single_request = wp_remote_get( $request_root . $post_id );

	if( is_wp_error( $request ) ) {
    echo "wrong request";
		return false; // Bail early
	}

	function utf8ize($mixed) {
		if (is_array($mixed)) {
		foreach ($mixed as $key => $value) {
		$mixed[$key] = utf8ize($value);
		}
		} else if (is_string ($mixed)) {
		return utf8_encode($mixed);
		}
		return $mixed;
		}
	
	$body = wp_remote_retrieve_body( $single_request );
	$data = json_decode(utf8ize($body), true);
	$event_details = $data['event'];

	$e_desc = $event_details['organiser_description_html'];

	if ( ! add_post_meta( get_the_ID(), 'event_description', $e_desc, true ) ) { 
		update_post_meta ( get_the_ID(), 'event_description', $e_desc );
	}
} 


// End of API request related code


get_header('front');
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?> notFull" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					
					<div class="row"> <!-- Beginning of Content -->
						<div class="col-md-8"> <!-- beginning of main column -->
							<?php get_template_part( 'element-templates/page-header' ); ?>

							<div class="entry-content">
								<?php
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										
										$event_d = new DateTime(get_field('event_date'));
										$event_month = $event_d->format('F'); // full month
										$event_day = $event_d->format('l j');
										$event_year = $event_d->format('Y');
										$event_display = $event_day . " " . $event_month . " " . $event_year;
								?>
								<h3>Event Date: <?php echo $event_display; ?></h3>
								
								<!-- <img src="<?php the_post_thumbnail('eventFeatured'); ?>" /> -->
								<?php 

								$event_uri = get_post_meta($post->ID, 'event_uri');
								$entries_close_date = get_post_meta($post->ID, 'entries_close_date');
								$event_meta_desc = get_post_meta( get_the_ID(), 'event_description' );

								
								if ( $entries_close_date ) {
									$close_date = new DateTime($entries_close_date[0]);
									echo '<p>Entries close date: '.$close_date->format('d-m-Y').'</p>';
									$now =  new DateTime();
									if ( $close_date > $now ) {
										if ( $event_uri ) {
											echo '<p></p><a class="btn" href="'.$event_uri[0].'">Join on RiderHQ</a></p>';
										}
									} else {
										echo "<p></p>Event closed for entries.</p>";
									}
								}

								if ( $event_meta_desc ) {
									echo $event_meta_desc[0];
								}

								the_content(); ?>
								<?php
									} // end while
								} // end if
								?>

							</div> <!-- .entry-content -->
														
						</div> <!-- end of main column -->
						
						
						<div class="col-md-4 sidebar"> <!-- beginning of Sidebar -->
							
							<?php get_template_part( 'element-templates/sidebar-upcoming-events' ); ?>
																				
						</div> <!-- End of Side -->
						
					</div><!-- end of content-row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer('main'); ?>
