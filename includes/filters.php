<?php

/**
 * Updates the "read more" part of the post excerpt
 * 
 * @return string
 */
function vuetiful_excerpt_more() {
	return ' ... <a class="read-more" href="' . get_permalink() . '">' . __( 'read more &raquo;', 'vuetiful' ) . '</a>';
}
add_filter( 'excerpt_more', 'vuetiful_excerpt_more' );
