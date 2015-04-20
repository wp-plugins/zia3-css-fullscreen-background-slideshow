<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post;
	$id = get_the_ID();
    wp_register_script('zia3-shortcode-generator', plugins_url('../../js/shortcodegenerator.js',__FILE__), array('jquery'), null, 1 );
    wp_enqueue_script('zia3-shortcode-generator');

    $genShortcode = get_post_meta( $id, 'genShortcode', true );

	if ( !isset( $genShortcode ) || empty( $genShortcode ) ){
		echo '<form><input type="button" class="button" name="zia3_shortcodeg_button" id="zia3_shortcodeg_button" value="Generate Your Own Shortcode" /><br><br>';
		echo '<div id="example_shortcode">Example Shortcode: <input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="[zia3 id='. $id .' fade="3000" delay="4000" overlay="http://mydomain.com/urlofimage" type="1" arrows="no" autoplay="yes" poster="no" random="no" title="My Title" title_link="http://mydomain.com/" slogan="My Slogan" slogan_link="http://mydomain.com/" link_color="255,255,255" slogan_link_color="255,255,255" ]"</input></div>';
	}
	else{
		echo '<form><input type="button" class="button" name="zia3_shortcodeg_button" id="zia3_shortcodeg_button" value="Generate a New Shortcode" /><br><br>';
		echo "<div id='example_shortcode'>Your Custom Shortcode: <input type='text' spellcheck='false' onclick='this.focus();this.select()' readonly='readonly' style='width:650px;max-width:100%' value='" . $genShortcode ."'</input></div>";}
?>

<div id="zia3-shortcode-generator">
<h3>Shortcode Generator</h3><br>
Shortcode ID: <input type="text" id="id" spellcheck="false" readonly="readonly" value="<?php echo $id ?>">
Fade: <input type="text" id="fade" spellcheck="false" readonly="readonly" value="">
Delay: <input type="text" id="delay" spellcheck="false" readonly="readonly" value="">
Overlay: <input type="text" id="overlay" spellcheck="false" readonly="readonly" value="">
Type: <select id="type" name="type"><option value="1">Type 1</option><option value="2">Type 2</option><option value="3">Type 3</option><option value="4">Type 4</option></select>
Arrows: <select id="arrows" name="arrows"><option value="no">No</option><option value="yes">Yes</option></select>
Autoplay: <select id="autoplay" name="autoplay"><option value="yes">Yes</option><option value="no">No</option></select>
Poster: <select id="poster" name="poster"><option value="no">No</option><option value="yes">Yes</option></select>
Random: <select id="random" name="random"><option value="no">No</option><option value="yes">Yes</option></select><br>
<h3>Slider Page Link and Title</h3><br>
Title: <input type="text" id="link_title" spellcheck="false" value="Enter Here">
Link: <input type="text" id="link" spellcheck="false" value="http://">
Slogan: <input type="text" id="slogan" spellcheck="false" value="Slogan Here">
Slogan Link: <input type="text" id="slogan_link" spellcheck="false" value="http://">
Link Color: <input type="text" id="link_color" spellcheck="false" value="255,255,255">
Slogan Link Color: <input type="text" id="slogan_link_color" spellcheck="false" value="255,153,204">
<input type="button" class="button" name="zia3_generate_button" id="zia3_generate_button" value="Generate Shortcode!" />
<input type="button" class="button" name="zia3_help_button" id="zia3_help_button" value="Explain What All of This Means..." />
<br><br>
<div id="generated-shortcode-container">Generated Shortcode: <input id="generated-shortcode" type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" name="genShortcode" value="<?php echo $genShortcode; ?>"></div>
</div>
<div id="zia3-parameter-explaination">
<h3>Fade</h3>
<p>The amount of time it takes to fade from one images to the next (in miliseconds). Currently not used, will be implemented next release..</p>
<h3>Delay</h3>
<p>The amount of time the slideshow will wait before fading to the next image (also in miliseconds). Currently not used, will be implemented next release..</p>
<h3>Overlay</h3>
<p>You can place an image like a pattern over top of the slideshow using the URL of the pattern.  Take the <a href="http://sheranazmi.com" target="_BLANK">demo site</a> for example.  It has a subtle overlay over all of the images.  To use an overlay image first upload your image/pattern to your media library and then use the URL for the overlay parameter.  E.g. [zia3 id=10 fade=5000 delay = 4000 <strong>overlay=yourdomain.com/yourpattern.png</strong> arrows=no autoplay=no poster=no]. Currently not used, will be implemented next release..</p>
<h3>Type</h3>
<p>You can select from 4 different animation types transitions. Type in a value from 1 - 4 .</p>
<h3>Arrows</h3>
<p>Weather or not to display next/previous arrows so users can navigate through the slideshow. Currently not used, will be implemented next release..</p>
<h3>Autoplay</h3>
<p>Weather or not to automatically start playing through the slideshow when the user first loads the page. Currently not used, will be implemented next release..</p>
<h3>Poster</h3>
<p>The slideshow will stop on the last image in the slideshow but autoplay must be enabled for this to work. Currently not used, will be implemented next release..</p>
<h3>Random</h3>
<p>The slides in your slideshow will display in a random ordrer if this is set to yes.</p>
<h3>Title</h3>
<p>The title text for the link on the slideshow page which will be clicked on to go to the link specified.</p>
<h3>Link</h3>
<p>The link for the title you specified on the slideshow page.</p>
<h3>Slogan</h3>
<p>The slogan text for the link on the slideshow page which will be clicked on to go to the link specified.</p>
<h3>Slogan Link</h3>
<p>The link for the slogan you specified on the slideshow page.</p>
<h3>Link Color</h3>
<p>The RGB color code for the link. Default = 255,255,255 white</p>
<h3>Slogan Link Color</h3>
<p>The RGB color code for the slogan link. Default = 255,255,255 white</p>
<hr>
<p>After you've generated your shortcode remember to hit Publish or Update so you can come back and copy/paste the shortcode later if you need to.</p>
<input type="button" class="button" name="zia3_help-back_button" id="zia3_help-back_button" value="Thanks! Now take me back to the shortcode generator!" />
</div>
</form>