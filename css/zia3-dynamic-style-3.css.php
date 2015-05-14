<?php

    header("Content-type: text/css; charset: UTF-8");

    //if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    require_once('../../../../wp-load.php');
	require_once('../../../../wp-includes/post.php');

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

    $slider_id = $_GET["zia3_slider_id"];
    $atts = shortcode_atts(array('id' => '','fade' => '2000','overlay' => '','arrows' => 'yes','poster' => 'yes','delay' => '4000','autoplay' => 'yes', 'random' => ''), $atts);
    $images = get_post_meta( $slider_id, 'imgIDs', true );

    //Variables
    $fade = $atts['fade'];
    $delay = $atts['delay'];
    $overlay = $atts['overlay'];
    $type = $atts['type'];
    $autoplay = $atts['autoplay'];
    $poster = $atts['poster'];
    $arrows = $atts['arrows'];

    $image = explode(",", $images);
    $imagenum = count($image);

?>
/* Slideshow */
.zia3-slideshow,
.zia3-slideshow:after {
    position: fixed;
    margin-left: 0px;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    z-index: 0;
    background-image: url("../images/black-square.jpeg");
}
.zia3-slideshow:after {
	margin-left: 0px;
    content: '';
    background: transparent url(../images/pattern.png) repeat top left;
}
.zia3-slideshow li span {
    width: 100%;
    height: 100%;
    position: absolute;
    margin-left: 0px;
    top: 0px;
    left: 0px;
    color: transparent;
    background-size: cover;
    background-repeat: none;
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-repeat: none;
    opacity: 0;
    z-index: 0;
	-webkit-backface-visibility: hidden;
    -webkit-animation: imageAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -moz-animation: imageAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -o-animation: imageAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -ms-animation: imageAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    animation: imageAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
}
.zia3-slideshow li div {
    z-index: 1000;
    position: absolute;
    margin-left: 0px;
    bottom: 10px;
    left: 0px;
    width: 100%;
    text-align: right;
    opacity: 0;
    -webkit-animation: titleAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -moz-animation: titleAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -o-animation: titleAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    -ms-animation: titleAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
    animation: titleAnimation <?php echo $imagenum*6; ?>s linear infinite 0s;
}
.zia3-slideshow li div h3 {
    font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
    font-size: 160px;
    padding: 0 30px;
    line-height: 120px;
    color: rgba(255,255,255, 0.8);
}

<?php

	$image_attributes = wp_get_attachment_image_src( $image[0], "full" );
	echo ".zia3-slideshow li:nth-child(1) span {background-image: url(".$image_attributes[0].")}";
	echo "\n";

	for($i = 1;$i < $imagenum;$i++){
		$delay = $i*6;
		$image_attributes = wp_get_attachment_image_src( $image[$i], "full" );
		$zia3_image_attributes = zia3_wp_get_attachment( $image[$i] );
		$full_image_attributes = wp_prepare_attachment_for_js( $image[$i] );
		$metadata_image_attributes = wp_get_attachment_metadata( $image[$i] );
		echo ".zia3-slideshow li:nth-child(". ($i+1) .") span {background-image: url(".$image_attributes[0]."); -webkit-animation-delay: ". $delay. "s; -moz-animation-delay: ". $delay. "s; -o-animation-delay: ". $delay."s; -ms-animation-delay: ". $delay."s; animation-delay: ". $delay."s;}";
		echo "\n";
		echo ".zia3-slideshow li:nth-child(". ($i+1) .") div { -webkit-animation-delay: ". $delay. "s; -moz-animation-delay: ". $delay. "s; -o-animation-delay: ". $delay."s; -ms-animation-delay: ". $delay."s; animation-delay: ". $delay."s;}";
	}


?>


