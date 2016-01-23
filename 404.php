<?php get_header(); ?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-head">
				<h3><?php _e( '404 - Page Not Found', 'vue' ); ?></h3>
			</div>

			<div class="page-content">
				<?php printf( __( 'Go back to the <a href="%s">homepage</a>.', 'vue' ), home_url( '/' ) ); ?>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
