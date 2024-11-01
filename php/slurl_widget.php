<?php
/**
 * Adds a single SLURL to a dynamic sidebar.
 */
class SLURL_Widget extends WP_Widget
{
	/**
	 * Creates a new SLURL sidebar widget.
	 */
	function SLURL_Widget()
	{
		$widget_ops = array( 	'classname' => 'slurl-widget',
												'description' => __( 'Adds a single SLURL to a dynamic sidebar', 'slurl-widget' ) );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'slurl' );
		$this->WP_Widget( 'slurl', __('Second Life Location', 'slurl-widget' ), $widget_ops, $control_ops );
	} // END CONSTRUCTOR
	
	
	/********************************************************************************************/
	
	
	/**
	 * Displays the SLURL link in the sidebar
	 */
	function widget( $args, $instance )
	{
		extract( $args );
		
		// Set up variables for the different options.
		$widget_title			= apply_filters( 'widget_title', $instance['widget-title'] );
		$region					= urlencode( $instance['region'] );
		$x							= ( $instance['x'] == '' )? '128' : $instance['x'];
		$y							= ( $instance['y'] == '' )? '128' : $instance['y'];
		$z							= ( $instance['z'] == '' )? '2' : $instance['z'];
		$window_title			= urlencode( $instance['window-title'] );
		$window_message	= urlencode( $instance['window-message'] );
		$window_image		= urlencode( $instance['window-image'] );
		$link_text				= ( $instance['link-text' ] == '' )? 'Visit Me in Second Life' : $instance['link-text'];
		
		// Widget header formats
		echo $before_widget;
		if ( $widget_title != '' )
			echo $before_title.$widget_title.$after_title;
		
		// Build and display the SLURL, or an error message if no region was provided.
		if ( $region != '' )
		{
			$slurl = 'http://slurl.com/secondlife/'.$region.'/'.$x.'/'.$y.'/'.$z.'/';
			if ( $window_title != '' || $window_image != '' || $window_message != '' )
				$slurl = $slurl.'?';
			
			if ( $window_image != '')
				$slurl .= 'img='.$window_image;
			if ( $window_title != '' )
				$slurl .=  ( $window_image != '' )? '&title='.$window_title : 'title='.$window_title;
			if ( $window_message != '' )
				$slurl .= ( $window_image != '' || $window_title != '' )? '&msg='.$window_message : 'msg='.$window_message;
			
			echo '<a href="'.$slurl.'" target="_BLANK">'.$link_text.'</a>';
		}
		else
		{
			echo 'A valid region was not provided for this SLURL.';
		} // END IF
		
		// close off the widget
		echo $after_widget;
	} // END FUNCTION widgets
	
	
	/********************************************************************************************/
	
	
	/**
	 * Saves the SLURL information from a SLURL Widget instance.
	 */
	function update( $new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget-title']				= strip_tags( $new_instance['widget-title'] );
		$instance['region']						= strip_tags( $new_instance['region'] );
		$instance['x']								= strip_tags( $new_instance['x'] );
		$instance['y']								= strip_tags( $new_instance['y'] );
		$instance['z']								= strip_tags( $new_instance['z'] );
		$instance['window-title']			= strip_tags( $new_instance['window-title'] );
		$instance['window-message']	= strip_tags( $new_instance['window-message'] );
		$instance['window-image']			= strip_tags( $new_instance['window-image'] );
		$instance['link-text']					= strip_tags( $new_instance['link-text'] );
		
		return $instance;
	} // END FUNCTION update
	
	
	/********************************************************************************************/
	
	
	/**
	 * Displays the settings form on a SLURL widget instance on the widgets settings page.
	 */
	function form( $instance )
	{
		$defaults = array(	'widget-title'	=> __('Visit Me in Second Life'),
										'x'						=> '128',
										'y'						=> '128',
										'z'						=> '2',
										'link-text'			=> __('My Second Life Location'));
		$instance = wp_parse_args( ( array )$instance, $defaults );
		
		// Begin Form
		?>
        	<!-- Widget TItle -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'widget-title' ); ?>"><?php _e( 'Widget Title:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'widget-title' ); ?>" name="<?php echo $this->get_field_name( 'widget-title' ); ?>" value="<?php echo $instance['widget-title']; ?>" />
            </p>
            
            <!-- Link Text -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'link-text' ); ?>"><?php _e( 'Link Text:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'link-text' ); ?>" name="<?php echo $this->get_field_name( 'link-text' ); ?>" value="<?php echo $instance['link-text']; ?>" />
            </p>
            
            <!-- Region -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'region' ); ?>"><?php _e( 'Region (required):' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'region' ); ?>" name="<?php echo $this->get_field_name( 'region' ); ?>" value="<?php echo $instance['region']; ?>" />
            </p>
            
            <!-- X Coordinate -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'x' ); ?>"><?php _e( 'X:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'x' ); ?>" name="<?php echo $this->get_field_name( 'x' ); ?>" value="<?php echo $instance['x']; ?>" size="4" />
            
            <!-- Y Coordinate -->
            	<label for="<?php echo $this->get_field_id( 'y'); ?>"><?php _e( 'Y:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'y' ); ?>" name="<?php echo $this->get_field_name( 'y' ); ?>" value="<?php echo $instance['y']; ?>" size="4" />
            
            <!-- Z Coordinate -->
            	<label for="<?php echo $this->get_field_id( 'z' ); ?>"><?php _e( 'Z:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'z' ); ?>" name="<?php echo $this->get_field_name( 'z' ); ?>" value="<?php echo $instance['z']; ?>" size="4" />
            </p>
            
            <!-- Window Title -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'window-title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'window-title' ); ?>" name="<?php echo $this->get_field_name( 'window-title' ); ?>" value="<?php echo $instance['window-title']; ?>" />
            </p>
            
            <!-- Window Image -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'window-image' ); ?>"><?php _e( 'Image:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'window-image' ); ?>" name="<?php echo $this->get_field_name( 'window-image' ); ?>" value="<?php echo $instance['window-image']; ?>" />
            </p>
            
            <!-- Window Message -->
            <p>
            	<label for="<?php echo $this->get_field_id( 'window-message' ); ?>"><?php _e( 'Message:' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'window-message' ); ?>" name="<?php echo $this->get_field_name( 'window-message' ); ?>" value="<?php echo $instance['window-message']; ?>" />
            </p>
            
        <?php
		// END FORM
	} // END FUNCTION form
	
	
	/********************************************************************************************/
/********************************************************************************************/
} // END CLASS SLURL_Widget
?>