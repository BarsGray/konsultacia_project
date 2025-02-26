<?php
$themename = "gymbase";

//plugins activator
require_once("plugins_activator.php");

if (function_exists("vc_remove_element")) {
	vc_remove_element("vc_gmaps");
	vc_remove_element("vc_tour");
}

//theme options
gb_get_theme_file("/theme-options.php");

//menu walker
gb_get_theme_file("/mobile-menu-walker.php");

//custom meta box
gb_get_theme_file("/meta-box.php");

//dropdown menu
gb_get_theme_file("/nav-menu-dropdown-walker.php");

//weekdays
//gb_get_theme_file("/post-type-weekdays.php");

if (function_exists("vc_map")) {
	//classes
	//gb_get_theme_file("/post-type-classes.php");
	//trainers
	//gb_get_theme_file("/post-type-trainers.php");
	//gallery
	//gb_get_theme_file("/post-type-gallery.php");
	//contact_form
	gb_get_theme_file("/contact_form.php");
}

//comments
gb_get_theme_file("/comments-functions.php");

//widgets
gb_get_theme_file("/widgets/widget-cart-icon.php");
gb_get_theme_file("/widgets/widget-upcoming-classes.php");
gb_get_theme_file("/widgets/widget-home-box.php");
gb_get_theme_file("/widgets/widget-classes.php");
gb_get_theme_file("/widgets/widget-twitter.php");
gb_get_theme_file("/widgets/widget-footer-box.php");
gb_get_theme_file("/widgets/widget-contact-details.php");
gb_get_theme_file("/widgets/widget-scrolling-recent-posts.php");
gb_get_theme_file("/widgets/widget-scrolling-most-commented.php");
gb_get_theme_file("/widgets/widget-scrolling-most-viewed.php");
gb_get_theme_file("/widgets/widget-social-icons.php");

//shortcodes
if (function_exists("vc_map"))
	gb_get_theme_file("/shortcodes/shortcodes.php");

//admin functions
gb_get_theme_file("/admin/functions.php");

