<div class="w-100 text-white mb-3">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/page_headers/chair.jpg" />

							<!--	<img src="<?php echo get_the_post_thumbnail($post->ID); ?>" /> -->
								<div class="b-green w-100 text-white p-1 pt-2">
                  <?php
                  if ( is_page() ) {
                    $display = get_the_title();
                  } elseif ( is_category() ) {
                    $display = "category";
                  } elseif ( is_archive() ) {
                      if ( is_post_type_archive() ) {
                        $display = post_type_archive_title();
                      } else {
                        $display = single_term_title('Events > ');
                      }
                  } elseif ( is_tax() ) {
                    $display = "taxonomy";
                  } elseif ( is_single() ) {
                    $display = ucwords(get_post_type()) . " > " . get_the_title();
                  } else {
                    $display = "WHAT THE hell is this?";
                  }
                  ?>
									<h5 class="pl-3"><?php echo esc_html( $display ); ?></h5>
								</div>	
</div>