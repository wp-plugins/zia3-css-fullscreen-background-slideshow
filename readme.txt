=== Zia3 CSS Fullscreen Background Slideshow ===
Contributors: zia3wp
Donate link: http://plugins.zia3.com/donate/
Tags: fullscreen slideshow, background slideshow, zia3, zia3 slideshow, css fullscreen slideshow, css slideshow, responsive, shortcode, landing page, fullscreen
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: 1.2
License: GPLv2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A fullscreen background slideshow plugin utilising CSS only for slide transitions and animations.

== Description ==

A fullscreen background slideshow plugin based on Serkan Azmi's <a href="http://plugins.zia3.com/">Zia3 Background Slideshow Plugin</a>.  You can see a working demo at <a href="http://plugins.zia3.com/">http://plugins.zia3.com/</a>

<h4>What Can This Plugin Do?</h4>
You can use it to

*   Create a fullscreen slideshow
*   Create a fullscreen background (single slide)
*   Specify slide text for each slide that will be animated.
*   4 different types of slide animation and transitions.
*   Full CSS usage on your website, no extra javascript files required.(less overhead to load your website)
*   Cross browser compatibility
*   Responsive design (will work on any device and screen size)
*   You can specify a slider visible slider title and link along with your website slogan and link.
*   It does use the new media uploader and you can drag and drop your images to rearrange them which is kind of cool.

This plugin does one thing and one thing only, to keep it small yet fully functional.


<h4>About the Shortcode:</h4>

There are 15 parameters total that you can use with this shortcode.  The **ID** being the only one that's absolutely **required**.

List of parameters:

*   id
*   fade
*   delay
*   overlay
*   type
*   arrows
*   autoplay
*   poster
*   random
*   title
*   link
*   slogan
*   slogan_link
*   link_color
*   slogan_link_color


`
[zia3 id="333" fade="2500" delay ="4500" overlay="http://mydomain.com/urloftheimage/" type="1-4" arrows="yes" autoplay="yes" poster="yes" random="yes" title="My Title" title_link="http://mydomain.com/" slogan="My Slogan" slogan_link="http://mydomain.com/" link_color="255,255,255" slogan_link_color="255,255,255"]
`

**NOTE FOR THEME DEVELOPERS:** This plugin makes use of both *wp_head()* and *wp_footer()* so if your theme is missing either you may experience issues using this plugin.

== Installation ==

<h4>Installation</h4>


1.   Upload the plugin zip file to the `/wp-content/plugins/` directory
2.   Activate the plugin through the 'Plugins' menu in WordPress
3.   Use the shortcode [zia3 id="xxx"]
4.   Customize the slideshow using the parameters explained in <a href="https://wordpress.org/plugins/zia3-css-fullscreen-background-slideshow/">screenshot #4</a>


<h4>Using the Shortcode</h4>
After you've added images to your slideshow or changed any attributes to your slideshow and generated a shortcode you just need to copy the shortcode and paste it into the content of any page or post you want the slideshow to show up on.
Each slide will use the images title on the page. Please change the title to reflect what you want displayed on the slide or leave it blank to display no text on the image.
If you want it to show up on every page you'll have to add some code to the header.php file in your theme.
See the codex's <a href="http://codex.wordpress.org/Function_Reference/do_shortcode">do_shortcode article</a> for more information on the matter.

<a href="https://wordpress.org/plugins/zia3-css-fullscreen-background-slideshow/">See screenshot #3</a> for a description of the shortcode parameters.

== Screenshots ==

1. Demonstration 1
2. Demonstration 2
2. Backend Example
4. Shortcode Generator


== Upgrade Notice ==

Just the usual, deactivate plugin, replace files, activate.

== Changelog ==
1.2 Added persistence to generate shortcode which populated the previous values entered when editing a slideshow.
    Changed View slideshows to All slideshows to follow WP conventions.
    Bug fixes.

1.1 Added link and slogan color support.

<h4>Versions 1.1 </h4>

*   1.1 Link Color Support
*   1.0 Initial Release


