<?php
/**
 * Plugin Name: zeitstrahler
 * Plugin URI:
 * Description: A simple plugin to style your content as a timeline with a few shortcodes.
 * Version: 0.9
 * Author: Martin Wudenka
 * Author URI: http://martin.wudenka.de
 * License: CC-BY-SA 3.0
 * License URI: http://creativecommons.org/licenses/by-sa/3.0/de/deed.de
 */
 
// constant definition
if( !defined( 'IS_ADMIN' ) ) define( 'IS_ADMIN', is_admin() );

// WordPress actions
if( IS_ADMIN ) {
}
else {
	add_action( 'wp_enqueue_scripts', array( 'zeitstrahler', 'script_and_style' ) );
	//move wpautop filter to AFTER shortcode is processed
	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'the_content', 'wpautop' , 99);
	add_filter( 'the_content', 'shortcode_unautop',100 );
}
 
class zeitstrahler {

	function __construct() {
		// shortcode init
		if( !IS_ADMIN ) {
			self::init_shortcodes(array('zeitstrahler_wrapper','zeitstrahler_element','zeitstrahler_date'));
		}
	}
	
  /**
	* Add shortcodes
	*/
	function init_shortcodes( $shortcodes ) {
		foreach($shortcodes as $shortcode) {
			if(method_exists('zeitstrahler','shortcode_handler_' . $shortcode)) {
				add_shortcode( $shortcode, array( 'zeitstrahler', 'shortcode_handler_' . $shortcode ) );
			}
		}
	}
	
  /**
	* Shortcode handlers
	*/
	function shortcode_handler_zeitstrahler_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array( 'style' => 'grey' ), $atts ) );
		return '<div class="zeitstrahler_wrapper zeitstrahler_nojs ' . $style . '" >' . do_shortcode($content) . '<br clear="all"></div>';
   }
   
   function shortcode_handler_zeitstrahler_element( $atts, $content = null ) {
   	extract( shortcode_atts( array( 'date' => '', 'heading' => '' ), $atts ) );
   	$output = '';
   	$output .= '<div class="zeitstrahler_element zeitstrahler_order"><div class="zeitstrahler_arrow"></div>';
   	if($date != '') {
   		$output .= '<div class="zeitstrahler_element_date">' . $date . '</div>';
   	}
   	if($heading != '') {
   		$output .= '<h3 class="zeitstrahler_element_heading">' . $heading . '</h3>';
   	}
   	$output .= '<div class="zeitstrahler_element_content">' . do_shortcode($content) . '</div>';
   	$output .= '</div>';
		return $output;
   }
   
   function shortcode_handler_zeitstrahler_date( $atts, $content = null ) {
   	return '<br clear="all"><p class="zeitstrahler_date zeitstrahler_order"><span>' . do_shortcode($content) . '</span></p>';
   }
	
  /**
	* Enqueue css stylesheet and some script
	*/
	function script_and_style() {
		global $post;
		if( isset($post->post_content) AND has_shortcode( $post->post_content, 'zeitstrahler_wrapper') ) {
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'zeitstrahler_script', plugins_url('js/zeitstrahler_script.js', __FILE__), 'jquery');
    		wp_enqueue_style( 'zeitstrahler_style', plugins_url('css/zeitstrahler_style.css', __FILE__) );
    	}
	}

}
$zeitstrahler = new zeitstrahler();