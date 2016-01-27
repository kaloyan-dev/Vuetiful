<?php

if ( have_posts() ):
	while( have_posts() ): the_post(); ?>
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
	<?php endwhile;
endif;
