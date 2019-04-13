<div class="w-100 text-white mb-3">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/page_headers/chair.jpg" />

							<!--	<img src="<?php echo get_the_post_thumbnail($post->ID); ?>" /> -->
								<div class="b-green w-100 text-white p-1 pt-2">
                  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php
                    if(function_exists('bcn_display'))
                    {
                            bcn_display();
                    }?>
                  </div>
								</div>	
</div>