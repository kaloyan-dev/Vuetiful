<?php

namespace Vuetiful;

class Module {
	/**
	 * Adds the module to the module manager
	 * 
	 * @param  string $module_name
	 *
	 * @return void
	 */
	public function __construct( $module_name ) {
		$module_manager  = Module_Manager::instance();

		$module_manager::$modules[] = $module_name;
	}
}
