<?php

function vuetiful_excerpt_more() {
	return ' ... <a class="read-more" href="' . get_permalink() . '">' . __( 'read more &raquo;', 'vue' ) . '</a>';
}
add_filter( 'excerpt_more', 'vuetiful_excerpt_more' );