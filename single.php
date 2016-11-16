<?php
get_header();
the_post();
?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-content">
				<div class="page-entry">
					<div class="page-head">
						<?php
							the_title( '<h3>', '</h3>' );
							the_tags();
						?>
					</div>
					<div class="page-content">
						<?php
							the_content();

							posts_nav_link();

							wp_link_pages();
							
							if ( comments_open() ):
								comments_template();
							endif;
						?>
					</div>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