function theme_after_setup_theme()
{
	global $themename;
	if (!get_option($themename . "_installed") || !get_option("wpb_js_content_types")) {
		$theme_options = array(
			"favicon_url" => "",
			"logo_url" => get_template_directory_uri() . "/images/header_logo.png",
			"logo_first_part_text" => "GYM",
			"logo_second_part_text" => "BASE",
			"footer_text_left" => "© Copyright - <a href='https://themeforest.net/item/gymbase-responsive-gym-fitness-wordpress-theme/2732248?ref=QuanticaLabs' target='_blank'>GymBase Theme</a> by <a href='http://quanticalabs.com' title='QuanticaLabs' target='_blank'>QuanticaLabs</a>",
			"footer_text_right" => "[scroll_top]",
			"home_page_top_hint" => "Give us a call: +123 356 123 124",
			"responsive" => 1,
			"slider_image_url" => array(
				get_template_directory_uri() . "/images/slider/img1.jpg",
				get_template_directory_uri() . "/images/slider/img2.jpg",
				get_template_directory_uri() . "/images/slider/img3.jpg"
			),
			"slider_image_title" => array(
				"INDOOR CYCLING",
				"GYM FITNESS",
				"CARDIO FITNESS"
			),
			"slider_image_subtitle" => array(
				"strength, stamina, power",
				"strength, speed, stamina",
				"cardiovascular fitness"
			),
			"slider_image_link" => array(
				"classes#indoor-cycling",
				"classes#gym-fitness",
				"classes#cardio-fitness"
			),
			"slider_autoplay" => "true",
			"slide_interval" => 5000,
			"slider_effect" => "slide",
			"slider_transition" => "swing",
			"slider_transition_speed" => 500,
			"show_share_box" => "true",
			"social_icon_type" => array(
				"facebook",
				"twitter",
				"google",
			),
			"social_icon_url" => array(
				"https://www.facebook.com/sharer/sharer.php?u={URL}",
				"https://twitter.com/home?status={URL}",
				"https://plus.google.com/share?url={URL}",
			),
			"social_icon_target" => array(
				"new_window",
				"new_window",
				"new_window",
			),
			"header_font" => "",
			"header_font_subset" => "",
			"subheader_font" => "",
			"subheader_font_subset" => "",
			"terms_checkbox_comments" => "",
			"terms_message_comments" => "",
			"google_api_code" => "",
			"google_recaptcha" => "",
			"google_recaptcha_comments" => "",
			"recaptcha_site_key" => "",
			"recaptcha_secret_key" => "",
			"collapsible_mobile_submenus" => 1,
			"ga_tracking_code" => "",
			"header_background_color" => "",
			"body_background_color" => "",
			"footer_background_color" => "",
			"slider_title_color" => "",
			"slider_subtitle_color" => "",
			"slider_text_border_color" => "",
			"body_headers_color" => "",
			"body_headers_border_color" => "",
			"body_text_color" => "",
			"body_text2_color" => "",
			"footer_headers_color" => "",
			"footer_headers_border_color" => "",
			"footer_text_color" => "",
			"timeago_label_color" => "",
			"sentence_color" => "",
			"logo_first_part_text_color" => "",
			"logo_second_part_text_color" => "",
			"body_button_color" => "",
			"body_button_hover_color" => "",
			"body_button_border_hover_color" => "",
			"body_button_border_color" => "",
			"footer_button_color" => "",
			"footer_button_hover_color" => "",
			"footer_button_border_hover_color" => "",
			"footer_button_border_color" => "",
			"menu_link_color" => "",
			"menu_link_border_color" => "",
			"menu_active_color" => "",
			"menu_active_border_color" => "",
			"menu_hover_color" => "",
			"menu_hover_border_color" => "",
			"submenu_background_color" => "",
			"submenu_hover_background_color" => "",
			"submenu_color" => "",
			"submenu_hover_color" => "",
			"mobile_menu_link_color" => "",
			"mobile_menu_position_background_color" => "",
			"mobile_menu_active_link_color" => "",
			"mobile_menu_active_position_background_color" => "",
			"form_hint_color" => "",
			"form_field_text_color" => "",
			"form_field_border_color" => "",
			"form_field_active_border_color" => "",
			"link_color" => "",
			"link_hover_color" => "",
			"date_box_color" => "",
			"date_box_text_color" => "",
			"date_box_comments_number_text_color" => "",
			"date_box_comments_number_border_color" => "",
			"date_box_comments_number_hover_border_color" => "",
			"gallery_box_color" => "",
			"gallery_box_text_first_line_color" => "",
			"gallery_box_text_second_line_color" => "",
			"gallery_box_hover_color" => "",
			"gallery_box_hover_text_first_line_color" => "",
			"gallery_box_hover_text_second_line_color" => "",
			"timetable_box_color" => "",
			"timetable_box_hover_color" => "",
			"gallery_details_box_border_color" => "",
			"bread_crumb_border_color" => "",
			"accordion_item_border_color" => "",
			"accordion_item_border_hover_color" => "",
			"accordion_item_border_active_color" => "",
			"copyright_area_border_color" => "",
			"top_hint_background_color" => "",
			"top_hint_text_color" => "",
			"comment_reply_button_color" => "",
			"post_author_link_color" => "",
			"contact_details_box_background_color" => "",
			"cf_admin_name" => get_option("admin_email"),
			"cf_admin_email" => get_option("admin_email"),
			"cf_smtp_host" => "",
			"cf_smtp_username" => "",
			"cf_smtp_password" => "",
			"cf_smtp_port" => "",
			"cf_smtp_secure" => "",
			"cf_email_subject" => "GymBase WP: Contact from WWW",
			"cf_template" => "<html>
	<head>
	</head>
	<body>
		<div><b>First and last name</b>: [name]</div>
		<div><b>E-mail</b>: [email]</div>
		<div><b>Website</b>: [website]</div>
		<div><b>Message</b>: [message]</div>
	</body>
</html>",
			"cf_name_message" => __("Please enter your name.", 'gymbase'),
			"cf_email_message" => __("Please enter valid e-mail.", 'gymbase'),
			"cf_website_message" => __("Please enter website url.", 'gymbase'),
			"cf_message_message" => __("Please enter your message.", 'gymbase'),
			"cf_recaptcha_message" => __("Please verify captcha.", 'gymbase'),
			"cf_terms_message" => __("Checkbox is required.", 'gymbase'),
			"cf_thankyou_message" => __("Thank you for contacting us", 'gymbase'),
			"cf_error_message" => __("Sorry, we can't send this message", 'gymbase'),
			"cf_name_message_comments" => __("Please enter your name.", 'gymbase'),
			"cf_email_message_comments" => __("Please enter valid e-mail.", 'gymbase'),
			"cf_comment_message_comments" => __("Please enter your message.", 'gymbase'),
			"cf_recaptcha_message_comments" => __("Please verify captcha.", 'gymbase'),
			"cf_terms_message_comments" => __("Checkbox is required.", 'gymbase'),
			"cf_thankyou_message_comments" => __("Your comment has been added.", 'gymbase'),
			"cf_error_message_comments" => __("Error while adding comment.", 'gymbase'),
			"contact_logo_first_part_text" => "GYM",
			"contact_logo_second_part_text" => "BASE",
			"contact_phone" => "+123 655 655",
			"contact_fax" => "+123 755 755",
			"contact_email" => "gymbase@mail.com"
		);
		add_option($themename . "_options", $theme_options);

		add_option(
			"wpb_js_content_types",
			array(
				"page",
				"classes",
				"trainers",
				"gymbase_gallery",
			)
		);

		update_option("blogdescription", "Responsive WordPress Gym Fitness Theme");

		add_option($themename . "_installed", 1);
	}
	//Make theme available for translation
	//Translations can be filed in the /languages/ directory
	load_theme_textdomain('gymbase', get_template_directory() . '/languages');

	//register blog post thumbnail & portfolio thumbnail
	add_theme_support("post-thumbnails");
	add_image_size("blog-post-thumb", 500, 220, true);
	add_image_size($themename . "-gallery-image", 480, 360, true);
	add_image_size($themename . "-gallery-thumb", 240, 180, true);
	add_image_size($themename . "-small-thumb", 80, 80, true);

	//woocommerce
	add_theme_support("woocommerce");
	add_theme_support("wc-product-gallery-zoom");
	add_theme_support("wc-product-gallery-lightbox");
	add_theme_support("wc-product-gallery-slider");
	//enable custom background
	add_theme_support("custom-background"); //3.4
	//add_custom_background(); //deprecated
	//title tag
	add_theme_support("title-tag");
	//register menu
	add_theme_support("menus");

	if (function_exists("register_nav_menu")) {
		register_nav_menu("main-menu", "Main Menu");
	}

	//custom theme filters
	add_filter('wp_title', 'cs_wp_title_filter', 10, 2);
	add_filter('upload_mimes', 'custom_upload_files');
	add_filter('site_transient_update_plugins', 'gymbase_filter_update_vc_plugin', 10, 2);
	add_filter("image_size_names_choose", "theme_image_sizes");
	add_filter('excerpt_more', 'theme_excerpt_more', 99);
	//using shortcodes in sidebar
	add_filter("widget_text", "do_shortcode");

	//custom theme woocommerce filters
	add_filter('woocommerce_pagination_args', 'gb_woo_custom_override_pagination_args');
	add_filter('woocommerce_product_single_add_to_cart_text', 'gb_woo_custom_cart_button_text');
	add_filter('woocommerce_product_add_to_cart_text', 'gb_woo_custom_cart_button_text');
	add_filter('loop_shop_columns', 'gb_woo_custom_loop_columns');
	add_filter('woocommerce_product_description_heading', 'gb_woo_custom_product_description_heading');
	add_filter('woocommerce_checkout_fields', 'gb_woo_custom_override_checkout_fields');
	add_filter('woocommerce_show_page_title', 'gb_woo_custom_show_page_title');
	add_filter('loop_shop_per_page', 'gb_loop_shop_per_page', 20);
	add_filter('woocommerce_review_gravatar_size', 'gb_woo_custom_review_gravatar_size');

	//custom theme actions
	if (!function_exists('_wp_render_title_tag'))
		add_action('wp_head', 'cs_theme_slug_render_title');

	//custom theme woocommerce actions
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	//remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

	//phpMailer
	add_action('phpmailer_init', 'gb_phpmailer_init');

	//register sidebars
	if (function_exists("register_sidebar")) {
		register_sidebar(array(
			"id" => "home-top",
			"name" => "Sidebar Home Top",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		));
		register_sidebar(array(
			"id" => "home-right",
			"name" => "Sidebar Home Right",
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="box_header">',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			"id" => "header-top",
			"name" => "Sidebar Header Top",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		));
		register_sidebar(array(
			"id" => "header-top-right",
			"name" => "Sidebar Header Top Right",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		));
		register_sidebar(array(
			"id" => "header",
			"name" => "Sidebar Header",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		));
		register_sidebar(array(
			"id" => "right",
			"name" => "Sidebar Right",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		));
		register_sidebar(array(
			"id" => "blog",
			"name" => "Sidebar Blog",
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="box_header">',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			"id" => "footer-top",
			"name" => "Sidebar Footer Top",
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		));
		register_sidebar(array(
			"id" => "footer-bottom",
			"name" => "Sidebar Footer Bottom",
			'before_widget' => '<div id="%1$s" class="widget %2$s footer_box">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="box_header">',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			"id" => "sidebar-shop",
			"name" => "Sidebar Shop",
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="box_header">',
			'after_title' => '</h3>'
		));
	}
}
add_action("after_setup_theme", "theme_after_setup_theme");
function theme_switch_theme($theme_template)
{
	global $themename;
	delete_option($themename . "_installed");
}
add_action("switch_theme", "theme_switch_theme");

