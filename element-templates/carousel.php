<div id="carouselControls" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselControls" data-slide-to="1"></li>
    <li data-target="#carouselControls" data-slide-to="2"></li>

  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
        $post_object = get_field('slide_1');
        if( $post_object ):
         // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'thumbnail' );
        ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="first slide">
      <?php } ?>
      <div class="carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <h5 class="ml-3 mt-2 pl-1">
              <?php the_field('slide_tag'); ?>
            </h5>
            <h3 class="slide-text mb-2">
              <?php the_title(); ?>
            </h3>
            <p class="card-text">
              <?php echo $post->post_content; ?>
            </p>
            <a href="/join/" class="btn btn-danger">Join our Club</a>
            <a href="#" class="btn btn-success">Try a ride</a>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>

    <div class="carousel-item">
      <?php
                    $post_object = get_field('slide_2');
                    if( $post_object ):
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post );
                      $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'thumbnail' );
                    ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="first slide">
      <?php } ?>
      <div class="carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php the_field('slide_tag'); ?>
              </h5>
            </div>
            <h3 class="slide-text mb-2">
              <?php the_title(); ?>
            </h3>
            <p class="card-text">
              <?php echo $post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>




    <div class="carousel-item">
      <?php
                    $post_object = get_field('slide_3');
                    if( $post_object ):
                     // override $post
                      $post = $post_object;
                      setup_postdata( $post );
                      $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'thumbnail' );
                    ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="first slide">
      <?php } ?>
      <div class="carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php the_field('slide_tag'); ?>
              </h5>
            </div>
            <h3 class="slide-text mb-2">
              <?php the_title(); ?>
            </h3>
            <p class="card-text">
              <?php echo $post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>





    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
      <span class="b-red carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
      <span class="b-green carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> <!-- end of carousel-inner -->
</div> <!-- end of carousel controls -->