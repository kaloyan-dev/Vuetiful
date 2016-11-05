<?php

namespace Vuetiful;

class Module {
	public function __construct( $module_name ) {
		$module_manager  = Module_Manager::instance();

		$module_manager::$modules[] = $module_name;
	}
}
