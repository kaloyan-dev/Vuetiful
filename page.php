<?php
get_header();
the_post();
?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-head">
				<?php the_title( '<h3>', '</h3>' ); ?>
			</div>

			<div class="page-content">
				<?php the_content(); ?>				
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
