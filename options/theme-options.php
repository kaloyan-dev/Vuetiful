<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'vue' ) )
	->add_fields( array(
		Field::make( 'text', 'copyright_text', __( 'Copyright Text', 'vue' ) )
			->help_text( 'Use [year] to display the current year.', 'vue' ),

	) );