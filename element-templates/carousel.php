<div id="carouselControls" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselControls" data-slide-to="1"></li>
    <!-- <li data-target="#carouselControls" data-slide-to="2"></li> -->
    <!-- <li data-target="#carouselControls" data-slide-to="3"></li> -->
  </ol>

  <!-- Carousel -->
  <div class="carousel-inner">



    <!-- Carousel: Slide 1 -->
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
      <img class="d-block w-100" src="<?php echo $img ?>" alt="">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="">
      <?php } ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag">
              <?php the_field('slide_tag'); ?>
            </p>
            <h2 class="slide-text">
              <?php the_title(); ?>
            </h2>
            <p class="card-text">
              <?php echo $post->post_content; ?>
            </p>
            <p>
                <a href="<?php echo the_field('slide_page_link'); ?>" class="btn btn-lg">Free ride for Adult</a>
                <a href="<?php echo $post->post_excerpt; ?>" class="btn btn-lg btn-success">Join as an Adult</a>
            </p>
          </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>



    <!-- Carousel: Slide 2 -->
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
      <img class="d-block w-100" src="<?php echo $img ?>" alt="">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="">
      <?php } ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag">
                <?php the_field('slide_tag'); ?>
            </p>
            <h2 class="slide-text">
              <?php the_title(); ?>
            </h2>
            <p class="card-text">
              <?php echo $post->post_content; ?>
            </p>
            <p>
                <a href="<?php echo the_field('slide_page_link'); ?>" class="btn btn-lg">Free ride for Youth</a>
                <a href="<?php echo $post->post_excerpt; ?>" class="btn btn-lg btn-success">Join as a Youth</a>
            </p>
          </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
    
    
    
    <!-- Carousel: Slide 3 -->
    <!--
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
      <img class="d-block w-100" src="<?php echo $img ?>" alt="">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="">
      <?php } ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag"><?php the_field('slide_tag'); ?></p>
            <h2 class="slide-text"><?php the_title(); ?></h2>
            <p class="card-text"><?php echo $post->post_content; ?></p>
            <p><a class="btn btn-lg" href="<?php echo the_field('slide_page_link'); ?>">Join our Club</a></p>
          </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
    -->
    
    
    
    <!-- Carousel: Slide 3 -->
    <!--
    <div class="carousel-item">
      <?php
        $post_object = get_field('slide_4');
        if( $post_object ):
         // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'thumbnail' );
        ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="">
      <?php } ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag"><?php the_field('slide_tag'); ?></p>
            <h2 class="slide-text"><?php the_title(); ?></h2>
            <p class="card-text"><?php echo $post->post_content; ?></p>
            <p><a class="btn btn-lg" href="<?php echo the_field('slide_page_link'); ?>">Join our Club</a></p>
          </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
    -->



    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> <!-- end of carousel-inner -->
</div> <!-- end of carousel controls -->
