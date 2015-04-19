<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post;
    wp_register_script('zia3-modernizr', plugins_url('../js/modernizr.custom.86080.js',__FILE__), array('jquery'), null, 1 );
    wp_register_style('zia3', plugins_url('../css/zia3-style.css', __FILE__), '', null, 'all');
    wp_register_style('zia3-jquery', plugins_url('../css/jquery.zia3.css', __FILE__), '', null, 'all');

    wp_enqueue_script('zia3-modernizr');
    wp_enqueue_style('zia3-jquery');
    wp_enqueue_style('zia3');