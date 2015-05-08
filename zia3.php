<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Zia3 CSS Fullscreen Background Slideshow
Plugin URI: http://zia3.com
Description: Fullscreen Zia3 Slider based on the <a target="_blank" href="http://plugins.zia3.com/">Zia3 CSS Fullscreen Background Slideshow Plugin</a> by <a href="http://plugins.zia3.com/">Serkan Azmi</a>
Author: Serkan Azmi
Version: 1.0
Author URI: http://zia3.com

  Copyright 2014  Serkan Azmi  (email : plugins@zia3.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class zia3{

	// Constructor for the class.
	public function __construct() {

    //Require version 3.5, Enqueue Scripts, Add Zia3 Post Type, Add Custom Columns, Add Metaboxs, Add Media JS, Add Metabox Save, Add Shortcode, Add Help Submenu, Add Help Link, Custom messages, Flush rewrite rules, tinymce button
    add_action( 'admin_init', array( $this, 'require_3_5' ) );
    add_action( 'init', array( $this, 'create_zia3_post_type' ) ); 
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) ); 
    add_filter( 'manage_edit-zia3_columns', array( $this, 'zia3_cpt_columns' ) );
    add_action( 'manage_zia3_posts_custom_column', array( $this, 'manage_zia3_columns'), 10, 1 );
    add_action( 'add_meta_boxes', array( $this, 'zia3_metaboxes_add' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'media_uploader' ) );
    add_action( 'save_post', array( $this, 'zia3_meta_box_save' ));
    add_shortcode( 'zia3', array( $this, 'zia3' ) );
    add_filter( 'plugin_action_links_'. plugin_basename( __FILE__ ), array( $this, 'add_help_link' ) );
    add_filter( 'post_updated_messages', array( $this, 'zia3_custom_messages' ) );
    register_activation_hook( __FILE__, array( __CLASS__, 'flush' ) );
    register_deactivation_hook( __FILE__, array( __CLASS__, 'flush' ) );
    register_uninstall_hook( __FILE__, array( __CLASS__, 'flush' ) );
       
    }

    //Require version 3.5+
    public function require_3_5() {
	include_once('methods/zia3_version.php');
    }

    //Register Script
    public function enqueue_scripts() {
	include_once('methods/zia3_enqueue.php');
    }

    //Register, localize and enqueue the media uploader js
    public function media_uploader() {
	include_once('methods/zia3_media.php');
    }

    //Zia3 Custom Post Type    
    public function create_zia3_post_type() { 
	include_once('methods/zia3_cpt.php');
    }

    //Add Shortcode Column
    public function zia3_cpt_columns($columns) {
	include_once('methods/zia3_cpt_columns.php');
   	 return $columns;
    }

    //Displays the shortcodes within the shortcode column
    public function manage_zia3_columns($column) {
	global $post;
        $genShortcode = get_post_meta( get_the_ID(), 'genShortcode', true );

        if( isset( $genShortcode ) || !empty( $genShortcode ) && $column = 'shortcode') {
	$shortcode = "<input type='text' spellcheck='false' onclick='this.focus();this.select()' readonly='readonly' style='width:650px;max-width:100%' value='". $genShortcode ."'</input>";
	}
	if( !isset( $genShortcode ) || empty( $genShortcode ) && $column = 'shortcode'){
	$shortcode = '<input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="[zia3 id='. $post->ID .']"</input>'; }
	echo $shortcode;
    }

    //Add Help Link
    public function add_help_link($links){
	$settings_link = '<a href="http://wordpress.org/plugins/zia3-fullscreen-background-slider/installation/">Help</a>';
  	array_push( $links, $settings_link );
  	return $links;
    } 

    //Add Zia3 Metaboxes
    public function zia3_metaboxes_add() {
	add_meta_box( 'zia3_images', __( 'Zia3 Slides', 'zia3_images' ), array( $this, 'zia3_meta_box_display' ), 'zia3', 'normal', 'default' );
	add_meta_box( 'zia3_shortcode', __( 'Zia3 Shortcode', 'zia3_shortcode' ), array( $this, 'zia3_meta_box_shortcode' ), 'zia3', 'normal', 'default' );  //shortcode generator
    }

    //Display images metabox
    public function zia3_meta_box_display() {
       	include_once('methods/metaboxes/zia3_image_metabox.php'); 
    }

    //Display Shortcode Metabox
    public function zia3_meta_box_shortcode() {
	include_once('methods/metaboxes/zia3_shortcode_metabox.php'); 
    }

    //Save Metabox
    public function zia3_meta_box_save($post_id) {
	include_once('methods/metaboxes/zia3_save_metabox.php'); 
    }

    //Zia3 Shortcode  NOTE: enqueuing scripts/styles in this function so as to only load them when the shortcode is present (has_shortcode doesnt play well with do_shortcode)
    public function zia3($atts){
	include_once('methods/zia3_shortcode.php');
	return $replacement;
    }

    //Custom Update Messages
    public function zia3_custom_messages($messages){
	include_once('methods/zia3_custom_messages.php');
	return $messages;
    }

    //Flush rewrite rules
    public function flush() {
	flush_rewrite_rules();
    }
    
}
// Instantiate the class.
$zia3 = new zia3();