<?php

function vue_year_shortcode() {
	return date( 'Y' );
}
add_shortcode( 'year', 'vue_year_shortcode' );
