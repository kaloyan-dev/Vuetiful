<div class="wrap">
	<div id="vuetiful-admin" v-cloak>
		<h1><?php _e( 'Vuetiful Options', 'vuetiful' ); ?></h1>
		<form action="<?php echo add_query_arg( 'page', 'vuetiful-admin.php', admin_url( 'themes.php' ) ); ?>" method="post">
			
			<!-- Favicon -->
			<h2><?php _e( 'Favicon', 'vuetiful' ); ?></h2>
			<div class="vuetiful-favicon">
				<div class="vuetiful-favicon-preview" v-if="faviconURL">
					<img :src="faviconURL" alt="" />
					<a href="#" @click.prevent="removeFavicon">x</a>
				</div>
				<input type="hidden" name="vuetiful_favicon" v-model="faviconID" />
				<input type="hidden" v-model="faviconURL" />
				<input type="submit" class="button" value="<?php _e( 'Pick Favicon', 'vuetiful' ); ?>" @click.prevent="pickFavicon" />
			</div>

			<!-- Theme Color -->
			<h2><?php _e( 'Theme Color', 'vuetiful' ); ?></h2>
			<div class="vuetiful-colors">
				<a v-for="(value, key) in themeColors" @click.prevent="setThemeColor( key )" :title=value[0] :class="{ selected: key === themeColor }" :style="{ backgroundColor: value[1] }" href="#"></a>
				<input type="hidden" class="vuetiful-color-selected" name="vuetiful_theme_color" v-model="themeColor" />
			</div>

			<!-- Modules -->
			<h2><?php _e( 'Modules', 'vuetiful' ); ?></h2>
			<?php
				$module_manager = Vuetiful\Module_Manager::instance();
				$modules        = $module_manager->get_modules();
				$loaded_modules = get_option( 'vuetiful-modules' );

				if ( ! is_array( $loaded_modules ) ) {
					$loaded_modules = array();
				}

				if ( $modules ): ?>
					<div class="vuetiful-modules">
						<?php
							foreach ( $modules as $module ): ?>
								<p>
									<label>
										<input type="checkbox" name="vuetiful_modules[]" value="<?php echo sanitize_title( $module ); ?>" <?php checked( in_array( sanitize_title( $module ), $loaded_modules ) ); ?> />
										<?php echo vuetiful_beautify( $module ); ?>
									</label>
								</p>
							<?php endforeach;
						?>
					</div>
				<?php else: ?>
					<p><em><?php _e( 'No modules found.', 'vuetiful' ); ?></em></p>
				<?php endif;
			?>

			<?php wp_nonce_field( 'vuetiful_update_options', 'vuetiful_update_options_field' ); ?>
			<p class="submit"><input type="submit" name="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'vuetiful' ); ?>"></p>
		</form>
	</div>
</div>