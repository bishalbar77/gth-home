<?php

function load_stylesheets(){

	wp_register_style('font', get_template_directory_uri() . '/css/montserratfont.css', array() , 1, 'all');
	wp_enqueue_style('font');

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array() , 1, 'all');
	wp_enqueue_style('bootstrap');

	wp_register_style('mdb', get_template_directory_uri() . '/css/mdb.css', array() , 1, 'all');
	wp_enqueue_style('mdb');

	wp_register_style('custom-css', get_template_directory_uri() . '/css/custom-css.css', array() , 1, 'all');
	wp_enqueue_style('custom-css');

	wp_register_style('profile', get_template_directory_uri() . '/css/profile.css', array() , 1, 'all');
	wp_enqueue_style('profile');

	wp_register_style('style', get_template_directory_uri() . '/css/style.css', array() , 1, 'all');
	wp_enqueue_style('style');


	
}

add_action('wp_enqueue_scripts','load_stylesheets');


function addjs(){

	wp_deregister_script( 'jquery' );

	    wp_register_script('jquery', get_template_directory_uri() . '/js/jQuery.js', array(), 1, 1, 1);
		wp_enqueue_script('jquery');

		wp_register_script('popper', get_template_directory_uri() . '/js/popper.js', array(), 1, 1, 1);
		wp_enqueue_script('popper');
		

		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), 1, 1, 1);
		wp_enqueue_script('bootstrap');
		
		wp_register_script('mdb', get_template_directory_uri() . '/js/mdb.js', array(), 1, 1, 1);
		wp_enqueue_script('mdb');


		wp_register_script('local', get_template_directory_uri() . '/js/local.js', array(), 1, 1, 1);
		wp_enqueue_script('local');
		
		

		



}

add_action('wp_enqueue_scripts','addjs');

function arphabet_widgets_init() {

    register_sidebar( array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


add_action('in_widget_form', 'spice_get_widget_id');

function spice_get_widget_id($widget_instance)

{
    
    // Check if the widget is already saved or not. 
    
    if ($widget_instance->number=="__i__"){
     
     echo "<p><strong>Widget ID is</strong>: Pls save the widget first!</p>"   ;
    
    
  }  else {

        
       echo "<p><strong>Widget ID is: </strong>" .$widget_instance->id. "</p>";
         
 
    }
}

?>


