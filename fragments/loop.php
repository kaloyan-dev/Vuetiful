<?php

if ( have_posts() ):
	while( have_posts() ): the_post(); ?>
		<div class="page-entry">
			<div class="page-head">
				<?php
					echo is_single() ? '' : '<a href="' . get_permalink() . '">';
					the_title( '<h3>', '</h3>' );
					echo is_single() ? '' : '</a>';
				?>
			</div>
			<div class="page-content">
				<?php
					is_single() ? the_content() : the_excerpt();
				?>
			</div>
		</div>
	<?php endwhile;

	$max_pages = $wp_query->max_num_pages;
	$paged     = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	if ( $max_pages > 1 ): ?>
		<div class="pagination">
			<a href="<?php echo add_query_arg( 'paged', ( $paged - 1 ) > 0 ? $paged - 1 : 1 ); ?>">&laquo;</a>
			<?php
				foreach ( range( 1, $max_pages ) as $page_number ):
					$page_class = ( $page_number == $paged ) ? 'current' : ''; ?>
					<a class="<?php echo $page_class; ?>" href="<?php echo add_query_arg( 'paged', $page_number ); ?>">
						<?php echo $page_number; ?>
					</a>
				<?php endforeach;
			?>
			<a href="<?php echo add_query_arg( 'paged', ( $paged + 1 ) < $max_pages ? $paged + 1 : $max_pages ); ?>">&raquo;</a>
		</div>
	<?php endif;
endif;
