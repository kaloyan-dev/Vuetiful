<?php

if ( post_password_required() ) {
	return;
}
?>
 
<div id="comments" class="comments-area">
 
	<?php
		if ( have_comments() ) : ?>
			<h4 class="comments-title">
				<?php
					printf( _nx( 'One thought on "%2$s":', '%1$s thoughts on "%2$s":', get_comments_number(), 'comments title', 'vuetiful' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h4>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 32,
					) );
				?>
			</ol>
	 
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'vuetiful' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vuetiful' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vuetiful' ) ); ?></div>
				</nav>
			<?php endif;

			if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php _e( 'Comments are closed.' , 'vuetiful' ); ?></p>
			<?php endif;

		endif;

		comment_form();
	?> 
</div>