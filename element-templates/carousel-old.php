<div id="carouselControls" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselControls" data-slide-to="1"></li>
    <li data-target="#carouselControls" data-slide-to="2"></li>
    <li data-target="#carouselControls" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
				$post_id = 10;
				$queried_post = get_post($post_id);
				$url = wp_get_attachment_url( get_post_thumbnail_id($queried_post), 'thumbnail' );
			?>
      <?php if($url) { ?>
      <img class="d-block w-100" src="<?php echo $url ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1250x500" alt="first slide">
      <?php } ?>
      <div class="carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php echo $queried_post->post_title; ?>
              </h5>
            </div>
            <h3 class="slide-text mb-2">
              <?php echo $queried_post->post_excerpt; ?>
            </h3>
            <p class="card-text">
              <?php echo $queried_post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <?php
				$post_id = 12;
				$queried_post = get_post($post_id);
				$url = wp_get_attachment_url( get_post_thumbnail_id($queried_post), 'thumbnail' );
			?>
      <?php if($url) { ?>
      <img class="d-block w-100" src="<?php echo $url ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1250x500" alt="first slide">
      <?php } ?>
      <div class="mb-3 carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php echo $queried_post->post_title; ?>
              </h5>
            </div>
            <h3 class="mb-2">
              <?php echo $queried_post->post_excerpt; ?>
            </h3>
            <p class="card-text">
              <?php echo $queried_post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <?php
				$post_id = 13;
				$queried_post = get_post($post_id);
				$url = wp_get_attachment_url( get_post_thumbnail_id($queried_post), 'thumbnail' );
			?>
      <?php if($url) { ?>
      <img class="d-block w-100" src="<?php echo $url ?>" alt="first slide">
      <?php } else { ?>
      <img class="d-block w-100" src="http://via.placeholder.com/1250x500" alt="first slide">
      <?php } ?>
      <div class="mb-3 carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php echo $queried_post->post_title; ?>
              </h5>
            </div>
            <h3 class="mb-2">
              <?php echo $queried_post->post_excerpt; ?>
            </h3>
            <p class="card-text">
              <?php echo $queried_post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <video autoplay loop muted class="d-block w-100">
        <source src="http://wp-ppp:8888/w/wp-content/uploads/2018/07/pengevideo-bw_1.mp4" type="video/mp4" style="width:100%; height: 500px;">        Your
        browser does not support the video tag.
      </video>
      <div class="mb-3 carousel-caption d-none d-md-block">
        <div class="card" style="width: 35rem;">
          <div class="card-body text-left">
            <div class="bg-swash">
              <h5 class="ml-3 mt-2 pl-1">
                <?php echo $queried_post->post_title; ?>
              </h5>
            </div>
            <h3 class="mb-2">
              <?php echo $queried_post->post_excerpt; ?>
            </h3>
            <p class="card-text">
              <?php echo $queried_post->post_content; ?>
            </p>
            <a href="#" class="btn btn-danger">Join our Club</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
    <span class="b-red carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
    <span class="b-green carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>