//theme options
global $theme_options;
$theme_options = array(
	"favicon_url" => '',
	"logo_url" => '',
	"logo_first_part_text" => '',
	"logo_second_part_text" => '',
	"footer_text_left" => '',
	"footer_text_right" => '',
	"home_page_top_hint" => '',
	"responsive" => '',
	"terms_checkbox_comments" => '',
	"terms_message_comments" => '',
	"google_api_code" => '',
	"google_recaptcha" => '',
	"google_recaptcha_comments" => '',
	"recaptcha_site_key" => '',
	"recaptcha_secret_key" => '',
	"collapsible_mobile_submenus" => '',
	"ga_tracking_code" => '',
	"slider_image_url" => '',
	"slider_image_title" => '',
	"slider_image_subtitle" => '',
	"slider_image_link" => '',
	"slider_autoplay" => '',
	"slide_interval" => '',
	"slider_effect" => '',
	"slider_transition" => '',
	"slider_transition_speed" => '',
	"show_share_box" => '',
	"social_icon_type" => '',
	"social_icon_url" => '',
	"social_icon_target" => '',
	"footer_text_left" => '',
	"footer_text_right" => '',
	"cf_admin_name" => '',
	"cf_admin_email" => '',
	"cf_smtp_host" => '',
	"cf_smtp_username" => '',
	"cf_smtp_password" => '',
	"cf_smtp_port" => '',
	"cf_smtp_secure" => '',
	"cf_email_subject" => '',
	"cf_template" => '',
	"cf_name_message" => '',
	"cf_email_message" => '',
	"cf_website_message" => '',
	"cf_message_message" => '',
	"cf_recaptcha_message" => '',
	"cf_terms_message" => '',
	"cf_thankyou_message" => '',
	"cf_error_message" => '',
	"cf_name_message_comments" => '',
	"cf_email_message_comments" => '',
	"cf_comment_message_comments" => '',
	"cf_recaptcha_message_comments" => '',
	"cf_terms_message_comments" => '',
	"cf_thankyou_message_comments" => '',
	"cf_error_message_comments" => '',
	"contact_logo_first_part_text" => '',
	"contact_logo_second_part_text" => '',
	"contact_phone" => '',
	"contact_fax" => '',
	"contact_email" => '',
	"header_background_color" => '',
	"body_background_color" => '',
	"footer_background_color" => '',
	"link_color" => '',
	"link_hover_color" => '',
	"slider_title_color" => '',
	"slider_subtitle_color" => '',
	"slider_text_border_color" => '',
	"body_headers_color" => '',
	"body_headers_border_color" => '',
	"body_text_color" => '',
	"body_text2_color" => '',
	"footer_headers_color" => '',
	"footer_headers_border_color" => '',
	"footer_text_color" => '',
	"timeago_label_color" => '',
	"sentence_color" => '',
	"logo_first_part_text_color" => '',
	"logo_second_part_text_color" => '',
	"body_button_color" => '',
	"body_button_hover_color" => '',
	"body_button_border_color" => '',
	"body_button_border_hover_color" => '',
	"footer_button_color" => '',
	"footer_button_hover_color" => '',
	"footer_button_border_color" => '',
	"footer_button_border_hover_color" => '',
	"menu_link_color" => '',
	"menu_link_border_color" => '',
	"menu_active_color" => '',
	"menu_active_border_color" => '',
	"menu_hover_color" => '',
	"menu_hover_border_color" => '',
	"submenu_background_color" => '',
	"submenu_hover_background_color" => '',
	"submenu_color" => '',
	"submenu_hover_color" => '',
	"mobile_menu_link_color" => '',
	"mobile_menu_position_background_color" => '',
	"mobile_menu_active_link_color" => '',
	"mobile_menu_active_position_background_color" => '',
	"form_hint_color" => '',
	"form_field_text_color" => '',
	"form_field_border_color" => '',
	"form_field_active_border_color" => '',
	"date_box_color" => '',
	"date_box_text_color" => '',
	"date_box_comments_number_text_color" => '',
	"date_box_comments_number_border_color" => '',
	"date_box_comments_number_hover_border_color" => '',
	"gallery_box_color" => '',
	"gallery_box_text_first_line_color" => '',
	"gallery_box_text_second_line_color" => '',
	"gallery_box_hover_color" => '',
	"gallery_box_hover_text_first_line_color" => '',
	"gallery_box_hover_text_second_line_color" => '',
	"timetable_box_color" => '',
	"timetable_box_hover_color" => '',
	"gallery_details_box_border_color" => '',
	"bread_crumb_border_color" => '',
	"accordion_item_border_color" => '',
	"accordion_item_border_hover_color" => '',
	"accordion_item_border_active_color" => '',
	"copyright_area_border_color" => '',
	"top_hint_background_color" => '',
	"top_hint_text_color" => '',
	"comment_reply_button_color" => '',
	"post_author_link_color" => '',
	"contact_details_box_background_color" => '',
	"header_font" => '',
	"header_font_subset" => '',
	"subheader_font" => '',
	"subheader_font_subset" => ''
);
$theme_options = theme_stripslashes_deep(array_merge($theme_options, get_option($themename . "_options")));

function theme_enqueue_scripts()
{
	global $themename;
	global $theme_options;
	//style
	if (!empty($theme_options["header_font"]))
		wp_enqueue_style("google-font-header", "//fonts.googleapis.com/css?family=" . urlencode($theme_options["header_font"]) . (!empty($theme_options["header_font_subset"]) ? "&subset=" . implode(",", $theme_options["header_font_subset"]) : ""));
	else
		wp_enqueue_style("google-font-droid-sans", "//fonts.googleapis.com/css?family=Droid+Sans");
	if (!empty($theme_options["subheader_font"]))
		wp_enqueue_style("google-font-subheader", "//fonts.googleapis.com/css?family=" . urlencode($theme_options["subheader_font"]) . (!empty($theme_options["subheader_font_subset"]) ? "&subset=" . implode(",", $theme_options["subheader_font_subset"]) : ""));
	else
		wp_enqueue_style("google-font-droid-serif", "//fonts.googleapis.com/css?family=Droid+Serif:400italic");
	wp_enqueue_style("reset", get_template_directory_uri() . "/style/reset.css");
	wp_enqueue_style("superfish", get_template_directory_uri() . "/style/superfish.css");
	wp_enqueue_style("jquery-fancybox", get_template_directory_uri() . "/style/fancybox/jquery.fancybox.css");
	wp_enqueue_style("slick", get_template_directory_uri() . "/style/slick.css");
	wp_enqueue_style("slick-theme", get_template_directory_uri() . "/style/slick-theme.css");
	wp_enqueue_style("jquery-qtip", get_template_directory_uri() . "/style/jquery.qtip.css");
	wp_enqueue_style("main", get_stylesheet_uri());
	if ((int) $theme_options["responsive"])
		wp_enqueue_style("responsive", get_template_directory_uri() . "/style/responsive.css");
	else
		wp_enqueue_style("no-responsive", get_template_directory_uri() . "/style/no_responsive.css");

	include_once(ABSPATH . 'wp-admin/includes/plugin.php');
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		wp_enqueue_style("woocommerce-custom", get_template_directory_uri() . "/woocommerce/style.css");
		if ((int) $theme_options["responsive"])
			wp_enqueue_style("woocommerce-responsive", get_template_directory_uri() . "/woocommerce/responsive.css");
		else
			wp_dequeue_style("woocommerce-smallscreen");
	}

	wp_enqueue_style("custom", get_template_directory_uri() . "/custom.css");
	wp_enqueue_style("kosmetolog_page", get_template_directory_uri() . "/style/kosmetolog_page_style.css");

	//js
	wp_enqueue_script("jquery");
	wp_enqueue_script("jquery-ui-core", array("jquery"));
	wp_enqueue_script("jquery-ui-accordion", array("jquery"));
	wp_enqueue_script("jquery-ui-tabs", array("jquery"));
	wp_enqueue_script("scriptdop", get_template_directory_uri() . "/js/scriptdop.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-ba-bqq", get_template_directory_uri() . "/js/jquery.ba-bbq.min.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-easing", get_template_directory_uri() . "/js/jquery.easing.1.3.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-carouFredSel", get_template_directory_uri() . "/js/jquery.carouFredSel-6.2.1-packed.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-timeago", get_template_directory_uri() . "/js/jquery.timeago.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-hint", get_template_directory_uri() . "/js/jquery.hint.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-isotope", get_template_directory_uri() . "/js/jquery.isotope.min.js", array("jquery"), '', true);
	//wp_enqueue_script("jquery-fancybox", get_template_directory_uri() . "/js/jquery.fancybox-1.3.4.pack.js", array("jquery"),'',true);
	wp_enqueue_script("jquery-qtip", get_template_directory_uri() . "/js/jquery.qtip.min.js", array("jquery"), '', true);
	wp_enqueue_script("jquery-block-ui", get_template_directory_uri() . "/js/jquery.blockUI.js", array("jquery"), '', true);
	wp_enqueue_script("slick", get_template_directory_uri() . "/js/slick.min.js", array("jquery"), '', true);
	wp_enqueue_script("kos_reviews_slider", get_template_directory_uri() . "/js/kos_reviews_slider.js", array("jquery"), '', true);
	//wp_register_script("google-maps-v3", "//maps.google.com/maps/api/js" . ($theme_options["google_api_code"]!="" ? "?key=" . esc_attr($theme_options["google_api_code"]) : ""), array(), false, true);
	//wp_register_script("google-recaptcha-v2", "//google.com/recaptcha/api.js", array(), false, true);
	if (function_exists("is_customize_preview") && !is_customize_preview())
		wp_enqueue_script("theme-main", get_template_directory_uri() . "/js/main.js", array("jquery", "jquery-ui-core", "jquery-ui-accordion", "jquery-ui-tabs"), '', true);

	//ajaxurl
	$data["ajaxurl"] = admin_url("admin-ajax.php");
	//themename
	$data["themename"] = $themename;
	//slider
	$data["slider_autoplay"] = $theme_options["slider_autoplay"];
	$data["slide_interval"] = $theme_options["slide_interval"];
	$data["slider_effect"] = $theme_options["slider_effect"];
	$data["slider_transition"] = $theme_options["slider_transition"];
	$data["slider_transition_speed"] = $theme_options["slider_transition_speed"];
	//pass data to javascript
	$params = array(
		'l10n_print_after' => 'config = ' . json_encode($data) . ';'
	);
	wp_localize_script("theme-main", "config", $params);
}
add_action("wp_enqueue_scripts", "theme_enqueue_scripts");

