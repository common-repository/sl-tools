<?php

/**
 * Containst the shortcode for creating slurls in posts and pages.
 */

/**
 * Takes in the shortcode and attributes and builds a SLURL link to the Second LIfe Map
 */
if ( !function_exists( 'sl_slurl_shortcode' ) ):
function sl_slurl_shortcode( $attr, $content )
{
	$atts = shortcode_atts( array(	'region'		=> '',
								  							'x'					=> '128',
															'y'					=> '128',
															'z'					=> '2',
															'title'			=> '',
															'image'			=> '',
															'message'		=> ''
															), $attr);
	
	// Define variables to hold correct forms of the attributes.
	$region		= urlencode( $atts['region'] );
	$title			= urlencode( $atts['title'] );
	$image			= urlencode( $atts['image'] );
	$message	= urlencode( $atts['message'] );
	$content		= ($content == '')? 'Visit Second Life Location' : $content;
	
	// Retunr the content only if no region was provided
	if ( $region == '' )
	{
		return $content;
	}
	
	$slurl = 'http://slurl.com/secondlife/'.$region.'/'.$atts['x'].'/'.$atts['y'].'/'.$atts['z'].'/'; // Base SLURL.
	
	// Prepare SLURL for GET values if any of the option attributes were provided.
	if ( $title != '' || $image != '' || $message != '' )
		$slurl = $slurl.'?';
	
	// Add in any optional attributes provided
	
	if ( $image != '' )
		$slurl .= 'img='.$image;
	
	if ( $title != '' )
		$slurl .= ( $image != '' )? '&title='.$title : 'title='.$title;
	
	if ( $message != '' )
		$slurl .= ( $image != '' || $title != '' )? '&msg='.$message : 'msg='.$message;
		
	// Build the slurl link
	$slurl_content = '<a href="'.$slurl.'" target="_BLANK">'.$content.'</a>';
	
	return $slurl_content;
}
endif; // END FUNCTION sl_slurl_shortcode
?>