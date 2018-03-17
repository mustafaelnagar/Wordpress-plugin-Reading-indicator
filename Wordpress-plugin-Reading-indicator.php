<?php
/**
 * Plugin Name: Reading Indicator
 * Plugin URI: http://mustafaelnagar.com
 * Description: Reading Indicator plugins enables the user to see how much he read from the blog and how long still to read by a very interactive indicator at the bottom of the single blogs. Thanks to Rames, Cheeling, leonid, CSS-Tricks website, who are inspiring me to back to coding & the open source community again.
 * Version: 1.0
 * Author: Mustafa Elnagar
 * Author URI: http://mustafaelnagar.com
 * License: GPLv2 
 */

defined( 'ABSPATH' ) || die();

define( 'Reading_Indicator_URL', ( plugin_dir_url( __FILE__ ) ));

//adding the filter of the reading indicator
add_filter('the_content',function($the_content){
		
		
		// loading the Reading Indicator CSS 
		wp_register_style( 'ri_css', plugin_dir_url( __FILE__ ).'inc/css/reading-indicator.css');
		wp_enqueue_style('ri_css');

		//loading the Jquery lib to enable detecting the scrolling actions
		wp_register_script( 'ri_jq', plugin_dir_url( __FILE__ ) . 'inc/js/jquery.min.js');
		wp_enqueue_script( 'ri_jq' );

		//loading the 
		wp_register_script( 'js_scrolling_detection_script', plugin_dir_url( __FILE__ ) . 'inc/js/reading-indicator.js');
		wp_enqueue_script( 'js_scrolling_detection_script' );

		//Adding the indicator to the content of the single posts 
		$reading_indicators = "
		   <progress value='0' id='progressBar' class='reading_indicator'>
  				<div class='progress-container'>
  				  <span class='progress-bar' id='bar'></span>
  				</div>
			</progress>";

		//returning the content plus the reading indicators
		return $the_content.$reading_indicators;
	
	});
