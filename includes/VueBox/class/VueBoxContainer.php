<?php

class VueBoxContainer {

	public static function set( $type, $name, $title ) {

		if ( ! $type || ! $name ) {
			return;
		}

		$name = strtolower( preg_replace( '~[^\w]~', '_', $name ) );

		if ( ! $title ) {
			$title = vuebox_generate_title( $name );
		}

		$container = new VueBoxContainerBox;

		$container->data['type']  = $type;
		$container->data['name']  = $name;
		$container->data['title'] = $title;

		return $container;
	}
}