@-webkit-keyframes imageAnimation {
	0% {
	    opacity: 0;
	    -webkit-animation-timing-function: ease-in;
	}
	8% {
	    opacity: 1;
	    -webkit-transform: scale(1.05);
	    -webkit-animation-timing-function: ease-out;
	}
	17% {
	    opacity: 1;
	    -webkit-transform: scale(1.1);
	}
	22% {
		opacity: 0;
		-webkit-transform: scale(1.1) translateY(-20%);
	}
	25% {
	    opacity: 0;
	    -webkit-transform: scale(1.1) translateY(-100%);
	}
	100% { opacity: 0 }
}
@-moz-keyframes imageAnimation {
	0% {
	    opacity: 0;
	    -moz-animation-timing-function: ease-in;
	}
	8% {
	    opacity: 1;
	    -moz-transform: scale(1.05);
	    -moz-animation-timing-function: ease-out;
	}
	17% {
	    opacity: 1;
	    -moz-transform: scale(1.1);
	}
	22% {
		opacity: 0;
		-webkit-transform: scale(1.1) translateY(-20%);
	}
	25% {
	    opacity: 0;
	    -moz-transform: scale(1.1) translateY(-100%);
	}
	100% { opacity: 0 }
}
@-o-keyframes imageAnimation {
	0% {
	    opacity: 0;
	    -o-animation-timing-function: ease-in;
	}
	8% {
	    opacity: 1;
	    -o-transform: scale(1.05);
	    -o-animation-timing-function: ease-out;
	}
	17% {
	    opacity: 1;
	    -o-transform: scale(1.1);
	}
	22% {
		opacity: 0;
		-webkit-transform: scale(1.1) translateY(-20%);
	}
	25% {
	    opacity: 0;
	    -o-transform: scale(1.1) translateY(-100%);
	}
	100% { opacity: 0 }
}
@-ms-keyframes imageAnimation {
	0% {
	    opacity: 0;
	    -ms-animation-timing-function: ease-in;
	}
	8% {
	    opacity: 1;
	    -ms-transform: scale(1.05);
	    -ms-animation-timing-function: ease-out;
	}
	17% {
	    opacity: 1;
	    -ms-transform: scale(1.1);
	}
	22% {
		opacity: 0;
		-webkit-transform: scale(1.1) translateY(-20%);
	}
	25% {
	    opacity: 0;
	    -ms-transform: scale(1.1) translateY(-100%);
	}
	100% { opacity: 0 }
}
@keyframes imageAnimation {
	0% {
	    opacity: 0;
	    animation-timing-function: ease-in;
	}
	8% {
	    opacity: 1;
	    transform: scale(1.05);
	    animation-timing-function: ease-out;
	}
	17% {
	    opacity: 1;
	    transform: scale(1.1);
	}
	22% {
		opacity: 0;
		-webkit-transform: scale(1.1) translateY(-20%);
	}
	25% {
	    opacity: 0;
	    -transform: scale(1.1) translateY(-100%);
	}
	100% { opacity: 0 }
}
@-webkit-keyframes titleAnimation {
	0% {
	    opacity: 0;
	    -webkit-transform: translateY(-300%);
	}
	8% {
	    opacity: 1;
	    -webkit-transform: translateY(0%);
	}
	17% {
	    opacity: 1;
	    -webkit-transform: translateY(0%);
	}
	19% {
	    opacity: 0;
	    -webkit-transform: translateY(100%);
	}
	25% { opacity: 0 }
	100% { opacity: 0 }
}
@-moz-keyframes titleAnimation {
	0% {
	    opacity: 0;
	    -moz-transform: translateY(-300%);
	}
	8% {
	    opacity: 1;
	    -moz-transform: translateY(0%);
	}
	17% {
	    opacity: 1;
	    -moz-transform: translateY(0%);
	}
	19% {
	    opacity: 0;
	    -moz-transform: translateY(100%);
	}
	25% { opacity: 0 }
	100% { opacity: 0 }
}
@-o-keyframes titleAnimation {
	0% {
	    opacity: 0;
	    -o-transform: translateY(-300%);
	}
	8% {
	    opacity: 1;
	    -o-transform: translateY(0%);
	}
	17% {
	    opacity: 1;
	    -o-transform: translateY(0%);
	}
	19% {
	    opacity: 0;
	    -o-transform: translateY(100%);
	}
	25% { opacity: 0 }
	100% { opacity: 0 }
}
@-ms-keyframes titleAnimation {
	0% {
	    opacity: 0;
	    -ms-transform: translateY(-300%);
	}
	8% {
	    opacity: 1;
	    -ms-transform: translateY(0%);
	}
	17% {
	    opacity: 1;
	    -ms-transform: translateY(0%);
	}
	19% {
	    opacity: 0;
	    -ms-transform: translateY(100%);
	}
	25% { opacity: 0 }
	100% { opacity: 0 }
}
@keyframes titleAnimation {
	0% {
	    opacity: 0;
	    transform: translateY(-300%);
	}
	8% {
	    opacity: 1;
	    transform: translateY(0%);
	}
	17% {
	    opacity: 1;
	    transform: translateY(0%);
	}
	19% {
	    opacity: 0;
	    transform: translateY(100%);
	}
	25% { opacity: 0 }
	100% { opacity: 0 }
}
/* Show at least something when animations not supported */
.no-cssanimations .zia3-slideshow li span{
	opacity: 1;
}
@media screen and (max-width: 1140px) {
	.zia3-slideshow li div h3 { font-size: 100px }
}
@media screen and (max-width: 600px) {
	.zia3-slideshow li div h3 { font-size: 50px }
}


