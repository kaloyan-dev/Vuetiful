<?php get_header(); ?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-content">
				<?php get_template_part( 'fragments/loop' ); ?>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
