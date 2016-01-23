<?php

class VueBox_Handle extends VueBox {
	public function add_fields( $fields ) {
		if ( $this->data['type'] !== 'repeater' ) {
			return $this;
		}

		$this->data['fields'] = $fields;

		return $this;
	}
}