<?php

function vue_excerpt_more() {
	return ' ... <a class="read-more" href="' . get_permalink() . '">' . __( 'read more &raquo;', 'vue' ) . '</a>';
}
