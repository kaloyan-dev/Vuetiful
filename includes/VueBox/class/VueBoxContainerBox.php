<?php

class VueBoxContainerBox {

	public $data = array(
		'type'        => 'custom-fields',
		'name'        => '',
		'title'       => '',
		'screen'      => array( 'post' ),
		'fields'      => array(),
		'field_names' => array(),
	);

	public function screen( $screen ) {
		$this->data['screen'] = (array) $screen;

		return $this;
	}

	public function fields( $fields ) {
		$this->data['fields'] = (array) $fields;

		if ( $this->data['type'] === 'custom-fields' ) {
			add_action( 'add_meta_boxes', array( $this, 'init_meta_box' ) );
			add_action( 'save_post', array( $this, 'save_post_meta' ) );
		} else  {
			add_action( 'admin_menu', array( $this, 'init_menu_page' ) );
		}

		return $this;
	}

	public function init_meta_box() {

		foreach ( $this->data['screen'] as $screen ) {
			add_meta_box(
				$this->data['name'],
				$this->data['title'],
				array( $this, 'render_meta_box' ),
				$screen
			);
		}
	}

	public function init_menu_page() {
		add_menu_page(
			$this->data['title'],
			$this->data['title'],
			'manage_options',
			'vuebox-' . sanitize_title( $this->data['title'] ),
			array( $this, 'render_menu_page' )
		);
	}

	public function render_meta_box() {
		$container_id = str_replace( '_', '-', $this->data['name'] ); ?>
		<div id="vuebox-<?php echo $container_id; ?>" class="vuebox-container">
			<?php vuebox_render_fields( $this, $this->data['fields'], true ); ?>
		</div>
		<?php
	}

	public function render_menu_page() {
		$container_id = str_replace( '_', '-', $this->data['name'] ); ?>
		<div id="vuebox-<?php echo $container_id; ?>" class="vuebox-container">
			<div class="wrap">
				<h2><?php echo $this->data['title']; ?></h2>

				<form action="<?php echo add_query_arg( 'page', 'vuebox-' . sanitize_title( $this->data['title'] ) ); ?>" method="post">
					<?php vuebox_render_fields( $this, $this->data['fields'] ); ?>
					<div class="vuebox-form-actions">
						<input type="submit" class="button button-primary" value="<?php _e( 'Save Options', 'vuebox' ); ?>" />
					</div>
				</form>
			</div>
		</div>
	<?php
	}

	public function save_post_meta( $post_id ) {
		foreach ( $this->data['fields'] as $field ) {
			$field_name = $field->data['name'];

			if ( empty( $_POST[$field_name] ) ) {
				return;
			}

			update_post_meta( $post_id, '_' . $field_name, $_POST[$field_name] );
		}
	}
}