<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/bootstrap.min.css" rel="stylesheet">                    <!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/font-awesome.min.css">                 <!-- Font-Awesome Icons -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/icomoon.min.css">                      <!-- iconmoon Icons -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/swiper.min.css">                       <!-- Carousel slider -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/style.css">                            <!-- Template CSS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/animate.css">							<!-- Wow Animation CSS -->
<link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/style-particle.css">	<!-- ParticlesCSS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/extra/YouTubePopUp.css">		<!-- Youtube Video Popup CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- WRAPPER -->    
<!-- Preloader -->
<div class="wrapper" id="site-home">
    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner">

        <!-- HEADER -->
        <header class="site-header">

            <!-- STICKY HEADER -->
            <div class="sticky-header sticky stick-scrolling" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-sm-3">

                            <!-- LOGO -->
                            <div class="site-logo">
                                <a href="<?php echo get_home_url(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo">
                                    <span>TrueHelp</span>
                                </a>
                            </div>
                            <!-- END LOGO -->

                        </div>
                        <div class="col-xs-4 col-sm-9">

                            <!-- NAVIGATION -->
                            <nav class="site-nav" id="site-nav" role="navigation">
                                <!-- MOBILE VIEW BUTTON -->
                                <div class="nav-mobile">
                                    <i class="fa fa-bars show"></i>
                                    <i class="fa fa-close hide"></i>
                                </div>
                                <!-- LINKS -->
                                <ul class="nav-off-canvas">
                                    <!-- ACTIVE ITEM -->
                                    <li class="active"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                                    <li><a href="http://www.gettruehelp.com/#amazing-features">Features</a></li>
                                    <li><a href="http://www.gettruehelp.com/#site-more-features">Why Truehelp</a></li>
                                    <li><a href="http://www.gettruehelp.com/#how-it-works">How it works</a></li>
                                    <li><a href="http://www.gettruehelp.com/#site-download">Download</a></li>
                                    <li><a href="http://www.gettruehelp.com/#site-team">Team</a></li>
                                    <li><a href="http://www.gettruehelp.com/#site-packages">Pricing</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/blogs/">Blogs</a></li>
                                    <li><a href="http://www.gettruehelp.com/#quick-support">Contact us</a></li>
                                    
                                </ul>
                            </nav>
                            <!-- END NAVIGATION -->

                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- END HEADER -->

    </section>
