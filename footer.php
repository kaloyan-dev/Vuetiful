	<?php
		$copyright_text = carbon_get_theme_option( 'copyright_text' );

		if ( $copyright_text ): ?>
			<div class="footer">
				<div class="shell">
					<?php echo wpautop( do_shortcode( $copyright_text ) ); ?>
				</div>
			</div>
		<?php endif;

		wp_footer();
	?>
</body>
</html>