//function to display number of posts
function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}
	return (int) $count;
}

//function to count views
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, 1);
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
/* --- phpMailer config ---
/
/ fix by admin@kamenka.su 29.10.2021
/
/ function gb_phpmailer_init(PHPMailer $mail) */
function gb_phpmailer_init(\PHPMailer\PHPMailer\PHPMailer $mail)
{
	global $theme_options;
	$mail->CharSet = 'UTF-8';

	$smtp = $theme_options["cf_smtp_host"];
	if (!empty($smtp)) {
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPDebug = 2;
		$mail->Host = $theme_options["cf_smtp_host"];
		$mail->Username = $theme_options["cf_smtp_username"];
		$mail->Password = $theme_options["cf_smtp_password"];
		if ((int) $theme_options["cf_smtp_port"] > 0)
			$mail->Port = (int) $theme_options["cf_smtp_port"];
		$mail->SMTPSecure = $theme_options["cf_smtp_secure"];
	}
}

if (!function_exists('_wp_render_title_tag')) {
	function cs_theme_slug_render_title()
	{
		echo '<title>' . wp_title('-', true, 'right') . '</title>';
	}
}
function cs_wp_title_filter($title, $sep)
{
	//$title = get_bloginfo('name') . " | " . (is_home() || is_front_page() ? get_bloginfo('description') : $title);
	return $title;
}
//add new mimes for upload dummy content files (code can be removed after dummy content import)
function custom_upload_files($mimes)
{
	$mimes = array_merge($mimes, array('xml' => 'application/xml'), array('json' => 'application/json'), array('zip' => 'application/zip'), array('gz' => 'application/x-gzip'), array('ico' => 'image/x-icon'));
	return $mimes;
}
function gymbase_filter_update_vc_plugin($date)
{
	if (!empty($date->checked["js_composer/js_composer.php"]))
		unset($date->checked["js_composer/js_composer.php"]);
	if (!empty($date->response["js_composer/js_composer.php"]))
		unset($date->response["js_composer/js_composer.php"]);
	return $date;
}
function theme_image_sizes($sizes)
{
	global $themename;
	$addsizes = array(
		"blog-post-thumb" => __("Blog post thumbnail", 'gymbase'),
		$themename . "-gallery-image" => __("Gallery image", 'gymbase'),
		$themename . "-gallery-thumb" => __("Gallery thumbnail", 'gymbase'),
		$themename . "-small-thumb" => __("Small thumbnail", 'gymbase')
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
//excerpt
function theme_excerpt_more($more)
{
	return '';
}

/* --- Theme WooCommerce Custom Filters Functions --- */
function gb_woo_custom_override_pagination_args($args)
{
	$args['prev_text'] = __('&lsaquo;', 'gymbase');
	$args['next_text'] = __('&rsaquo;', 'gymbase');
	return $args;
}

function gb_woo_custom_cart_button_text()
{
	return __('Add to cart', 'gymbase');
}

if (!function_exists('loop_columns')) {
	function gb_woo_custom_loop_columns()
	{
		return 3; // 3 products per row
	}
}

function gb_woo_custom_product_description_heading()
{
	return '';
}

function gb_woo_custom_show_page_title()
{
	return false;
}

function gb_loop_shop_per_page($cols)
{
	return 6;
}

function gb_woo_custom_override_checkout_fields($fields)
{
	$fields['billing']['billing_first_name']['placeholder'] = __("First Name", 'gymbase');
	$fields['billing']['billing_last_name']['placeholder'] = __("Last Name", 'gymbase');
	$fields['billing']['billing_company']['placeholder'] = __("Company Name", 'gymbase');
	$fields['billing']['billing_email']['placeholder'] = __("Email Address", 'gymbase');
	$fields['billing']['billing_phone']['placeholder'] = __("Phone", 'gymbase');
	return $fields;
}

function gb_woo_custom_review_gravatar_size()
{
	return 100;
}

/**
 * Returns datetime in iso8601 format
 * @param type $time - optional string representation of datetime
 * @return type - datetime in iso8601 format
 */
function get_datetime_iso8601($time = null)
{
	$offset = get_option('gmt_offset');
	$timezone = ($offset < 0 ? '-' : '+') . (abs($offset) < 10 ? '0' . abs($offset) : abs($offset)) . '00';
	return date('Y-m-d\TH:i:s', (empty($time) ? time() : strtotime($time))) . $timezone;
}

// default locate_template() method returns file PATH, we need file URL for javascript and css
//function locate_template_uri($file)
//{
//	$website_path = str_replace("\\", "/", realpath(ABSPATH));
//	$site_url = site_url();
//	$file_path = str_replace("\\", "/", locate_template(ltrim($file, "/")));
//	$file_url = str_replace($website_path, $site_url, $file_path);
//	return $file_url;
//}
function gb_get_theme_file($file)
{
	if (file_exists(get_stylesheet_directory() . $file))
		require_once(get_stylesheet_directory() . $file);
	else
		require_once(get_template_directory() . $file);
}

//gymbase get_font_subsets
function gb_ajax_get_font_subsets()
{
	if ($_POST["font"] != "") {
		$subsets = '';
		$fontExplode = explode(":", $_POST["font"]);
		$subsets_array = gb_get_google_font_subset($fontExplode[0]);

		foreach ($subsets_array as $subset)
			$subsets .= '<option value="' . $subset . '">' . $subset . '</option>';

		echo "gb_start" . $subsets . "gb_end";
	}
	exit();
}
add_action('wp_ajax_gymbase_get_font_subsets', 'gb_ajax_get_font_subsets');

/**
 * Returns array of Google Fonts
 * @return array of Google Fonts
 */
function gb_get_google_fonts()
{
	//get google fonts
	$fontsArray = get_option("gymbase_google_fonts");
	//update if option doesn't exist or it was modified more than 2 weeks ago
	if ($fontsArray === FALSE || count((array) $fontsArray) == 0 || (time() - $fontsArray->last_update > 2 * 7 * 24 * 60 * 60)) {
		$google_api_url = 'http://quanticalabs.com/.tools/GoogleFont/font.txt';
		$fontsJson = wp_remote_retrieve_body(wp_remote_get($google_api_url, array('sslverify' => false)));
		$fontsArray = json_decode($fontsJson);
		$fontsArray->last_update = time();
		update_option("gymbase_google_fonts", $fontsArray);
	}
	return $fontsArray;
}

/**
 * Returns array of subsets for provided Google Font
 * @param type $font - Google font
 * @return array of subsets for provided Google Font
 */
function gb_get_google_font_subset($font)
{
	$subsets = array();
	//get google fonts
	$fontsArray = gb_get_google_fonts();
	$fontsCount = count($fontsArray->items);
	for ($i = 0; $i < $fontsCount; $i++) {
		if ($fontsArray->items[$i]->family == $font) {
			for ($j = 0, $max = count($fontsArray->items[$i]->subsets); $j < $max; $j++) {
				$subsets[] = $fontsArray->items[$i]->subsets[$j];
			}
			break;
		}
	}
	return $subsets;
}


remove_filter('the_content', 'wpautop');



add_action('wp_footer', 'mycustom_wp_footer');
function mycustom_wp_footer()
{

}

//добавляем поле 'real-comment' start
function wph_add_new_comment_field($args)
{

	if (preg_match('/<textarea.*textarea>/', $args['comment_field'], $match)) {
		$textarea = $match[0];
		$real_textarea = str_replace('comment', 'real-comment', $textarea, $count);

		if ($count) {
			$hidden_textarea = str_replace(
				'<textarea',
				'<textarea style="display:none;"',
				$textarea
			);
			$hidden_textarea = str_replace(
				'required="required"',
				'',
				$hidden_textarea
			);
			$hidden_textarea = str_replace(
				'aria-required="true"',
				'',
				$hidden_textarea
			);
			$args['comment_field'] = str_replace(
				$textarea,
				"$hidden_textarea$real_textarea",
				$args['comment_field']
			);
		}
	}
	return $args;
}
add_filter('comment_form_defaults', 'wph_add_new_comment_field', 30);
//добавляем поле 'real-comment' end


//проверка на спам start 
function wph_verify_spam()
{
	if (false === strpos($_SERVER['REQUEST_URI'], 'wp-comments-post.php'))
		return;
	if (!empty($_POST['comment']))
		wp_die('Спаму нет!');

	$_POST['comment'] = $_POST['real-comment'];
}
add_filter('init', 'wph_verify_spam');
//проверка на спам end

/*Смена длины отрывка записи для страницы поиска*/
function new_excerpt_length($length)
{
	if (is_search()) {
		return 25;
	} else {
		return 99;
	}
}
add_filter('excerpt_length', 'new_excerpt_length');

/*Создание типа записей Врачи и таксономия специализация*/
function create_doc_tax()
{
	$labels = array(
		'name' => 'Специализация',
		'singular_name' => 'Специализация',
		'search_items' => 'Найти специализацию',
		'all_items' => 'Все специализации',
		'parent_item' => 'Родительская категория',
		'parent_item_colon' => 'Родительская категория:',
		'edit_item' => 'Редактировать специализацию',
		'update_item' => 'Обновить специализацию',
		'add_new_item' => 'Добавить новую специализацию',
		'new_item_name' => 'Имя новой специализации',
		'menu_name' => 'Специализация',
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'spec'),
	);

	register_taxonomy('spec', 'doctor', $args);
}
add_action('init', 'create_doc_tax');

function doctors_init()
{
	register_post_type('doctor', array(
		'labels' => array(
			'name' => 'Врачи',
			'singular_name' => 'Врач',
			'add_new' => 'Добавить нового',
			'add_new_item' => 'Добавить нового врача',
			'edit_item' => 'Редактировать врача',
			'new_item' => 'Новый врач',
			'view_item' => 'Посмотреть врача',
			'search_items' => 'Найти врача',
			'not_found' => 'Врачей не найдено',
			'not_found_in_trash' => 'В корзине врачей не найдено',
			'parent_item_colon' => '',
			'menu_name' => 'Врачи'

		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-groups',
		'taxonomies' => array(),
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
	));
}
add_action('init', 'doctors_init');
/*-------------------------------*/

/*Тип записи "Вопрос-ответ"*/
function faq_init()
{
	register_post_type('faq', array(
		'labels' => array(
			'name' => 'Вопрос-ответ',
			'singular_name' => 'Вопрос',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый вопрос',
			'edit_item' => 'Редактировать вопрос',
			'new_item' => 'Новый вопрос',
			'view_item' => 'Посмотреть вопрос',
			'search_items' => 'Найти вопрос',
			'not_found' => 'Вопросов не найдено',
			'not_found_in_trash' => 'В корзине вопросов не найдено',
			'parent_item_colon' => '',
			'menu_name' => 'Вопрос-ответ'

		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'taxonomies' => array(),
		'supports' => array('title', 'page-attributes')
	));
}
add_action('init', 'faq_init');
/*-------------------------------*/

/*Тип записи "Отзывы"*/
function reviews_init()
{
	register_post_type('review', array(
		'labels' => array(
			'name' => 'Отзывы',
			'singular_name' => 'Отзыв',
			'add_new' => 'Добавить отзыв',
			'add_new_item' => 'Добавить новый отзыв',
			'edit_item' => 'Редактировать отзыв',
			'new_item' => 'Новый отзыв',
			'view_item' => 'Посмотреть отзыв',
			'search_items' => 'Найти отзыв',
			'not_found' => 'Отзывов не найдено',
			'not_found_in_trash' => 'В корзине отзывов не найдено',
			'parent_item_colon' => '',
			'menu_name' => 'Отзывы'

		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-format-status',
		'taxonomies' => array(),
		'supports' => array('title', 'editor', 'page-attributes', 'thumbnail')
	));
}
add_action('init', 'reviews_init');
/*-------------------------------*/

/*Иерархический список для таксономии*/
function make_hierarchical_terms(&$terms, &$result_tree, $parent_id = 0)
{
	foreach ($terms as $i => $term) {
		if ($term->parent == $parent_id) {
			$result_tree[$term->term_id] = $term;
			unset($terms[$i]);
		}
	}
	foreach ($result_tree as $term) {
		$term->children = [];
		make_hierarchical_terms($terms, $term->children, $term->term_id);
	}
}
/*-----------------------------------*/

/*Вопрос-ответ*/
add_action("wp_ajax_faqsel", "ajax_faqsel");
add_action("wp_ajax_nopriv_faqsel", "ajax_faqsel");
function ajax_faqsel()
{
	$cat = $_POST['cat'];
	$cat = json_decode($cat, true);
	$arg_posts = array(
		'orderby' => 'date',
		'order' => 'ASC',
		'posts_per_page' => 9,
		'post_type' => 'faq',
		'post_status' => 'publish'
	);
	if (!in_array(0, $cat)) {
		$arg_posts['meta_query'] = array('relation' => 'AND');
		$arg_posts['meta_query'][] = array(
			'key' => 'qnapr',
			'value' => $cat,
			'compare' => 'IN'
		);
	}
	$query = new WP_Query($arg_posts);
	$content = '';
	if ($query->have_posts())
		while ($query->have_posts()):
			$query->the_post();
			$prm = get_fields(get_the_ID());
			$doc = get_fields($prm['doc']);
			$content .= '<div class="faq_item">';
			$content .= '<div class="fq_head">';
			$content .= '<div class="fq_about">';
			$content .= '<p class="fq_title">' . get_the_title() . '</p>';
			$content .= '<p class="fq_name">' . $prm["qname"] . '</p></div>';
			$content .= '<p class="fq_date">' . get_the_date("d.m.Y") . '</p></div>';
			$content .= '<div class="fq_quest">' . $prm["qquest"] . '</div>';
			$content .= '<div class="fq_body"><p>Ответ:</p><div class="fqbody_l">';
			$content .= '<img src="' . get_the_post_thumbnail_url($prm["doc"], "thumbnail") . '" alt="' . get_the_title($prm["doc"]) . '"></div>';
			$content .= '<div class="fqbody_r">';
			$content .= '<div class="fqbody_txt">' . $prm["qansw"] . '</div>';
			$content .= '<div class="fqbody_down"><div class="fq_doctor">';
			if (!empty($doc['doctor_link'])) {
				$content .= '<p class="fqdoctor_name"><a href="' . $doc["doctor_link"] . '" target="_blank"><strong>' . get_the_title($prm["doc"]) . '</strong></a></p>';
			} else {
				$content .= '<p class="fqdoctor_name"><strong>' . get_the_title($prm["doc"]) . '</strong></p>';
			}
			$content .= '<p class="fqdoctor_staj">Стаж работы: ' . $doc["doctor_staj"] . '</p></div>';
			$content .= '<p class="fq_date">' . get_the_date("d.m.Y") . '</p>';
			$content .= '</div></div></div><div class="fq_spec">Направление:';
			$ntxt = get_term_by('id', $prm["qnapr"], 'spec');
			$slink = get_field('spec_link', 'spec_' . $prm["qnapr"]);
			if (!empty($slink)) {
				$content .= '<a href="' . $slink . '" target="_blank">' . $ntxt->name . '</a>';
			} else {
				$content .= '<span>' . $ntxt->name . '</span>';
			}
			$content .= '</div></div>';
		endwhile;
	wp_reset_postdata();
	if ($query->max_num_pages > 1) {
		$pagination = '<div class="pagn">';
		for ($i = 1; $i <= $query->max_num_pages; $i++) {
			if ($i == 1) {
				$cls = 'active';
			} else {
				$cls = "";
			}
			if ($i == 1 || $i == 2 || $i == $query->max_num_pages) {
				$pagination .= '<button class="' . $cls . '">' . $i . '</button>';
			} else if ($i == 3) {
				$pagination .= '<span>...</span>';
			}
		}
		$pagination .= '</div>';
	} else {
		$pagination = '';
	}
	if ($content == '') {
		$content = '<h2>В данном разделе пока нет вопросов</h2>';
		$pagination = '';
	}
	$return = array(
		'content' => $content,
		'pagination' => $pagination
	);
	echo json_encode($return);
	wp_die();
}

/*Пагинация*/
add_action("wp_ajax_faqpag", "ajax_faqpag");
add_action("wp_ajax_nopriv_faqpag", "ajax_faqpag");
function ajax_faqpag()
{
	$cat = $_POST['cat'];
	$cat = json_decode($cat, true);
	$pag = $_POST['pag'];
	$arg_posts = array(
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 9,
		'post_type' => 'faq',
		'post_status' => 'publish',
		'offset' => ($pg - 1) * 9,
	);
	if (!in_array(0, $cat)) {
		$arg_posts['meta_query'] = array('relation' => 'AND');
		$arg_posts['meta_query'][] = array(
			'key' => 'qnapr',
			'value' => $cat,
			'compare' => 'IN'
		);
	}
	$query = new WP_Query($arg_posts);
	$content = '';
	if ($query->have_posts())
		while ($query->have_posts()):
			$query->the_post();
			$prm = get_fields(get_the_ID());
			$doc = get_fields($prm['doc']);
			$content .= '<div class="faq_item">';
			$content .= '<div class="fq_head">';
			$content .= '<div class="fq_about">';
			$content .= '<p class="fq_title">' . get_the_title() . '</p>';
			$content .= '<p class="fq_name">' . $prm["qname"] . '</p></div>';
			$content .= '<p class="fq_date">' . get_the_date("d.m.Y") . '</p></div>';
			$content .= '<div class="fq_quest">' . $prm["qquest"] . '</div>';
			$content .= '<div class="fq_body"><p>Ответ:</p><div class="fqbody_l">';
			$content .= '<img src="' . get_the_post_thumbnail_url($prm["doc"], "thumbnail") . '" alt="' . get_the_title($prm["doc"]) . '"></div>';
			$content .= '<div class="fqbody_r">';
			$content .= '<div class="fqbody_txt">' . $prm["qansw"] . '</div>';
			$content .= '<div class="fqbody_down"><div class="fq_doctor">';
			if (!empty($doc['doctor_link'])) {
				$content .= '<p class="fqdoctor_name"><a href="' . $doc["doctor_link"] . '" target="_blank"><strong>' . get_the_title($prm["doc"]) . '</strong></a></p>';
			} else {
				$content .= '<p class="fqdoctor_name"><strong>' . get_the_title($prm["doc"]) . '</strong></p>';
			}
			$content .= '<p class="fqdoctor_staj">Стаж работы: ' . $doc["doctor_staj"] . '</p></div>';
			$content .= '<p class="fq_date">' . get_the_date("d.m.Y") . '</p>';
			$content .= '</div></div></div><div class="fq_spec">Направление:';
			$ntxt = get_term_by('id', $prm["qnapr"], 'spec');
			$slink = get_field('spec_link', 'spec_' . $prm["qnapr"]);
			if (!empty($slink)) {
				$content .= '<a href="' . $slink . '" target="_blank">' . $ntxt->name . '</a>';
			} else {
				$content .= '<span>' . $ntxt->name . '</span>';
			}
			$content .= '</div></div>';
		endwhile;
	wp_reset_postdata();
	for ($i = 1; $i <= $query->max_num_pages; $i++) {
		if ($i == $pag) {
			$cls = 'active';
		} else {
			$cls = "";
		}
		if ($i == 1 || $i == $pag || $i == $query->max_num_pages || $i == ($pag - 1) || $i == ($pag + 1)) {
			$pagination .= '<button class="' . $cls . '">' . $i . '</button>';
		} else if (($i == ($pag - 2) && $i != 1) || ($i == ($pag + 2) && $i != $query->max_num_pages)) {
			$pagination .= '<span>...</span>';
		}
	}
	if ($content == '') {
		$content = '<h2>В данном разделе пока нет вопросов</h2>';
		$pagination = '';
	}
	$return = array(
		'content' => $content,
		'pagination' => $pagination
	);
	echo json_encode($return);
	wp_die();
}
/*------------*/

/*Отзывы*/
/*Вопрос-ответ*/
add_action("wp_ajax_revsel", "ajax_revsel");
add_action("wp_ajax_nopriv_revsel", "ajax_revsel");
function ajax_revsel()
{
	$vr = $_POST['vrach'];
	$tp = $_POST['type'];
	$spc = $_POST['spec'];
	$arg_posts = array(
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 12,
		'post_type' => 'review',
		'post_status' => 'publish'
	);
	$arg_posts['meta_query'] = array('relation' => 'AND');
	if ($vr != 0) {
		$arg_posts['meta_query'][] = array(
			'key' => 'doc',
			'value' => $vr,
			'compare' => '=='
		);
	}
	if ($tp != 0) {
		switch ($tp) {
			case 1:
				$tp = 'vid';
				break;
			case 2:
				$tp = 'other';
				break;
			case 3:
				$tp = 'soc';
				break;
			case 4:
				$tp = 'our';
				break;
		}
		$arg_posts['meta_query'][] = array(
			'key' => 'revtype',
			'value' => $tp,
			'compare' => '=='
		);
	}
	if ($spc != 0) {
		$arg_posts['meta_query'][] = array(
			'key' => 'proc',
			'value' => $spc,
			'compare' => '=='
		);
	}
	$content = '';
	$query = new WP_Query($arg_posts);
	if ($query->have_posts())
		while ($query->have_posts()):
			$query->the_post();
			$content .= '<div class="rev_item"><div class="rev_head"><div class="rev_img">';
			if (!empty(get_the_post_thumbnail_url())) {
				$content .= '<img src="' . get_the_post_thumbnail_url() . '" alt="Отзыв">';
			}
			$content .= '</div><div class="rev_about"><div class="rev_stars">';
			$content .= '<img src="/wp-content/uploads/2023/04/stars.png" alt="Звезды"></div>';
			$prm = get_fields(get_the_ID());
			$content .= '<p class="rev_name">' . get_the_title() . '</p>';
			$content .= '<p class="rev_doc">Врач: <span>' . get_the_title($prm["doc"]) . '</span></p>';
			$ntxt = get_term_by('id', $prm['proc'], 'spec');
			$content .= '<p class="rev_spec">Процедура: <span>' . $ntxt->name . '</span></p>';
			$content .= '<p class="rev_type ' . $prm["revtype"]["value"] . '">' . $prm["revtype"]["label"] . '</p>';
			$content .= '</div><p class="rev_date">' . get_the_date() . '</p></div>';
			$content .= '<div class="rev_txt"><div>';
			$cont = get_the_content();
			$len = strlen($cont);
			if ($len > 200) {
				$cont1 = mb_strimwidth($cont, 0, 200, '') . '<span class="rdots">...</span>';
				$cont = $cont1 . '<span class="hidden">' . mb_strimwidth($cont, 200, $len, "") . '</span>';
			}
			$content .= $cont . '</div>';
			if ($len > 200) {
				$content .= '<button class="revitem_all"><span>Читать весь отзыв</span>';
				$content .= '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 6.75L9 11.25L13.5 6.75" stroke="#458F8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';
			}
			$content .= '</div></div>';
		endwhile;
	wp_reset_postdata();
	if ($content == '') {
		$content = '<h2>По заданным условиям отзывов не найдено</h2>';
		$pagination = '';
	}
	$return = array(
		'content' => $content,
		'pagination' => $pagination
	);
	echo json_encode($return);
	wp_die();
}

function your_wpcf7_mail_sent_function($contact_form)
{
	$title = $contact_form->title;
	$posted_data = $contact_form->posted_data;
	if ('Оставить отзыв' == $title) {
		$submission = WPCF7_Submission::get_instance();
		$posted_data = $submission->get_posted_data();
		$f7Name = $posted_data['revname'];
		$f7vr = $posted_data['revvr'];
		$f7proc = $posted_data['revtp'];
		$f7txt = $posted_data['revtxt'];
		$args = array(
			'post_type' => 'review',
			'post_title' => $f7Name,
			'post_content' => $f7txt,
			'post_status' => 'pending',
			'comment_status' => 'closed',
			'ping_status' => 'closed'
		);
		$tpid = wp_insert_post($args);
		update_field('field_643fcf4d6f335', $f7proc, $tpid);
		update_field('field_643fcf0b6f334', $f7vr, $tpid);
		update_field('field_643fcf856f336', 'our', $tpid);
	}
}
add_action('wpcf7_mail_sent', 'your_wpcf7_mail_sent_function');
/*------*/

/* send calltouch */
function custom_cf7_send_mail($contact_form)
{
	$call_value = $_COOKIE['_ct_session_id'];
	if (isset($_POST['call_value'])) {
		$call_value = $_POST['call_value'];
	}
	$ct_data = array(
		'subject' => 'Заявка',
		'fio' => isset($_POST['pu1tx']) ? $_POST['pu1tx'] : '',
		'phoneNumber' => isset($_POST['tmaska-7']) ? $_POST['tmaska-7'] : '',
		'requestUrl' => $_SERVER['HTTP_REFERER'],
		'sessionId' => $call_value
	);
	$ct_data_str = http_build_query($ct_data);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.calltouch.ru/calls-service/RestAPI/requests/63210/register/");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $ct_data_str);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$calltouch = curl_exec($ch);
	//file_put_contents(__DIR__ . '/calltouch_log.txt', print_r("\n \n"."request ".date("Y.m.d H:i")."\n".$calltouch , 1),FILE_APPEND | LOCK_EX);
	curl_close($ch);
}
add_action('wpcf7_before_send_mail', 'custom_cf7_send_mail');
/* send calltouch */

/*Функция "время на чтение"*/
if (!function_exists('gp_read_time')) {
	function gp_read_time()
	{
		$text = get_the_content('');
		if (empty($text)) {
			$fld = get_field('statya');
			foreach ($fld as $itm) {
				if ($itm['acf_fc_layout'] == 'txtblock') {
					$text .= $itm['txt'] . ' ';
				} else if ($itm['acf_fc_layout'] == 'blist') {
					foreach ($itm['list'] as $lst) {
						$text .= $lst['title'] . ' ';
						$text .= $lst['txt'] . ' ';
					}
				} else if ($itm['acf_fc_layout'] == 'vajno') {
					$text .= 'Важно ' . $itm['txt'] . ' ';
				} else if ($itm['acf_fc_layout'] == 'hak') {
					$text .= 'Лайфхак ' . $itm['txt'] . ' ';
				} else if ($itm['acf_fc_layout'] == 'slist') {
					foreach ($itm['list'] as $lst) {
						$text .= $lst['title'] . ' ';
						$text .= $lst['txt'] . ' ';
					}
				} else if ($itm['acf_fc_layout'] == 'artcit') {
					$text .= $itm['txt'] . ' ';
				} else if ($itm['acf_fc_layout'] == 'arttab2') {
					$text .= $itm['tabh1'] . ' ' . $itm['tabh2'] . ' ';
					foreach ($itm['tab'] as $tb) {
						$text .= $tb['tab1'] . ' ' . $tb['tab2'] . ' ';
					}
				} else if ($itm['acf_fc_layout'] == 'mnenie') {
					$text .= 'Мнение эксперта ' . $itm['txt'];
				} else if ($itm['acf_fc_layout'] == 'preims') {
					foreach ($itm['list'] as $lst) {
						$text .= $lst['txt'] . ' ';
					}
				}
			}
		}
		$words = str_word_count(strip_tags($text), 0, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ');
		if (!empty($words)) {
			$time_in_minutes = ceil($words / 200);
			$str = (string) $time_in_minutes;
			$str1 = substr($str, -1);
			switch ($str1) {
				case '1':
					if (substr($str, -2) != '1') {
						$str .= ' минута';
						break;
					}
				case '2';
				case '3';
				case '4';
					if (substr($str, -2) != '1') {
						$str .= ' минуты';
						break;
					}
				default:
					$str .= ' минут';
					break;
			}
			return $str;
		}
		return false;
	}
}
/*-------------------------*/

/*Включение поля отрывок для страниц*/
function theme_add_excerpt_to_pages()
{
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'theme_add_excerpt_to_pages');
/*---------------------------------------*/

/*Изменение длины отрывка*/
function theme_excerpt_length($length)
{
	return 10;
}
add_filter('excerpt_length', 'theme_excerpt_length');
/*-----------------------*/

/*Исключения для поиска*/
add_action('pre_get_posts', 'theme_search_filter');
function theme_search_filter($query)
{
	if (!is_admin() && $query->is_main_query() && $query->is_search) {
		$query->set('post_type', 'page');
		//$query->set( 'orderby', array('menu_order' => 'ASC', 'relevance' => 'ASC',  ) );
	}
}

/*Изменение сортировки поиска*/
add_filter('relevanssi_results', 'rlv_parent_weights');
function rlv_parent_weights($results)
{
	array_walk(
		$results,
		function (&$weight, $post_id) {
			if (in_array(wp_get_post_parent_id($post_id), array(7471, 1074, 1075, 1001, 5419, 5289, 5290, 1508, 6040, 5402, 5405, 5413, 5416, 5209, 5250), true)) {
				$weight *= 100;
			}
			if (in_array($post_id, array(5289, 5290, 1508, 6040, 5402, 5405, 5413, 5416, 5209, 5250), true)) {
				$weight *= 0.05;
			}
		}
	);

	return $results;
}
/*----------*/

/*Страница настроек ACF*/
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Настройки темы',
		'menu_title' => 'Настройки темы',
		'menu_slug' => 'options',
		'capability' => 'activate_plugins',
		'redirect' => false,
		'position' => 80,
	));
}
/*--------------------*/

/*Шорткод отзывов*/
add_shortcode('review_short', 'pagereviews');
function pagereviews()
{
	$args = array(
		'taxonomy' => 'spec',
		'hide_empty' => false,
		'meta_query' => array(
			array(
				'key' => 'spec_link',
				'value' => get_the_ID(),
			)
		)
	);
	$my_terms = get_terms($args);
	$trmid = $my_terms[0]->term_id;
	$arg_posts = array(
		'order' => 'DESC',
		'posts_per_page' => 9,
		'post_type' => 'review',
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => 'proc',
				'value' => $trmid
			)
		)
	);
	$content = '';
	$query = new WP_Query($arg_posts);
	if ($query->have_posts()) {
		$content .= '<a name="otzivi_procedura"></a>';
		$content .= '<h2>Отзывы</h2>';
		$content .= '<div class="reviews_all"><div class="p_subm"><a href="/o-nas/reviews/" class="subm">Все отзывы</a></div></div>';
		$content .= '<div class="otzivi_slider">';
		while ($query->have_posts()):
			$query->the_post();
			$content .= '<div class="revitem">';
			$content .= '<div class="revhead">';
			$content .= '<p class="revname">' . get_the_title() . '</p>';
			$content .= '<p class="revdate">' . get_the_date() . '</p>';
			$content .= '</div>';
			$content .= '<div class="revtxt"><div>';
			$cont = get_the_content();
			$len = mb_strlen($cont);
			if ($len > 200) {
				$cont1 = mb_strimwidth($cont, 0, 200, "") . '<span class="rdots">...</span>';
				$cont2 = mb_strimwidth($cont, 200, $len, '');
				$cont = $cont1 . '<span class="hidden">' . $cont2 . '</span>';
			}
			$content .= $cont . '</div>';
			if ($len > 200) {
				$content .= '<button class="revitem_all">Читать весь отзыв</button>';
			}
			$content .= '</div>';
			$content .= '</div>';
		endwhile;
		$content .= '</div>';
	}
	wp_reset_postdata();

	return $content;
}
/*---------------*/

