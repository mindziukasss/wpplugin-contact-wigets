<?php
/*
Plugin Name: Ajax Contact Widget
Description: Simplle Ajax powered contact form widget
Version:     20160911
Author:      MB
License:     GPL2
*/


function add_scripts(){
  wp_enqueue_script('contact-scripts', plugins_url().'/contact-widget/js/script.js', array('jquery'),'1.4.1', false);
}

add_action('wp_enqueue_scripts','add_scripts');


include('class.contact-widget.php');


function register_contact_widget(){
  register_widget('Contact_Widget');
}

add_action('widgets_init','register_contact_widget');