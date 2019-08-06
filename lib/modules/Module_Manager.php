<?php

namespace Vuetiful;

class Module_Manager {
	static $modules = array();

	/**
	 * Creates an instance of the module manager
	 * 
	 * @return object
	 */
	public static function instance() {
		static $instance;

		if ( ! is_a( $instance, __CLASS__ ) ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Creates a list of the available modules
	 * 
	 * @return array
	 */
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

	/**
	 * Loads the available modules
	 * 
	 * @return void
	 */
	public function load_modules() {
		$modules_list   = $this->get_modules();
		$loaded_modules = get_option( 'vuetiful-modules' );

		if ( ! is_array( $loaded_modules ) || ! $loaded_modules ) {
			return;
		}

		$modules_to_load = array_intersect( $modules_list, $loaded_modules );
		
		foreach ( $modules_to_load as $module ) {
			get_template_part( VUETIFUL_MODULES_DIR . $module . '/module' );
		}
	}
}
