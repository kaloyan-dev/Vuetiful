<?php

function vutiful_update_options() {	
	if ( ! vuetiful_request( 'vuetiful_update_options_field' ) ) {
		return;
	}

	if ( ! wp_verify_nonce( vuetiful_request( 'vuetiful_update_options_field' ), 'vuetiful_update_options' ) ) {
		return;
	}

	$option_names = vuetiful_get_option_names();

	foreach ( $option_names as $request_param => $option_name ) {
		update_option( $request_param, vuetiful_request( $option_name ) );
	}
}
add_action( 'admin_init', 'vutiful_update_options' );

function vuetiful_admin_add() {
	add_theme_page(
		__( 'Vuetiful Options', 'vuetiful' ),
		__( 'Vuetiful Options', 'vuetiful' ),
		'manage_options',
		'vuetiful-admin.php',
		'vuetiful_admin_render'
	);
}
add_action( 'admin_menu', 'vuetiful_admin_add' );

function vuetiful_admin_render() {
	get_template_part( 'lib/admin/template' );
}

function vuetiful_styles() {
	if ( ! isset( $_GET['vuetiful-styles'] ) ) {
		return;
	}

	header( "Content-type: text/css" );
	get_template_part( 'lib/style' );
	exit;
}
add_action( 'template_redirect', 'vuetiful_styles', 1 );

function vuetiful_admin_enqueue_scripts() {
	$ver  = vuetiful_get_version();
	$root = esc_url( get_stylesheet_directory_uri() );

	wp_enqueue_style( 'vuetiful-admin-styles', $root . '/lib/admin/style.css', false, $ver );
	
	wp_enqueue_script( 'vue', $root . '/js/vue.min.js', false, $ver, true );
	wp_enqueue_script( 'vuetiful-admin', $root . '/lib/admin/app.js', array( 'vue' ), $ver, true );

	$theme_color = get_option( 'vuetiful-theme-color' );

	wp_localize_script( 'vuetiful-admin', 'vuetifulData', vuetiful_get_theme_admin_data() );
}
add_action( 'admin_enqueue_scripts', 'vuetiful_admin_enqueue_scripts' );

function vuetiful_wp_enqueue_scripts() {
	$ver  = vuetiful_get_version();
	$root = esc_url( get_stylesheet_directory_uri() );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'vuetiful-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' );
	wp_enqueue_style( 'vuetiful-styles', add_query_arg( 'vuetiful-styles', $ver, home_url( '/' ) ), false, $ver );
	
	wp_enqueue_script( 'vue', $root . '/js/vue.min.js', false, $ver, true );
	wp_enqueue_script( 'vuetiful', $root . '/js/vuetiful.js', array( 'vue' ), $ver, true );

	wp_localize_script( 'vuetiful', 'vuetifulData', vuetiful_get_theme_data() );
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

function vuetiful_wp_head() {
	$favicon_id = get_option( 'vuetiful-favicon' );

	if ( ! $favicon_id ) {
		return;
	}

	$favicon_url = wp_get_attachment_url( $favicon_id ); ?>
	<link rel="shortcut icon" href="<?php echo $favicon_url; ?>" />
	<?php
}
add_action( 'wp_head', 'vuetiful_wp_head' );