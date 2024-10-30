jQuery( function() {
	jQuery( '#wp-admin-bar-confirm-theme-structure a' ).on( 'click', function( event ) {
		jQuery( '#CTS_template_info_wrapper' ).fadeToggle();

		var contents_height = jQuery( '#CTS_template_info_wrapper').height();
		var window_height   = jQuery( window ).height();
		if ( contents_height > window_height ) {
			jQuery( '#CTS_template_info_wrapper' ).css( 'bottom', '0px' );
		}
		event.preventDefault();
	});

	jQuery( '#CTS_close_toggle' ).on( 'click', function( event ) {
		if (jQuery( '#CTS_template_info_wrapper' ).css( 'opacity' ) == 1 ) {
			jQuery( '#CTS_template_info_wrapper' ).fadeOut();
		}
	});
});
