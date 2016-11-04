<?php get_header(); ?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-entry">
				<div class="page-head">
					<h3><?php _e( '404 - Page Not Found', 'vuetiful' ); ?></h3>
				</div>

				<div class="page-content">
					<?php printf( __( 'Go back to the <a href="%s">homepage</a>.', 'vuetiful' ), home_url( '/' ) ); ?>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
