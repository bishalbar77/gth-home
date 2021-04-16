<?php 
include 'wp-load.php';



$args = array( 'numberposts' => '3' );

$recent_posts = wp_get_recent_posts($args);
foreach( $recent_posts as $recent ){ 
	?>

        <!--- blog post 3 -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="blog-post-box">
                <!--- image -->
                <figure> 
                	<?php
                	$featured_img_url = get_the_post_thumbnail_url($recent["ID"],'full');
                	if(!empty($featured_img_url)){ ?>
                		<img src="<?php echo $featured_img_url; ?>" /> 
                	<?php } else { ?>
                		<img src="images/logos.png" class="load-image" /> 
                	<?php }
                	?>	    	
	            </figure>
                <div class="blog-post-content">
                    <!--- title -->
                    <a href="<?php echo get_permalink($recent["ID"]); ?>">
                    <h4><?php echo $recent["post_title"]; ?></h4>
                    </a>
                    <span>
                    	<?php 
              			 echo  get_the_date( 'd M Y', $recent["ID"] );  
						?>								
					</span>
                    <!--- paragraph -->
                    <p><?php
				    $trimmed_content = wp_trim_words( $recent['post_content'], 45, NULL );
				    echo $trimmed_content; ?>    	
				    </p>
                </div>
            </div>
            <a class="blog-more-button" href="<?php echo get_permalink($recent["ID"]); ?>" target="_blank">read more </a>
        </div>

<?php
}
?>