add_filter('wpseo_title', 'my_wpseo_title');
function my_wpseo_title($title)
{
	$current_page = $_SERVER['REQUEST_URI'];
	$current_page = explode('?', $current_page);
	$current_page = $current_page[0];
	$current_page = explode('/page/', $current_page);
	$current_page = $current_page[1];
	$current_page = str_replace('/', '', $current_page);

	if (!empty($current_page)) {
		$title = $title . ' - страница ' . $current_page;
	}

	return $title;
}

add_filter('wpseo_metadesc', 'my_wpseo_desc', 10, 2);
function my_wpseo_desc($description, $presentation)
{
	$current_page = $_SERVER['REQUEST_URI'];
	$current_page = explode('?', $current_page);
	$current_page = $current_page[0];
	$current_page = explode('/page/', $current_page);
	$current_page = $current_page[1];
	$current_page = str_replace('/', '', $current_page);

	if (!empty($current_page)) {
		$description = $description . ' - страница ' . $current_page;
	}

	return $description;
}



// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


/*Тип записи "faq_new"*/
function faq_new_init()
{
	register_post_type('faq_new', array(
		'labels' => array(
			'name' => 'FAQ',
			'singular_name' => 'faq',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый вопрос',
			'edit_item' => 'Редактировать вопрос',
			'new_item' => 'Новый вопрос',
			'view_item' => 'Посмотреть вопрос',
			'search_items' => 'Найти вопрос',
			'not_found' => 'Вопросов не найдено',
			'not_found_in_trash' => 'В корзине вопросов не найдено',
			'parent_item_colon' => '',
			'menu_name' => 'FAQ'

		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'taxonomies' => array(),
		'supports' => array('title', 'page-attributes')
	));
}
add_action('init', 'faq_new_init');
/*-------------------------------*/


add_filter('manage_faq_new_posts_columns', function ($columns) {
	$my_columns = [
		'id' => 'Шорткод',
		'custom_button' => 'Действие',
	];
	return array_slice($columns, 0, 2) + $my_columns + $columns;
});

add_filter('manage_faq_new_posts_custom_column', function ($column_name, $post_ID) {
	if ($column_name === 'id') {
		echo '<span id="text-to-copy">[add_new_faq id="' . $post_ID . '"]</span>';
	}
	if ($column_name === 'custom_button') {
		echo '<button type="button" class="my-custom-button" data-post-id="' . $post_ID . '">Копировать шорткод</button>';
	}
	return $column_name;
}, 10, 2);

// Подключение скрипта
add_action('admin_footer', 'my_custom_scripts');

function my_custom_scripts()
{
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('.my-custom-button').click(function () {
				var copy = $('#text-to-copy').text();
				navigator.clipboard.writeText(copy);
				// Здесь вы можете выполнить любое другое действие, например, AJAX-запрос
			});
		});
	</script>
	<?php
}

