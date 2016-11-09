<?php get_header(); ?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div class="page-content">
				<div class="page-entry" v-for="post in posts" v-if="post.page === currentPage">
					<div class="page-head">
						<a :href="post.url">
							<h3>{{ post.title }}</h3>
						</a>
					</div>
					<div class="page-content">
						<div v-html="post.content">
							
						</div>
						<a v-if="post.trimmed" :href="post.url"><?php _e( 'Read More &raquo;', 'vuetiful' ); ?></a>
					</div>
				</div>

				<div class="pagination" v-if="showPagination">
					<a href="#" @click.prevent="setPage( currentPage - 1)">&laquo;</a>
					<a href="#" v-for="page in pages" :class="{ current: page === currentPage }" @click.prevent="setPage( page )">
						{{ page }}
					</a>
					<a href="#" @click.prevent="setPage( currentPage + 1)">&raquo;</a>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
