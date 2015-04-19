jQuery("#zia3_shortcodeg_button").click(function() {
	jQuery("#example_shortcode").toggle("slow", function() {
	});
	jQuery("#zia3-shortcode-generator").toggle("slow", function() {
	});
	var e = jQuery("#zia3_shortcodeg_button").val();
	if (e === "Generate Your Own Shortcode") {
		jQuery("#zia3_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "Generate a New Shortcode") {
		jQuery("#zia3_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "View Old Shortcode") {
		jQuery("#zia3_shortcodeg_button").val("Generate a New Shortcode")
	}
});
jQuery("#zia3_generate_button").click(function() {
	jQuery("#generated-shortcode-container").slideDown("slow", function() {
	});
	var e = "id=\"" + jQuery("#id").val() + "\"";
	var t = " fade=\"" + jQuery("#fade").val() + "\"";
	var n = " delay=\"" + jQuery("#delay").val() + "\"";
	var r = " overlay=\"" + jQuery("#overlay").val() + "\"";
	var i = jQuery("#overlay").val();
	var b = " type=\"" + jQuery("#type").val() + "\"";
	var s = " arrows=\"" + jQuery("#arrows").val() + "\"";
	var o = " autoplay=\"" + jQuery("#autoplay").val() + "\"";
	var u = " poster=\"" + jQuery("#poster").val() + "\"";
	var a = " random=\"" + jQuery("#random").val() + "\"";
	var z = " link_title=\"" + jQuery("#link_title").val() + "\"";
	var w = jQuery("#link_title").val();
	var x = " link=\"" + jQuery("#link").val() + "\"";
	var y = jQuery("#link").val();
	var c = " slogan=\"" + jQuery("#slogan").val() + "\"";
	var d = jQuery("#slogan").val();
	var f = " slogan_link=\"" + jQuery("#slogan_link").val() + "\"";
	var g = jQuery("#slogan_link").val();
	if (!i) {
		r = ""
	}
	if (!w) {
		z = ""
	}
	if (!y) {
		x = ""
	}
	if (!d) {
		c = ""
	}
	if (!g) {
		f = ""
	}
	
	var f = "[zia3 " + e + t + n + r + b + s + o + u + a + z + x + c + f + "]";
	jQuery("#generated-shortcode").val(f)
});
jQuery("#zia3_help_button").click(function() {
	jQuery("#zia3-shortcode-generator").toggle("slow", function() {
	});
	jQuery("#zia3_shortcodeg_button").prop("disabled", true);
	jQuery("#zia3-parameter-explaination").toggle("slow", function() {
	})
});
jQuery("#zia3_help-back_button").click(function() {
	jQuery("#zia3-shortcode-generator").toggle("slow", function() {
	});
	jQuery("#zia3_shortcodeg_button").prop("disabled", false);
	jQuery("#zia3-parameter-explaination").toggle("slow", function() {
	})
})