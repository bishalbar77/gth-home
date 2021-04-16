<?php
/**
* Template Name: Home Page
* 
*/
get_header();
?>

    <!-- banner post start-->
    <section class="banner_post">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <?php

                global $wp_query;

                $arges = array(

                'post_type' => 'post',

                'post_status' => 'publish',

                'posts_per_page' => 3,

                'orderby'   => 'menu_order',

                'order' => 'ASC',

                'meta_query' => array(
                    array(
                      'key' => 'choose_home_banner_post',
                      'value' => '1',
                      'compare' => '==' // not really needed, this is the default
                    )
                  )

                );


                $query  = new WP_Query( $arges );

                if ( $query ->have_posts() ) :

                while ( $query ->have_posts() ) : $query ->the_post();      

                  $title = get_the_title();  

                  $description = get_the_content(); 

                  $ID = get_the_ID();  

                  $categorys = get_the_terms(get_the_ID(), 'category');

                  $cat_name = $categorys[0]->name;

                  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'size627x700'); 

                  if(!empty($featured_img_url)){
                    $url = $featured_img_url;                    
                  } else {
                    $url = get_template_directory_uri().'/assets/images/banner_blog/banner_blog_1.png';
                  }

                  $post_date = get_the_date( 'F j, Y' );

                  $category = get_the_category();

                  $link = get_category_link( $category[0]->term_id );

                  ?>


                        <div class="banner_post_1 banner_post_bg_1" style="background-image: url(<?php echo $url; ?>);">
                            <div class="banner_post_iner text-center">
                                <?php if(!empty($link)){ ?>
                                    <a href="<?php echo $link; ?>"><h5><?php echo $cat_name; ?></h5></a> 
                                <?php } ?>

                                 <?php if(!empty($title)){ ?>
                                    <a href="<?php echo esc_url( get_permalink( $ID ) ); ?>"><h2><?php echo $title; ?></h2></a> 
                                <?php } ?>

                                <p>Posted on <?php echo $post_date; ?></p>
                            </div>
                        </div>
                       

                <?php endwhile;

                wp_reset_query();

                endif; ?>

            </div>
        </div>
    </section>
    <!-- banner post end-->

        <!-- feature_post start-->
    <section class="all_post margin_top">       
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">   
                        <div class="col-lg-12 col-sm-12 heading_featured"><h1>Latest Posts</h2></div>
                    </div>
                </div>                
                <div class="col-lg-12">
                    <div class="row">   

                                <?php

                                global $wp_query;

                                $arges = array(

                                'post_type' => 'post',

                                'post_status' => 'publish',

                                'posts_per_page' => 3,

                                'orderby'   => 'menu_order',

                                'order' => 'ASC',

                                'meta_query' => array(
                                    array(
                                      'key' => 'choose_home_banner_post',
                                      'value' => '1',
                                      'compare' => '==' // not really needed, this is the default
                                    )
                                  )

                                );


                                $query  = new WP_Query( $arges );

                                if ( $query ->have_posts() ) :

                                while ( $query ->have_posts() ) : $query ->the_post();      

                                  $title = get_the_title();  

                                  $description = get_the_content(); 

                                  $ID = get_the_ID();  

                                  $categorys = get_the_terms(get_the_ID(), 'category');

                                  $cat_name = $categorys[0]->name;

                                  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'size627x700'); 

                                  if(!empty($featured_img_url)){
                                    $url = $featured_img_url;                    
                                  } else {
                                    $url = get_template_directory_uri().'/assets/images/banner_blog/banner_blog_1.png';
                                  }

                                  $post_date = get_the_date( 'F j, Y' );

                                  $category = get_the_category();

                                  $link = get_category_link( $category[0]->term_id );

                                  ?>

                                        <div class="col-lg-4 col-sm-4">
                                            <div class="single_post post_1">
                                                <div class="single_post_img">
                                                    <img src="<?php echo $url; ?>" alt="">
                                                </div>
                                                <div class="single_post_text text-center">
                                                      <?php if(!empty($link)){ ?>
                                                        <a href="<?php echo $link; ?>"><h5><?php echo $cat_name; ?></h5></a> 
                                                    <?php } ?>
                                                     <?php if(!empty($title)){ ?>
                                                    <a href="<?php echo esc_url( get_permalink( $ID ) ); ?>"><h2><?php echo $title; ?></h2></a> 
                                                <?php } ?>
                                                    <p>Posted on <?php echo $post_date; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                       

                                <?php endwhile;

                                wp_reset_query();

                                endif; ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_post end-->

    <!-- social_connect_part part start-->
<!--     <section class="social_connect_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="social_connect">
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_1.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_2.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_3.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_4.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_5.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta/instagram_6.png" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="#"><span class="fa fa-instagram"></span></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section> -->
    <!-- social_connect_part part end-->


	  
<?php get_footer(); ?>
