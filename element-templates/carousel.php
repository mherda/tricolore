<div id="carouselControls" class="carousel slide carousel-slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselControls" data-slide-to="1"></li>
    <?php // Slides 3 and 4 and not mandatory
      $count = 1;
      $post_object_3 = get_field('slide_3');
      $post_object_4 = get_field('slide_4');
      if($post_object_3) {
        $count += 1;
        ?>
          <li data-target="#carouselControls" data-slide-to="<?php echo $count; ?>"></li>
      <?php }
      if($post_object_4) {
          $count += 1;
        ?>
          <li data-target="#carouselControls" data-slide-to="<?php echo $count; ?>"></li>
        <?php }
        $count = 1;
        ?>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
        $post_object = get_field('slide_1');
        if( $post_object ):
         // override $post
          $post = $post_object;
          setup_postdata( $post );
          $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'Homepage Carousel' );
        ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="first slide">
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
            <!-- :TODO: Button text as a field in carousel slides -->
            <p>
                <a href="<?php echo the_field('slide_page_link'); ?>" class="btn btn-lg">Join as an adult</a>
                <a href="<?php echo $post->post_excerpt; ?>" class="btn btn-lg btn-success">First ride for adults</a>
            </p>
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
                      $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'Homepage Carousel' );
                    ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1040x500" alt="first slide">
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
            <!-- :TODO: Button text as a field in carousel slides -->
            <p>
                <a class="btn btn-lg" href="<?php echo the_field('slide_page_link'); ?>">Join as a youth</a>
                <a href="<?php echo $post->post_excerpt; ?>" class="btn btn-lg btn-success">Free session for youths</a>
            </p>
          </div>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post™™£ object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>



    <?php
      if( $post_object_3 ) {
        ?>
    <div class="carousel-item">
      <?php
         // override $post
          $post = $post_object_3;
          setup_postdata( $post );
          $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'Homepage Carousel' );
        ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php }  ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag"><?php the_field('slide_tag'); ?></p>
            <h2 class="slide-text"><?php the_title(); ?></h2>
            <p class="card-text"><?php echo $post->post_content; ?></p>
            <p><a class="btn btn-lg" href="<?php echo the_field('slide_page_link'); ?>">
                <?php echo $post->post_excerpt; ?>
            </a></p>
          </div>
      </div>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post
    } ?>


    <?php
      if( $post_object_4 ) {
        ?>
    <div class="carousel-item">
      <?php
         // override $post
          $post = $post_object_4;
          setup_postdata( $post );
          $img = wp_get_attachment_url( get_post_thumbnail_id($post), 'Homepage Carousel' );
        ?>
      <?php if($img) { ?>
      <img class="d-block w-100" src="<?php echo $img ?>" alt="first slide">
      <?php }  ?>
      <div class="carousel-caption card d-none d-md-block">
          <div class="card-body">
            <p class="card-tag"><?php the_field('slide_tag'); ?></p>
            <h2 class="slide-text"><?php the_title(); ?></h2>
            <p class="card-text"><?php echo $post->post_content; ?></p>
            <p><a class="btn btn-lg" href="<?php echo the_field('slide_page_link'); ?>">
                <?php echo $post->post_excerpt; ?>
            </a></p>
          </div>
      </div>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post
    } ?>


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
