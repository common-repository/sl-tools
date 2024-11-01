<?php
/**
 * Base PHP file for LSL parsing shortcode.
 *
 * Parses the contents of a [lsl] shortcode to display lsl code with syntax highlighting.
 */

/**
 * Parses LSL code between the open and close [lsl] shortcode tags.
 */
 
 $styled = false;
if ( !function_exists( 'sl_parse_lsl_shortcode' ) ):
function sl_parse_lsl_shortcode( $attr, $content = null )
{
	if ($content == null)
	{
		$atts = shortcode_atts(array( 'src' => ''), $attr);
		if ( $atts['src'] != '' )
		{
			$file = fopen( $atts['src'], 'r' );
			while ( !feof( $file ) )
			{
				$content .= fgetc( $file );
			}
			fclose( $file );
		}
	}
	extract( get_option( SL_LSL_OPTIONS_NAME ) );
	$content = strip_tags($content);
	//$content = utf8_decode($content);
	$content = html_entity_decode($content, ENT_QUOTES, 'UTF-8');
	$parsed_content = '<pre class="lsl-block" style="background-color:#'.$sl_lsl_background_color.'; color:#'.$sl_lsl_text_color.'; line-height:16px;';
	if ( $sl_lsl_text_bold == '1' ) { $parsed_content .= 'font-weight:bold;'; }
	if ( $sl_lsl_text_italic == '1' ) { $parsed_content .= 'font-style:italic;'; }
	if ( $sl_lsl_text_underline == '1' ) { $parsed_content .= 'text-decoration:underlined'; }
	$parsed_content .='overflow:auto; padding:10px; margin-top:5px; margin-bottom:5px;">';
	$geshi = new GeSHi( $content, 'lsl2' );
	$geshi->set_header_type( GESHI_HEADER_PRE );
	//$geshi->enable_line_numbers( ( $sl_lsl_show_line_numbers == '1')? GESHI_NORMAL_LINE_NUMBERS : GESHI_NO_LINE_NUMBERS );
	$geshi->enable_line_numbers( GESHI_NO_LINE_NUMBERS );
	$geshi->enable_classes();
	
	// Set element styles from settings.
	$geshi->set_link_styles( GESHI_LINK, 'text-decoration: none;' );
	
	//comments
	$geshi->set_comments_style( 1, 'color: #'.$sl_lsl_comment_color.';' );
	$geshi->set_comments_style( 1, ( $sl_lsl_comment_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_comments_style( 1, ( $sl_lsl_comment_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_comments_style( 1, ( $sl_lsl_comment_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	//constants
	$geshi->set_keyword_group_style( 2, 'color: #'.$sl_lsl_constant_color.';' );
	$geshi->set_keyword_group_style( 2, ( $sl_lsl_constant_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 2, ( $sl_lsl_constant_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 2, ( $sl_lsl_constant_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	//datatypes
	$geshi->set_keyword_group_style( 4, 'color: #'.$sl_lsl_datatype_color.';' );
	$geshi->set_keyword_group_style( 4, ( $sl_lsl_datatype_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 4, ( $sl_lsl_datatype_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 4, ( $sl_lsl_datatype_underline )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	//events
	$geshi->set_keyword_group_style( 3, 'color: #'.$sl_lsl_event_color.';' );
	$geshi->set_keyword_group_style( 3, ( $sl_lsl_event_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 3, ( $sl_lsl_event_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 3, ( $sl_lsl_event_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	//functions
	$geshi->set_keyword_group_style( 5, 'color: #'.$sl_lsl_function_color.';' );
	$geshi->set_keyword_group_style( 5, ( $sl_lsl_function_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 5, ( $sl_lsl_function_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 5, ( $sl_lsl_function_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	$geshi->set_keyword_group_style( 6, 'color: #'.$sl_lsl_function_color.';' );
	$geshi->set_keyword_group_style( 6, ( $sl_lsl_function_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 6, ( $sl_lsl_function_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 6, ( $sl_lsl_function_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	$geshi->set_keyword_group_style( 7, 'color: #'.$sl_lsl_function_color.';' );
	$geshi->set_keyword_group_style( 7, ( $sl_lsl_function_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 7, ( $sl_lsl_function_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 7, ( $sl_lsl_function_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	$geshi->set_keyword_group_style( 8, 'color: #'.$sl_lsl_function_color.';' );
	$geshi->set_keyword_group_style( 8, ( $sl_lsl_function_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 8, ( $sl_lsl_function_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 8, ( $sl_lsl_function_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	//keywords
	$geshi->set_keyword_group_style( 1, 'color: #'.$sl_lsl_keyword_color.';' );
	$geshi->set_keyword_group_style( 1, ( $sl_lsl_keyword_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_keyword_group_style( 1, ( $sl_lsl_keyword_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_keyword_group_style( 1, ( $sl_lsl_keyword_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	// numbers
	$geshi->set_numbers_style( 'color: #'.$sl_lsl_number_color.';' );
	$geshi->set_numbers_style( ( $sl_lsl_number_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_numbers_style( ( $sl_lsl_number_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_numbers_style( ( $sl_lsl_number_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	// Strings
	$geshi->set_strings_style( 'color: #'.$sl_lsl_string_color.';' );
	$geshi->set_strings_style( ( $sl_lsl_string_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_strings_style( ( $sl_lsl_string_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_strings_style( ( $sl_lsl_string_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	// symbols
	$geshi->set_symbols_style( 'color: #'.sl_lsl_string_color.';' );
	$geshi->set_symbols_style( ( $sl_lsl_symbol_bold == '1' )? 'font-weight: bold;' : 'font-weight: normal;', true );
	$geshi->set_symbols_style( ( $sl_lsl_symbol_italic == '1' )? 'font-style: italic;' : 'font-style: normal;', true );
	$geshi->set_symbols_style( ( $sl_lsl_symbol_underline == '1' )? 'text-decoration: underline;' : 'text-decoration: none;', true );
	
	$geshi->enable_keyword_links( false );
	$parsed_content .= '<style type="text/css">';
	$parsed_content .= $geshi->get_stylesheet();
	$parsed_content .= '</style>';
	$parsed_content .= $geshi->parse_code();
	//$parsed_content .= $content;
	$parsed_content .= '</pre>';
	
	return $parsed_content;
}
endif; // END FUNCTION sl_parse_lsl_shortcode
?>