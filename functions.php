<?php

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
}
add_action( 'after_setup_theme', 'vuetiful_theme_setup' );
