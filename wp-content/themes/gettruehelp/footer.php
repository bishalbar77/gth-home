<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

    <footer class="site-footer section-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- SOCIAL ICONS -->
                    <div class="site-social-icons">
	                	<?php $facebook = get_field("facebook_social_url", "options"); 
	                	if(!empty($facebook)){ ?>	                 
		                        <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>	                    
	                	<?php } ?>

	                	  	<?php $twitter = get_field("twitter_social_url", "options"); 
	                	if(!empty($twitter)){ ?>                  
		                        <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>	                
	                	<?php } ?>

	                	  	<?php $instagram = get_field("instagram_social_url", "options"); 
	                	if(!empty($instagram)){	?>
		                   	    <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
	                	<?php } ?>

	                	  	<?php $linkedin = get_field("linkedin_social_url", "options"); 
	                	if(!empty($linkedin)){ ?>
		                        <a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>	               
	                	<?php } ?>
                	</div>
                    <!-- END SOCIAL ICONS -->

                    <?php $copyright_content = get_field("copyright_content", "options"); 
	                	if(!empty($copyright_content)){ ?>
		                    <!-- COPYRIGHT -->
		                    <div class="site-copyright">
					<p><?php wp_nav_menu( array(
    						'menu' => 'Footer Menu'
					) ); ?></p>
		                        <p> <?php echo $copyright_content; ?></p>
		                    </div>
                	<?php } ?>

                </div>
            </div>
        </div>
    </footer>

</div>
<!-- END WRAPPER -->

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper.jquery.min.js"></script>                         <!-- JQuery -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/style.js"></script>

<?php wp_footer(); ?>

</body>
</html>
