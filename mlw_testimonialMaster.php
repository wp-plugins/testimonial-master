<?php

/*
Plugin Name: Testimonial Master
Description: Use this plugin to enter and display testimonials
Version: 0.1.3
Author: Frank Corso
Author URI: http://www.mylocalwebstop.com/
Plugin URI: http://www.mylocalwebstop.com/
*/

/* 
Copyright 2014, My Local Webstop (email : fpcorso@mylocalwebstop.com)

Disclaimer of Warranties. 

The plugin is provided "as is". My Local Webstop and its suppliers and licensors hereby disclaim all warranties of any kind, 
express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. 
Neither My Local Webstop nor its suppliers and licensors, makes any warranty that the plugin will be error free or that access thereto will be continuous or uninterrupted.
You understand that you install, operate, and unistall the plugin at your own discretion and risk.
*/


///Files to Include
include("includes/mlw_tm_admin.php");
include("includes/mlw_tm_settings.php");
include("includes/mlw_tm_install.php");
include("includes/mlw_tm_update.php");
include("includes/mlw_tm_shortcodes.php");
include("includes/mlw_tm_widgets.php");
include("includes/mlw_tm_help.php");


///Activation Actions
add_action('admin_menu', 'mlw_tm_add_menu');
add_action('init', 'mlw_tm_update');
add_action('widgets_init', create_function('', 'return register_widget("Mlw_Tm_Random_Widget");'));
add_shortcode('mlw_tm_all', 'mlw_tm_all_shortcode');
add_shortcode('mlw_tm_random', 'mlw_tm_random_shortcode');
register_activation_hook( __FILE__, 'mlw_tm_activate');
register_deactivation_hook( __FILE__, 'mlw_tm_deactivate');

//Setup Translations
function mlw_tm_translation_setup() {
  load_plugin_textdomain( 'mlw_tm_text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action('plugins_loaded', 'mlw_tm_translation_setup');


///Create Admin Pages
function mlw_tm_add_menu()
{
	if (function_exists('add_menu_page'))
	{
		add_menu_page('Testimonial Master', 'Testimonials', 'manage_options', __FILE__, 'mlw_tm_generate_admin_page', 'dashicons-star-filled');
		add_submenu_page(__FILE__, 'Help', 'Help', 'manage_options', 'mlw_tm_help', 'mlw_tm_generate_help_page');
	}
}
/*


*/
?>