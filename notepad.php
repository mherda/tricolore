<div class="col">
  <div class="card bg-dark h-100 text-white">
    <!--
    <?php
      $image = get_field('tile_background');
      if( !empty($image) ): ?>
      <img class="card-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?> -->
    <div class="card-img-overlay">
      <h5 class="card-title">
        <?php the_title(); ?>
      </h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This
        content is a little bit longer.</p>
      <p class="card-text">Last updated 3 mins ago</p>
    </div>
  </div>
</div>



<div class="row">
  <?php
						$args = array(
						 'post_type' => 'tile',
						 'posts_per_page' => '4'
						);
						// the query
						$query = new WP_Query( $args );

						// The Loop
							while ( $query->have_posts() ) {
								$query->the_post(); ?>

  <div class="col">
    <div class="card h-100">
      <img class="card-img" src="http://wp-ppp:8888/w/wp-content/uploads/2018/07/image3-150x150.png" alt="Card image">
      <div class="card-img-overlay">
        <p>
          <?php the_field('tile_category'); ?>
        </p>
        <h5 class="card-title">
          <?php the_title(); ?>
        </h5>
        <p class="card-text">
          <?php the_content(); ?>
        </p>
        <p>
          <?php the_field('tile_row'); ?>
        </p>
      </div>
    </div>
  </div>


  <?php }
					/* Restore original Post Data */
					wp_reset_postdata();
					?>

</div>


===== Custom fields


<?php
    var $meta = get_post_meta($post->id, "your-key", true);

    if(!empty($meta)):
?>
<aside>
  <?php echo $meta; ?>
</aside>

<?php endif; ?> ======= | 1 | 2 | 3 | 4 | 5 | 6 | // Front page grid-front .grid-front { display: grid; grid-template-columns:
repeat(6, 1fr); grid-template-rows: 1fr 1fr 1fr; grid-gap: 1em; } .grid-front > div { background-color: red; } .top-left
{ grid-column: 1 / 3; } .top-centre { grid-column: 3 / 5; } .top-right { grid-column: 5 / 7; } .middle-left { grid-row: 2;
grid-column: 1 / 4; } .middle-right { grid-row: 2; grid-column: 4 / 8; } .bottom-left { grid-row: 3; grid-column: 1 / 4;
} .bottom-right { grid-row: 3; grid-column: 4 / 8; } // accordion section{ float:left; width:100%; background: #43cea2; /*
fallback for old browsers */ background: -webkit-linear-gradient(to left, #185a9d, #43cea2); /* Chrome 10-25, Safari 5.1-6
*/ background: linear-gradient(to left, #185a9d, #43cea2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari
7+ */ padding:30px 0; } .card { -moz-box-direction: normal; -moz-box-orient: vertical; background-color: #fff; border-radius:
0.25rem; display: flex; flex-direction: column; position: relative; margin-bottom:1px; border:none; } .card-header:first-child
{ border-radius: 0; } .card-header { background-color: #f7f7f9; margin-bottom: 0; padding: 20px 1.25rem; border:none; } .card-header
a i{ float:left; font-size:25px; padding:5px 0; margin:0 25px 0 0px; color:#195C9D; } .card-header i{ float:right; font-size:30px;
width:1%; margin-top:8px; margin-right:10px; } .card-header a{ width:97%; float:left; color:#565656; } .card-header p{ margin:0;
} .card-header h3{ margin:0 0 0px; font-size:20px; font-family: 'Slabo 27px', serif; font-weight:bold; color:#3fc199; } .card-block
{ -moz-box-flex: 1; flex: 1 1 auto; padding: 20px; color:#232323; box-shadow:inset 0px 4px 5px rgba(0,0,0,0.1); border-top:1px
soild #000; border-radius:0; } .panel-title { position: relative; } .panel-title::after { content: "\f107"; color: white;
top: -2px; right: 0px; position: absolute; font-family: "FontAwesome" } .panel-title[aria-expanded="true"]::after { content:
"\f106"; } var key = "98b9c60e63066cc909ee48c92368ee4e"; var city = "London"; // My test case was "London" var url = "https://api.openweathermap.org/data/2.5/forecast";
$.ajax({ url: url, //API Call dataType: "json", type: "GET", data: { q: city, appid: key, units: "metric", cnt: "10" }, success:
function(data) { console.log('Received data:', data) // For testing var wf = ""; wf += "<h2>" + data.city.name + "</h2>";
// City (displays once) $.each(data.list, function(index, val) { wf += "<p>" // Opening paragraph tag wf += "<b>Day " + index
    + "</b>: " // Day wf += val.main.temp + "&degC" // Temperature wf += "<span> | " + val.weather[0].description + "</span>";
  // Description wf += "<img src='https://openweathermap.org/img/w/" + val.weather[0].icon + ".png'>" // Icon wf += "</p>"
// Closing paragraph tag }); $("#weather").html(wf); } });





<?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
<div class="row border-bottom mb-1">
  <div class="col-md-2 bg-light d-flex">
    <div class="align-self-center text-center">
      <?php
                $date = get_field('event_date');
                $date1 = date("j", strtotime($date));
                $date2 = date("F", strtotime($date));
                $date3 = date("Y", strtotime($date));

              ?>
      <p>
        <?php echo $date1; ?><br />
        <?php echo $date2; ?><br />
        <?php echo $date3; ?>
      </p>
    </div>
  </div>
  <div class="col-md-10">
    <div class="d-flex flex-column">
      <h3>
        <?php the_title(); ?>
      </h3>
      <p>
        <?php echo wp_trim_words(get_the_content(), 18); ?>
        <a href="<?php the_permalink(); ?>">read more</a>
      </p>
    </div>
  </div>

</div>
<?php } // end while
    } // end if

?> /// custom taxonomies

<?php
                $terms = get_terms( array( 
                  'taxonomy' => 'sidebar_modules',
                  'hide_empty' => false,
              ) ); 
              echo "<pre>"; 
              print_r($terms); 
             echo "/<pre>"; 
              ?>
<h3>
  DIVIDER</h3>