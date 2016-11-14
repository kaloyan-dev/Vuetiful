<?php
/* Template Name: Full Width */
get_header();
the_post();
?>
<div class="main">
	<div class="shell">
		<div class="page-content">
			<div class="page-entry">
				<div class="page-head">
					<?php the_title( '<h3>', '</h3>' ); ?>
				</div>
				<div class="page-content">
					<?php
						the_content();
						
						if ( comments_open() ):
							comments_template();
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
