<?php

function vuetiful_beautify( $text ) {
	return ucwords( preg_replace( '~[-|_]~', ' ', sanitize_title( $text ) ) );
}

function vuetiful_get_option_names() {
	return array(
		'vuetiful-theme-color' => 'vuetiful_theme_color',
		'vuetiful-modules'     => 'vuetiful_modules',
		'vuetiful-favicon'     => 'vuetiful_favicon',
	);
}

function vuetiful_get_theme_colors() {
	return apply_filters( 'vuetiful_theme_colors', array(
		'turquoise'     => array( 'Turquoise', '#1abc9c' ),
		'emerald'       => array( 'Emerald', '#2ecc71' ),
		'peter_river'   => array( 'Peter River', '#3498db' ),
		'amethyst'      => array( 'Amethyst', '#9b59b6' ),
		'wet_asphalt'   => array( 'Wet Asphalt', '#34495e' ),
		'green_sea'     => array( 'Green Sea', '#16a085' ),
		'nephritis'     => array( 'Nephritis', '#27ae60' ),
		'belize_hole'   => array( 'Belize Hole', '#2980b9' ),
		'wisteria'      => array( 'Wisteria', '#8e44ad' ),
		'midnight_blue' => array( 'Midnight Blue', '#2c3e50' ),
		'sun_flower'    => array( 'Sun Flower', '#f1c40f' ),
		'carrot'        => array( 'Carrot', '#e67e22' ),
		'alizarin'      => array( 'Alizarin', '#e74c3c' ),
		'clouds'        => array( 'Clouds', '#ecf0f1' ),
		'concrete'      => array( 'Concrete', '#95a5a6'),
		'orange'        => array( 'Orange', '#f39c12' ),
		'pumpkin'       => array( 'Pumpkin', '#d35400' ),
		'pomegranate'   => array( 'Pomegranate', '#c0392b' ),
		'silver'        => array( 'Silver', '#bdc3c7' ),
		'asbestos'      => array( 'Asbestos', '#7f8c8d' ),
	) );
}

function vuetiful_get_theme_data() {

}

function vuetiful_get_theme_admin_data() {
	$theme_color       = get_option( 'vuetiful-theme-color' );
	$theme_colors      = vuetiful_get_theme_colors();
	$theme_color_names = array_keys( $theme_colors );	
	$favicon_id        = get_option( 'vuetiful-favicon' );
	$favicon_url       = '';

	if ( $favicon_id ) {
		$favicon_url = wp_get_attachment_url( $favicon_id );
	}

	return array(
		'themeColor'    => in_array( $theme_color, $theme_color_names ) ? $theme_color : $theme_color_names[0],
		'themeColors'   => $theme_colors,
		'faviconID'     => $favicon_id,
		'faviconURL'    => $favicon_url,
		'faviconTitle'  => __( 'Select a Favicon', 'vuetiful' ),
		'faviconButton' => __( 'Pick Favicon', 'vuetiful' ),
	);
}

function vuetiful_get_version() {
	return '1.0.0';
}

function vuetiful_request( $name = false ) {

	if ( ! $name ) {
		return '';
	}

	if ( isset( $_GET[ $name ] ) ) {
		return $_GET[ $name ];
	}

	if ( isset( $_POST[ $name ] ) ) {
		return $_POST[ $name ];
	}

	return '';
}