<?php
							$today = date('Ymd');
							$pastEvents = new WP_Query(array(
								'paged' => get_query_var('paged', 1),
								'post_type' => 'event',
								'meta_key' => 'event_date',
								'orderby' => 'meta_value_num',
								'order' => 'DESC',
								'meta_query' => array(
								array(
									'key'=> 'event_date',
									'compare' => '<',
									'value' => $today,
									'type' => 'numeric'
									)
								)
							));

							if ( $pastEvents->have_posts() ) {
						    	while ( $pastEvents->have_posts() ) {
									$pastEvents->the_post();
									
									$event_d = new DateTime(get_field('event_date'));
									$event_month = $event_d->format('M');
									$event_day = $event_d->format('d');
									$event_year = $event_d->format('Y');
									$term_list = wp_get_post_terms($post->ID, 'event_category');
						?>
						        <div class="row border-top border-bottom m-1">
											<div class="col-md-2 bg-light d-flex align-items-center justify-content-center">
                				<div class="text-center pt-1">
                    			<h5><?php echo $event_day; ?> <?php echo $event_month; ?> <?php echo $event_year; ?></h5>
												</div>
            					</div>
						          <div class="col-md-10">
						            <div class="d-flex flex-column pt-2">
            						  <!-- :TODO: Link event title -->
						              <h3><?php the_title(); ?></h3>
						              <p>
						                <?php echo wp_trim_words(get_the_content(), 18); ?>
						                <a href="<?php the_permalink(); ?>">read more</a>
													</p>
													<nav>
                        		<div id="navmenu" class="events-categories">
                            	<ul class="text-right">
                            		<?php
                                	foreach($term_list as $term) {
                                    	echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                                	}
                            		?>
                            	</ul>
                        		</div>
                    			</nav>
						            </div>
						          </div>

						        </div>
						            <?php } // end while
							}
							echo paginate_links(array(
								'total' => $pastEvents->max_num_pages
							));

						?>

				<!-- :TODO: The pagination component -->
				<?php // :TODO: understrap_pagination(); ?>
