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
	global $wp_query;

	$query_args               = $wp_query->query_vars;
	$query_args['tax_query']  = $wp_query->tax_query;
	$query_args['meta_query'] = $wp_query->meta_query;
	$query_args['date_query'] = $wp_query->date_query;
	
	$posts                    = get_posts( $query_args );
	
	$posts_per_page           = get_option( 'posts_per_page' );	
	$posts_data               = array();
	$post_pages               = 1;
	$post_count               = 1;

	foreach ( $posts as $p ) {
		if ( $post_count > $posts_per_page ) {
			$post_count = 1;
			$post_pages++;
		}

		$post_id      = $p->ID;
		$post_title   = $p->post_title;
		$post_content = strip_tags( $p->post_content );
		$post_excerpt = wp_trim_words( $post_content, 55 );
		$post_trimmed = ( strip_tags( $post_content ) !== $post_excerpt );
		$post_url     = get_permalink( $post_id );
		$post_page    = $post_pages;

		$posts_data[] = array(
			'title'   => $post_title,
			'content' => $post_trimmed ? wpautop( $post_excerpt ) : wpautop( $post_content ),
			'url'     => $post_url,
			'page'    => $post_page,
			'trimmed' => $post_trimmed ? 1 : 0,
			'class'   => implode( ' ', get_post_class( '', $post_id ) ),
		);

		$post_count++;
	}

	return array(
		'posts' => $posts_data,
		'pages' => $post_pages,
	);
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