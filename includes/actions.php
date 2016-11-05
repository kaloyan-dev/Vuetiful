<?php

function vutiful_admin_init() {
	
	if ( ! vuetiful_request( 'vuetiful_update_options_field' ) ) {
		return;
	}

	if ( ! wp_verify_nonce( vuetiful_request( 'vuetiful_update_options_field' ), 'vuetiful_update_options' ) ) {
		return;
	}

	update_option( 'vuetiful-theme-color', vuetiful_request( 'vuetiful_theme_color' ) );
	update_option( 'vuetiful-modules', vuetiful_request( 'vuetiful_modules' ) );
}
add_action( 'admin_init', 'vutiful_admin_init' );

function vuetiful_admin_add() {
	add_submenu_page(
		'options-general.php',
		__( 'Vuetiful Options', 'vuetiful' ),
		__( 'Vuetiful Options', 'vuetiful' ),
		'manage_options',
		'vuetiful-admin.php',
		'vuetiful_admin_render'
	);
}
add_action( 'admin_menu', 'vuetiful_admin_add' );

function vuetiful_admin_render() {
	include( get_template_directory() . '/lib/admin/template.php' );
}

function vuetiful_styles() {
	if ( ! isset( $_GET['vuetiful-styles'] ) ) {
		return;
	}

	header( "Content-type: text/css" );
	include( get_template_directory() . '/lib/style.php' );
	exit;
}
add_action( 'template_redirect', 'vuetiful_styles', 1 );

function vuetiful_admin_enqueue_scripts() {
	$ver  = vuetiful_get_version();
	$root = get_bloginfo( 'stylesheet_directory' );

	wp_enqueue_style( 'vuetiful-admin-styles', $root . '/lib/admin/style.css', false, $ver );
	
	wp_enqueue_script( 'vue', $root . '/js/vue.min.js', false, $ver, true );
	wp_enqueue_script( 'vuetiful-admin', $root . '/lib/admin/app.js', array( 'vue' ), $ver, true );

	$theme_color = get_option( 'vuetiful-theme-color' );

	wp_localize_script( 'vuetiful-admin', 'vuetifulData', vuetiful_get_theme_data() );
}
add_action( 'admin_enqueue_scripts', 'vuetiful_admin_enqueue_scripts' );

function vuetiful_wp_enqueue_scripts() {
	$ver  = vuetiful_get_version();
	$root = get_bloginfo( 'stylesheet_directory' );

	wp_enqueue_style( 'vuetiful-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' );
	wp_enqueue_style( 'vuetiful-styles', add_query_arg( 'vuetiful-styles', $ver, home_url( '/' ) ), false, $ver );
	
	wp_enqueue_script( 'vue', $root . '/js/vue.min.js', false, $ver, true );
	wp_enqueue_script( 'vuetiful', $root . '/js/vuetiful.js', array( 'vue' ), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'vuetiful_wp_enqueue_scripts' );

function vuetiful_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vuetiful' ),
		'id'            => 'page_sidebar',          
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'vuetiful_widgets_init' );
