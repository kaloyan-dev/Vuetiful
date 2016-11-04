<?php

function vuetiful_styles() {
	if ( ! isset( $_GET['vuetiful-styles'] ) ) {
		return;
	}

	header( "Content-type: text/css" );
	include( get_template_directory() . '/lib/style.php' );
	exit;
}
add_action( 'template_redirect', 'vuetiful_styles', 1 );