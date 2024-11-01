<?php
/**
 * Plugin Name: SL Tools
 * Plugin URI:  http://www.reitzdesigns.com/2010/07/second-life-tools-wordpress-plugin/
 * Description: A set of usefiul tools for Second Life bloggers.
 * Version: 1.0
 * Author: Paul Reitz
 * Author URI: http://reitzdesigns.com/
 */

include_once( 'php/slurl_shortcode.php' );
include_once( 'php/slurl_widget.php' );

include_once( 'geshi/geshi.php' );
include_once( 'php/lsl_parser.php');
include_once( 'php/lsl_parser_constants.php' );

/**
 * Add the settings page for the LSL highlighter.
 */
if ( !function_exists( 'sl_lsl_add_admin_page' ) ):
function sl_lsl_add_admin_page()
{
	include( 'php/lsl_parser_admin.php' );
}
endif; // END FUNCTION sl_lsl_add_admin_page

/**
 * Add the LSL highlight Settings page to the menu.
 */
if (!function_exists( 'sl_lsl_add_admin_action' ) ):
function sl_lsl_add_admin_action()
{
	add_options_page( 'Edit LSL Highlight Settings', 'Edit LSL Highlight Settings', 9, basename(__FILE__), 'sl_lsl_add_admin_page' );
}
endif; // END FUNCTION sl_lsl_add_admin_action
add_action( 'admin_menu', 'sl_lsl_add_admin_action' );

/**
 * Add the SLURL Widget.
 */
if ( !function_exists( 'sl_load_slurl_widget' ) ):
function sl_load_slurl_widget()
{
	register_widget( 'SLURL_Widget' );
}
endif; // END FUNCTION sl_load_slurl_widget
add_action( 'widgets_init', 'sl_load_slurl_widget' );

/********************************************************************************************/

/**
 * Add Shortcodes.
 */
add_shortcode( 'slurl', 'sl_slurl_shortcode' );
add_shortcode( 'lsl', 'sl_parse_lsl_shortcode' );


/********************************************************************************************/

/**
 * Set up some default values for the LSL parser when the plugin is first activated.
 */
if ( !function_exists( 'sl_lsl_set_defaults' ) ):
function sl_lsl_set_defaults()
{
	$settings = array(	SL_LSL_BACKGROUND_COLOR 			=> 'FFFFFF',
					  				SL_LSL_KEYWORD_COLOR				=> '0000FA',
									SL_LSL_EVENT_COLOR					=> '00A0A0',
									SL_LSL_FUNCTION_COLOR			=> 'A00000',
									SL_LSL_CONSTANT_COLOR			=> '0000A0',
									SL_LSL_STRING_COLOR					=> '00A000',
									SL_LSL_COMMENT_COLOR			=> 'FF7700',
									SL_LSL_NUMBER_COLOR				=> '000000',
									SL_LSL_SYMBOL_COLOR				=> '000000',
									SL_LSL_TEXT_COLOR					=> '000000',
									SL_LSL_DATATYPE_COLOR			=> '007700',
									SL_LSL_KEYWORD_BOLD				=> '0',
									SL_LSL_EVENT_BOLD					=> '0',
									SL_LSL_FUNCTION_BOLD				=> '0',
									SL_LSL_CONSTANT_BOLD				=> '0',
									SL_LSL_STRING_BOLD					=> '0',
									SL_LSL_COMMENT_BOLD				=> '0',
									SL_LSL_NUMBER_BOLD					=> '0',
									SL_LSL_SYMBOL_BOLD					=> '0',
									SL_LSL_TEXT_BOLD						=> '0',
									SL_LSL_DATATYPE_BOLD				=> '0',
									SL_LSL_KEYWORD_ITALIC				=> '0',
									SL_LSL_EVENT_ITALIC					=> '0',
									SL_LSL_FUNCTION_ITALIC				=> '0',
									SL_LSL_CONSTANT_ITALIC			=> '0',
									SL_LSL_STRING_ITALIC					=> '0',
									SL_LSL_COMMENT_ITALIC				=> '0',
									SL_LSL_NUMBER_ITALIC				=> '0',
									SL_LSL_SYMBOL_ITALIC				=> '0',
									SL_LSL_TEXT_ITALIC					=> '0',
									SL_LSL_DATATYPE_ITALIC			=> '0',
									SL_LSL_KEYWORD_UNDERLINE		=> '0',
									SL_LSL_EVENT_UNDERLINE			=> '0',
									SL_LSL_FUNCTION_UNDERLINE		=> '0',
									SL_LSL_CONSTANTS_UNDERLINE	=> '0',
									SL_LSL_STRING_UNDERLINE			=> '0',
									SL_LSL_COMMENT_UNDERLINE		=> '0',
									SL_LSL_NUMBER_UNDERLINE			=> '0',
									SL_LSL_SYMBOL_UNDERLINE			=> '0',
									SL_LSL_TEXT_UNDERLINE				=> '0',
									SL_LSL_DATATYPE_UNDERLINE		=> '0',);
	
	update_option( SL_LSL_OPTIONS_NAME, $settings );
}
endif; // END FUNCTION sl_lsl_set_defaults.
register_activation_hook( __FILE__, 'sl_lsl_set_defaults' );


/********************************************************************************************/

/**
 * Remove the settings from the database wihen the plugin is deactivated.
 */
if ( !function_exists( 'sl_lsl_clean_database' ) ):
function sl_lsl_clean_database()
{
	delete_option( SL_LSL_OPTIONS_NAME );
}
endif; // END FUNCTION sl_lsl_clean_database.
register_deactivation_hook( __FILE__, 'sl_lsl_clean_database' );
?>