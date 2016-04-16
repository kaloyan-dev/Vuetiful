<?php

function vue_theme_setup() {

	include_once( 'includes/carbon-fields/vendor/autoload.php' );
	include_once( 'options/theme-options.php' );
	include_once( 'options/shortcodes.php' );
	include_once( 'includes/filters.php' );
	include_once( 'includes/helpers.php' );

	add_theme_support( 'html5' );

	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'vue' ),
	) );

	add_filter( 'excerpt_more', 'vue_excerpt_more' );
}
add_action( 'after_setup_theme', 'vue_theme_setup' );

function vue_wp_enqueue_scripts() {

	$ver  = '1.0.0';
	$root = get_bloginfo( 'stylesheet_directory' );

	wp_enqueue_style( 'vue-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' );
	wp_enqueue_style( 'vue-styles', get_bloginfo( 'stylesheet_url' ) );
	
	wp_enqueue_script( 'vue', $root . '/js/vue.min.js', false, $ver, true );
	wp_enqueue_script( 'vuetiful', $root . '/js/vuetiful.js', array( 'vue' ), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'vue_wp_enqueue_scripts' );

function vue_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vue' ),
		'id'            => 'page_sidebar',          
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'vue_widgets_init' );