global $askdata;
global $ansdata;

$askdata = array();
$ansdata = array();

add_shortcode('add_new_faq', 'add_new_faq_func');

function add_new_faq_func($atts)
{
	global $askdata;
	global $ansdata;

	$atts = shortcode_atts(array(
		'id' => '',
	), $atts);
	$arg = array(
		'post_type' => 'faq_new',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'include' => $atts['id']
	);
	$out_posts = get_posts($arg);
	$item_count = 0;
	$out = '<div class="block7">';
	foreach ($out_posts as $post) {

		setup_postdata($post);

		if (have_rows('ask_ans', $atts['id'])) {
			while (have_rows('ask_ans', $atts['id'])) {
				the_row();

				if ($item_count % 2 == 0) {
					$out .= '<div class="b7_holder">';
				}
				$item_count += 1;

				if (get_row_layout() == 'ask') {
					$out .= '
          <label class="accordion">
            <input type="checkbox" name="checkbox-accordion">
            <div class="accordion__header">' . get_sub_field('ask_now') . '</div>
            <div class="accordion__content">' . get_sub_field('ans_now') . '</div>
          </label>';

					$askdata[] = get_sub_field('ask_now');
					$ansdata[] = get_sub_field('ans_now');
				}

				if ($item_count % 2 == 0) {
					$out .= '</div>';
				}
			}
		}
	}
	if ($item_count % 2 != 0) {
		$out .= '</div>';
	}
	$out .= '</div>';

	wp_reset_postdata();

	return $out;
}



// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++