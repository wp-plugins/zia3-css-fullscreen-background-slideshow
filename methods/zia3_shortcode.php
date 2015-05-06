<?php
if ( ! defined( 'ABSPATH' ) ) exit;

	function zia3_wp_get_attachment( $attachment_id ) {

		$attachment = get_post( $attachment_id );
		return array(
				'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink( $attachment->ID ),
				'src' => $attachment->guid,
				'title' => $attachment->post_title
		);
	}

    $atts = shortcode_atts(array('id' => '','fade' => '2000','overlay' => '', 'type' => '1', 'arrows' => 'yes','poster' => 'yes','delay' => '4000','autoplay' => 'yes', 'random' => '', 'link_title'=> 'Enter Here', 'link' => 'http://zia3.com', 'slogan' => 'slogan', 'slogan_link' => 'slogan_link', 'link_color' => 'link_color', 'slogan_link_color' => 'slogan_link_color'), $atts);
    $images = get_post_meta( $atts['id'], 'imgIDs', true );

    //Variables
    $fade = $atts['fade'];
    $delay = $atts['delay'];
    $overlay = $atts['overlay'];
    $type = $atts['type'];
    $autoplay = $atts['autoplay'];
    $poster = $atts['poster'];
    $arrows = $atts['arrows'];
    $link_title = $atts['link_title'];
    $link = $atts['link'];
	$link_color = $atts['link_color'];
    $slogan = $atts['slogan'];
    $slogan_link = $atts['slogan_link'];
	$slogan_link_color = $atts['slogan_link_color'];


    //Enque Dynamic CSS specific to the chosen slide
    wp_register_style('zia3-slideshow-style', plugins_url('../css/zia3-dynamic-style-'.$type.'.css.php'."?zia3_slider_id=".$atts['id'], __FILE__), '', null, 'all');
    wp_enqueue_style('zia3-slideshow-style');


    //Randomize
    if($atts['random'] == 'yes'){

    $array=explode(",",$images);
    shuffle($array);
    $images = implode($array,",");

    }

    $image = explode(",", $images);
    $imagenum = count($image);

    $replacement = '';

    if($imagenum > 1 && $arrows == "yes"){
    $replacement .= <<<HEREDOC
    <!--  Start Zia3 Slideshow-->

HEREDOC;

    $replacement .= <<<HEREDOC
	<!-- UL Begin -->
HEREDOC;
    }

    $replacement .= <<<HEREDOC

<ul class="zia3-slideshow">

HEREDOC;

    for($i = 0;$i < $imagenum;$i++){
    	$image_attributes = wp_get_attachment_image_src( $image[$i], "full" );
    	$zia3_image_attributes = zia3_wp_get_attachment( $image[$i] );
    	$full_image_attributes = wp_prepare_attachment_for_js( $image[$i] );
    	$metadata_image_attributes = wp_get_attachment_metadata( $image[$i] );
    	$replacement .= "<li><span>Image " .$i ."</span><div><h3>" . $zia3_image_attributes['title'] . "</h3></div></li>";
    }

    $replacement .= '<div id="zia3_enter_here">';

    if( $link || $link_title ){
    	$replacement .= '<p><a title="'.$link_title.'" style="color: rgb('.$link_color.')" href="'.$link.'">'.$link_title.'</a></p>';
    } else {
    	$replacement .= '<p><a title="Enter Here" style="color: rgb(255,255,255)" href="http://zia3.com">Enter•Here</a></p>';
    }
    if( $slogan || $slogan_link ){
    	$replacement .= '<p><a title="'.$slogan.'" style="color: rgb('.$slogan_link_color.')" href="'.$slogan_link.'">'.$slogan.'</a></p>';
    } else {
    	$replacement .= '<p><a title="Zia3 Slideshow" style="color: rgb(255,255,255)" href="http://plugins.zia3.com">Zia3•Slideshow</a></p>';
    }

    $replacement .= '</div>';

    $replacement .= <<<HEREDOC

HEREDOC;

    $replacement .= <<<HEREDOC

</ul>

HEREDOC;
//NOTE If there is no overlay, don't print the 'overlay' option with an empty source into the javascript. It gives you a 404 for the overlay image.
    if( $overlay ){ $replacement .= <<<HEREDOC

HEREDOC;
    }

    if($autoplay == "no"){
          $replacement .= " ";
      }

    if($poster == "yes" && $autoplay == "yes"){
	  $zia3timeout = $delay * $imagenum;
	  $replacement .=  $zia3timeout ;
    }