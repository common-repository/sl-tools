<link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/SL_Tools/ColorPicker/css/colorpicker.css" />
<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/SL_Tools/ColorPicker/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/SL_Tools/ColorPicker/js/colorpicker.js"></script>
<!-- Begin ColorPicker Code -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#<?php echo SL_LSL_BACKGROUND_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_COMMENT_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_CONSTANT_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_DATATYPE_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_EVENT_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_FUNCTION_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_KEYWORD_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_NUMBER_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_STRING_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_SYMBOL_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
			
			$('#<?php echo SL_LSL_TEXT_COLOR; ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
			.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
			});
		});
	</script>
<!-- End ColorPicker Code -->
<?php
/**
 *  Creates the settings page for the LSL parser.
 */

if ( $_POST['sl_lsl_hidden'] == 'Y' )
{
	if ( function_exists( 'check_admin_referer' ) )
		check_admin_referer( 'sltools-editparseroptions' );
	
	$sl_lsl_background_color		= $_POST[SL_LSL_BACKGROUND_COLOR];
	$sl_lsl_keyword_color			= $_POST[SL_LSL_KEYWORD_COLOR];
	$sl_lsl_event_color				= $_POST[SL_LSL_EVENT_COLOR];
	$sl_lsl_function_color			= $_POST[SL_LSL_FUNCTION_COLOR];
	$sl_lsl_constant_color			= $_POST[SL_LSL_CONSTANT_COLOR];
	$sl_lsl_string_color				= $_POST[SL_LSL_STRING_COLOR];
	$sl_lsl_comment_color			= $_POST[SL_LSL_COMMENT_COLOR];
	$sl_lsl_number_color			= $_POST[SL_LSL_NUMBER_COLOR];
	$sl_lsl_symbol_color			= $_POST[SL_LSL_SYMBOL_COLOR];
	$sl_lsl_text_color				= $_POST[SL_LSL_TEXT_COLOR];
	$sl_lsl_datatype_color			= $_POST[SL_LSL_DATATYPE_COLOR];
	
	$sl_lsl_keyword_bold			= ( isset( $_POST[SL_LSL_KEYWORD_BOLD] ) )? '1' : '0';
	$sl_lsl_event_bold				= ( isset( $_POST[SL_LSL_EVENT_BOLD] ) )? '1' : '0';
	$sl_lsl_function_bold			= ( isset( $_POST[SL_LSL_FUNCTION_BOLD] ) )? '1' : '0';
	$sl_lsl_constant_bold			= ( isset( $_POST[SL_LSL_CONSTANT_BOLD] ) )? '1' : '0';
	$sl_lsl_string_bold				= ( isset( $_POST[SL_LSL_STRING_BOLD] ) )? '1' : '0';
	$sl_lsl_comment_bold			= ( isset( $_POST[SL_LSL_COMMENT_BOLD] ) )? '1' : '0';
	$sl_lsl_number_bold			= ( isset( $_POST[SL_LSL_NUMBER_BOLD] ) )? '1' : '0';
	$sl_lsl_symbol_bold				= ( isset( $_POST[SL_LSL_SYMBOL_BOLD] ) )? '1' : '0';
	$sl_lsl_text_bold				= ( isset( $_POST[SL_LSL_TEXT_BOLD] ) )? '1' : '0';
	$sl_lsl_datatype_bold			= ( isset( $_POST[SL_LSL_DATATYPE_BOLD] ) )? '1' : '0';
	
	$sl_lsl_keyword_italic			= ( isset( $_POST[SL_LSL_KEYWORD_ITALIC] ) )? '1' : '0';
	$sl_lsl_event_italic				= ( isset( $_POST[SL_LSL_EVENT_ITALIC] ) )? '1' : '0';
	$sl_lsl_function_italic			= ( isset( $_POST[SL_LSL_FUNCTION_ITALIC] ) )? '1' : '0';
	$sl_lsl_constant_italic			= ( isset( $_POST[SL_LSL_CONSTANT_ITALIC] ) )? '1' : '0';
	$sl_lsl_string_italic				= ( isset( $_POST[SL_LSL_STRING_ITALIC] ) )? '1' : '0';
	$sl_lsl_comment_italic			= ( isset( $_POST[SL_LSL_COMMENT_ITALIC] ) )? '1' : '0';
	$sl_lsl_number_italic			= ( isset( $_POST[SL_LSL_NUMBER_ITALIC] ) )? '1' : '0';
	$sl_lsl_symbol_italic			= ( isset( $_POST[SL_LSL_SYMBOL_ITALIC] ) )? '1' : '0';
	$sl_lsl_text_italic				= ( isset( $_POST[SL_LSL_TEXT_ITALIC] ) )? '1' : '0';
	$sl_lsl_datatype_italic			= ( isset( $_POST[SL_LSL_DATATYPE_ITALIC] ) )? '1' : '0';
	
	$sl_lsl_keyword_underline	= ( isset( $_POST[SL_LSL_KEYWORD_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_event_underline		= ( isset( $_POST[SL_LSL_EVENT_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_function_underline		= ( isset( $_POST[SL_LSL_FUNCTION_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_constant_underline	= ( isset( $_POST[SL_LSL_CONSTANT_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_string_underline		= ( isset( $_POST[SL_LSL_STRING_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_comment_underline	= ( isset( $_POST[SL_LSL_COMMENT_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_number_underline		= ( isset( $_POST[SL_LSL_NUMBER_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_symbol_underline		= ( isset( $_POST[SL_LSL_SYMBOL_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_text_underline			= ( isset( $_POST[SL_LSL_TEXT_UNDERLINE] ) )? '1' : '0';
	$sl_lsl_datatype_underline	= ( isset( $_POST[SL_LSL_DATATYPE_UNDERLINE] ) )? '1' : '0';
	
	$options = array(	SL_LSL_BACKGROUND_COLOR		=> $sl_lsl_background_color,
					 			SL_LSL_KEYWORD_COLOR				=> $sl_lsl_keyword_color,
								SL_LSL_EVENT_COLOR					=> $sl_lsl_event_color,
								SL_LSL_FUNCTION_COLOR			=> $sl_lsl_function_color,
								SL_LSL_CONSTANT_COLOR			=> $sl_lsl_constant_color,
								SL_LSL_STRING_COLOR					=> $sl_lsl_string_color,
								SL_LSL_COMMENT_COLOR			=> $sl_lsl_comment_color,
								SL_LSL_NUMBER_COLOR				=> $sl_lsl_number_color,
								SL_LSL_SYMBOL_COLOR				=> $sl_lsl_symbol_color,
								SL_LSL_TEXT_COLOR					=> $sl_lsl_text_color,
								SL_LSL_DATATYPE_COLOR			=> $sl_lsl_datatype_color,
								
								SL_LSL_KEYWORD_BOLD				=> $sl_lsl_keyword_bold,
								SL_LSL_EVENT_BOLD					=> $sl_lsl_event_bold,
								SL_LSL_FUNCTION_BOLD				=> $sl_lsl_function_bold,
								SL_LSL_CONSTANT_BOLD				=> $sl_lsl_constant_bold,
								SL_LSL_STRING_BOLD					=> $sl_lsl_string_bold,
								SL_LSL_COMMENT_BOLD				=> $sl_lsl_comment_bold,
								SL_LSL_NUMBER_BOLD					=> $sl_lsl_number_bold,
								SL_LSL_SYMBOL_BOLD					=> $sl_lsl_symbol_bold,
								SL_LSL_TEXT_BOLD						=> $sl_lsl_text_bold,
								SL_LSL_DATATYPE_BOLD				=> $sl_lsl_datatype_bold,
								
								SL_LSL_KEYWORD_ITALIC				=> $sl_lsl_keyword_italic,
								SL_LSL_EVENT_ITALIC					=> $sl_lsl_event_italic,
								SL_LSL_FUNCTION_ITALIC				=> $sl_lsl_function_italic,
								SL_LSL_CONSTANT_ITALIC			=> $sl_lsl_constant_italic,
								SL_LSL_STRING_ITALIC					=> $sl_lsl_string_italic,
								SL_LSL_COMMENT_ITALIC				=> $sl_lsl_comment_italic,
								SL_LSL_NUMBER_ITALIC				=> $sl_lsl_number_italic,
								SL_LSL_SYMBOL_ITALIC				=> $sl_lsl_symbol_italic,
								SL_LSL_TEXT_ITALIC					=> $sl_lsl_text_italic,
								SL_LSL_DATATYPE_ITALIC			=> $sl_lsl_datatype_italic,
								
								SL_LSL_KEYWORD_UNDERLINE		=> $sl_lsl_keyword_underline,
								SL_LSL_EVENT_UNDERLINE			=> $sl_lsl_event_underline,
								SL_LSL_FUNCTION_UNDERLINE		=> $sl_lsl_function_underline,
								SL_LSL_CONSTANT_UNDERLINE		=> $sl_lsl_constant_underline,
								SL_LSL_STRING_UNDERLINE			=> $sl_lsl_string_underline,
								SL_LSL_COMMENT_UNDERLINE		=> $sl_lsl_comment_underline,
								SL_LSL_NUMBER_UNDERLINE			=> $sl_lsl_number_underline,
								SL_LSL_SYMBOL_UNDERLINE			=> $sl_lsl_symbol_underline,
								SL_LSL_TEXT_UNDERLINE				=> $sl_lsl_text_underline,
								SL_LSL_DATATYPE_UNDERLINE		=> $sl_lsl_datatype_underline);
	
	update_option( SL_LSL_OPTIONS_NAME, $options);
	?>
    	<div class="updated"><p><strong><?php _e( 'LSL Highlight Settings Saved' ); ?></strong></p></div>
    <?php
}
else
{
	extract( get_option( SL_LSL_OPTIONS_NAME ) );
}
?>

<!-- Begin Settings Page -->

<div class="wrap">
	<?php echo '<h2>'.__( 'Edit LSL Highlight Settings' ).'</h2>'; ?>
    <!-- Begin Edit Form -->
    	<form name="sl_lsl_highlight_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] );?>">
        	<?php
				if ( function_exists( 'wp_nonce_field' ) )
					wp_nonce_field( 'sltools-editparseroptions' );
			?>
            <input type="hidden" name="sl_lsl_hidden" value="Y" />
            <table border="1">
            	<!-- Background -->
            	<tr>
                	<td>
                    	<?php _e( 'Background: ' ); ?>
                    </td>
                    <td colspan="4">
                    	<input id="<?php echo SL_LSL_BACKGROUND_COLOR; ?>" id="<?php echo SL_LSL_BACKGROUND_COLOR; ?>" name="<?php echo SL_LSL_BACKGROUND_COLOR; ?>" value="<?php echo $sl_lsl_background_color; ?>" size="6" />
                    </td>
                </tr>
                
                <!-- Comments -->
                <tr>
                	<td>
                    	<?php _e( 'Comments;' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_COMMENT_COLOR; ?>" id="<?php echo SL_LSL_COMMENT_COLOR; ?>" value="<?php echo $sl_lsl_comment_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_COMMENT_BOLD; ?>" <?php if ( $sl_lsl_comment_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_COMMENT_ITALIC; ?>" <?php if ( $sl_lsl_comment_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_COMMENT_UNDERLINE; ?>" <?php if ( $sl_lsl_comment_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Constants -->
                <tr>
                	<td>
                    	<?php _e( 'Constants:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_CONSTANT_COLOR; ?>" id="<?php echo SL_LSL_CONSTANT_COLOR; ?>" value="<?php echo $sl_lsl_constant_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_CONSTANT_BOLD; ?>" <?php if ( $sl_lsl_constant_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_CONSTANT_ITALIC; ?>" <?php if ( $sl_lsl_constant_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_CONSTANT_UNDERLINE; ?>" <?php if ( $sl_lsl_constant_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Datatypes -->
                <tr>
                	<td>
                    	<?php _e( 'Datatypes:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_DATATYPE_COLOR; ?>" id="<?php echo SL_LSL_DATATYPE_COLOR; ?>" value="<?php echo $sl_lsl_datatype_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_DATATYPE_BOLD; ?>" <?php if ( $sl_lsl_datatype_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_DATATYPE_ITALIC; ?>" <?php if ( $sl_lsl_datatype_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_DATATYPE_UNDERLINE; ?>" <?php if ( $sl_lsl_datatype_underline == '1' ) { echo 'checked'; } ?> /> <?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Event -->
                <tr>
                	<td>
                    	<?php _e( 'Events:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_EVENT_COLOR; ?>" id="<?php echo SL_LSL_EVENT_COLOR; ?>" value="<?php echo $sl_lsl_event_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_EVENT_BOLD; ?>" <?php if ( $sl_lsl_event_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_EVENT_ITALIC; ?>" <?php if ( $sl_lsl_event_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_EVENT_UNDERLINE; ?>" <?php if ($sl_lsl_event_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Functions -->
                <tr>
                	<td>
                    	<?php _e( 'Functions:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_FUNCTION_COLOR; ?>" id="<?php echo SL_LSL_FUNCTION_COLOR; ?>" value="<?php echo $sl_lsl_function_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_FUNCTION_BOLD; ?>" <?php if ( $sl_lsl_function_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_FUNCTION_ITALIC; ?>" <?php if ( $sl_lsl_function_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_FUNCTION_UNDERLINE; ?>" <?php if ( $sl_lsl_function_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Keywords -->
                <tr>
                	<td>
                    	<?php _e( 'Keywords: ' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_KEYWORD_COLOR; ?>" id="<?php echo SL_LSL_KEYWORD_COLOR; ?>" value="<?php echo $sl_lsl_keyword_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_KEYWORD_BOLD; ?>" <?php if ( $sl_lsl_keyword_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
            		<td>
                    	<input type="checkbox" name="<?php echo SL_LSL_KEYWORD_ITALIC; ?>" <?php if ( $sl_lsl_keyword_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                	<td>
                    	<input type="checkbox" name="<?php echo SL_LSL_KEYWORD_UNDERLINE; ?>" <?php if ( $sl_lsl_keyword_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Numbers -->
                <tr>
                	<td>
                    	<?php _e( 'Numbers:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_NUMBER_COLOR; ?>" id="<?php echo SL_LSL_NUMBER_COLOR; ?>" value="<?php echo $sl_lsl_number_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_NUMBER_BOLD; ?>" <?php if ( $sl_lsl_number_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold'); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_NUMBER_ITALIC; ?>" <?php if ( $sl_lsl_number_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_NUMBER_UNDERLINE; ?>" <?php if ( $sl_lsl_number_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Strings -->
                <tr>
                	<td>
                    	<?php _e( 'Strings:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_STRING_COLOR; ?>" id="<?php echo SL_LSL_STRING_COLOR; ?>" value="<?php echo $sl_lsl_string_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_STRING_BOLD; ?>" <?php if ( $sl_lsl_string_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_STRING_ITALIC; ?>" <?php if ( $sl_lsl_string_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_STRING_UNDERLINE; ?>" <?php if ( $sl_lsl_string_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Symbols -->
                <tr>
                	<td>
                    	<?php _e( 'Symbols:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_SYMBOL_COLOR; ?>" id="<?php echo SL_LSL_SYMBOL_COLOR; ?>" value="<?php echo $sl_lsl_symbol_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_SYMBOL_BOLD; ?>" <?php if ( $sl_lsl_symbol_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_SYMBOL_ITALIC; ?>" <?php if ( $sl_lsl_symbol_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_SYMBOL_UNDERLINE; ?>" <?php if ( $sl_lsl_symbol_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
                <!-- Text -->
             	<tr>
                	<td>
                    	<?php _e( 'Text:' ); ?>
                    </td>
                    <td>
                    	<input name="<?php echo SL_LSL_TEXT_COLOR; ?>" id="<?php echo SL_LSL_TEXT_COLOR; ?>" value="<?php echo $sl_lsl_text_color; ?>" size="6" />
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_TEXT_BOLD; ?>" <?php if ( $sl_lsl_text_bold == '1' ) { echo 'checked'; } ?> /><?php _e( 'Bold' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_TEXT_ITALIC; ?>" <?php if ( $sl_lsl_text_italic == '1' ) { echo 'checked'; } ?> /><?php _e( 'Italic' ); ?>
                    </td>
                    <td>
                    	<input type="checkbox" name="<?php echo SL_LSL_TEXT_UNDERLINE; ?>" <?php if ( $sl_lsl_text_underline == '1' ) { echo 'checked'; } ?> /><?php _e( 'Underline' ); ?>
                    </td>
                </tr>
                
            </table>
            
            <p class="submit">
            	<input type="submit" value="<?php _e( 'Save Highlighter Settings' ); ?>"
            </p>
        </form>
    <!-- End Edit Form -->
    <hr />
    <!-- Begin Donation Button -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="88UPEW29PYLLC">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

    	<pre>
Tipping: It's not just for cows.
             (__)
             (oo)
      /-------\/
     / |     ||
    *  ||----||
       ^^    ^^
        </pre>
    <!-- End Donation Button -->
</div>

<!-- End Settings Page -->