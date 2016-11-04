<?php

function vuetiful_request( $name = false ) {

	if ( ! $name ) {
		return '';
	}

	if ( isset( $_GET[ $name ] ) ) {
		return $_GET[ $name ];
	}

	if ( isset( $_POST[ $name ] ) ) {
		return $_POST[ $name ];
	}

	return '';
}