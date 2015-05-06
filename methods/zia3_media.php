<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $post_type;
    if( $post_type == 'zia3' ){
	wp_enqueue_media();
        wp_register_script( 'zia3upload', plugins_url( '../js/media.js', __FILE__ ), array( 'jquery' ), null, true );
        wp_localize_script( 'zia3upload', 'zia3upload',
            array(
                'title'     => __( 'Upload or Choose Your Custom Image File', 'zia3' ), // This will be used as the default title
                'button'    => __( 'Insert Image into Input Field', 'zia3' )            // This will be used as the default button text
            )
        );
        wp_enqueue_script( 'zia3upload' );
	wp_register_style('zia3-admin', plugins_url('../css/zia3.admin.css', __FILE__), '', null, 'all');
	wp_enqueue_style('zia3-admin'); } ?>