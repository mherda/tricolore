<div id="front-tiles" class="grid">

<?php
    $posts = [
        'top_left_tile',
        'top_centre_tile',
        'top_right_tile'
    ];

    foreach ($posts as $title): ?>
        <div class="tyle">
            <?php
            $post = get_field($title);
            
            if ($post) { ?>
               
                <p><?php echo $post; ?></p>
            <?php 
            } else { ?>
                <p>nie ma</p>
            <?php }
            ?>
        </div>
    <?php endforeach; ?>
</div>



</div>