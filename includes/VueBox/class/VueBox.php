<?php

abstract class VueBox {

	protected $options = array();

	public $data = array(
		'type'    => false,
		'name'    => false,
		'title'   => false,
		'caption' => false,
	);

	public static function set( $type, $name, $title = false ) {
		if ( ! $type || ! $name ) {
			return;
		}

		if ( ! $title ) {
			$title = vuebox_generate_title( $name );
		}

		$vuebox= new VueBox_Handle();

		$vuebox->data['type']  = $type;
		$vuebox->data['name']  = $name;
		$vuebox->data['title'] = $title;

		return $vuebox;
	}

	public function caption( $caption ) {
		$this->data['caption'] = $caption;

		return $this;
	}

}