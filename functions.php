<?php

! defined( 'VUETIFUL_MODULES_DIR' ) ? define( 'VUETIFUL_MODULES_DIR', get_template_directory() . '/modules/' ) : null;

function vuetiful_theme_setup() {
	include_once( 'lib/modules/Module.php' );
	include_once( 'lib/modules/Module_Manager.php' );

	include_once( 'includes/actions.php' );
	include_once( 'includes/filters.php' );
	include_once( 'includes/helpers.php' );

	add_theme_support( 'html5' );

	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'vuetiful' ),
	) );

	$module_manager = Vuetiful\Module_Manager::instance();
	$module_manager->load_modules();

	if ( ! isset( $content_width ) ) {
		$content_width = 860;
	}

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'vuetiful_theme_setup' );
