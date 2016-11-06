<?php

namespace Vuetiful;

class Module_Manager {
	static $modules = array();

	public static function instance() {
		static $instance;

		if ( ! is_a( $instance, __CLASS__ ) ) {
			$instance = new self();
		}

		return $instance;
	}

	public function get_modules() {
		self::$modules  = array();

		$modules = array_diff( scandir( VUETIFUL_MODULES_DIR ), array( '..', '.' ) );

		foreach ( $modules as $module ) {

			if ( ! file_exists( VUETIFUL_MODULES_DIR . $module . '/module.php' ) ) {
				continue;
			}

			new Module( $module );
		}
		
		return self::$modules;
	}

	public function load_modules() {
		$modules_list   = $this->get_modules();
		$loaded_modules = get_option( 'vuetiful-modules' );

		if ( ! is_array( $loaded_modules ) || ! $loaded_modules ) {
			return;
		}

		$modules_to_load = array_intersect( $modules_list, $loaded_modules );
		
		foreach ( $modules_to_load as $module ) {
			include( VUETIFUL_MODULES_DIR . $module . '/module.php' );
		}
	}
}
