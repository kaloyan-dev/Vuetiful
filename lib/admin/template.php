<div class="wrap">
	<div id="vuetiful-admin" v-cloak>
		<h1><?php _e( 'Vuetiful Options', 'vuetiful' ); ?></h1>
		<form action="<?php echo add_query_arg( 'page', 'vuetiful-admin.php', admin_url( 'options-general.php' ) ); ?>" method="post">
			<h2><?php _e( 'Theme Color', 'vuetiful' ); ?></h2>
			
			<div class="vuetiful-colors">
				<a v-for="(value, key) in colors" @click.prevent="setThemeColor( key )" :title=value[0] :class="{ selected: key === themeColor }" :style="{ backgroundColor: value[1] }" href="#"></a>
			</div>

			<input type="hidden" class="vuetiful-color-selected" name="vuetiful_theme_color" v-model="themeColor" />
			<?php wp_nonce_field( 'vuetiful_update_options', 'vuetiful_update_options_field' ); ?>

			<p class="submit"><input type="submit" name="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'vuetiful' ); ?>"></p>
		</form>
	</div>
</div>