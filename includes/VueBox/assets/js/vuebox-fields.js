(function() {

	/* Text */
	Vue.component( 'vuebox-text', {
		template: '' +
		'<div class="vuebox-field vuebox-field-text">' +
			'<div class="vuebox-field-title">' +
				'<label>{{ title }}</label>' +
			'</div>' +
			'<input class="widefat" name="{{ name }}" type="text" value="{{ value }}">' +
			'<p v-if="caption" class="vuebox-caption">{{ caption }}</p>' +
		'</div>',

		props: ['title', 'name', 'value', 'caption']
	} );

	/* Textarea */
	Vue.component( 'vuebox-textarea', {
		template: '' +
		'<div class="vuebox-field vuebox-field-text">' +
			'<div class="vuebox-field-title">' +
				'<label>{{ title }}</label>' +
			'</div>' +
			'<textarea class="widefat" name="{{ name }}" type="text">{{ value }}</textarea>' +
			'<p v-if="caption" class="vuebox-caption">{{ caption }}</p>' +
		'</div>',

		props: ['title', 'name', 'value', 'caption']
	} );

	/* Colorpicker */
	Vue.component( 'vuebox-colorpicker', {
		template: '' +
		'<div class="vuebox-field vuebox-field-color">' +
			'<div class="vuebox-field-title">' +
				'<label>{{ title }}</label>' +
			'</div>' +
			'<input name="{{ name }}" type="text" value="{{ value }}">' +
			'<p v-if="caption" class="vuebox-caption">{{ caption }}</p>' +
		'</div>',

		ready: function() {
			jQuery( this.$el.children[1] ).iris({
				palettes: true
			});
		},

		props: ['title', 'name', 'value', 'caption']
	} );

	/* Repeater */
	Vue.component( 'vuebox-repeater', {
		template: '' +
		'<div class="vuebox-field vuebox-field-repeater">' +
			'<input type="hidden" name="{{ name }}[]" />' +
			'<div class="vuebox-field-title">{{ title }}</div>' +
			'<div class="vuebox-repeater-children">' +
				'<div class="vuebox-repeater-fieldwrap" v-for="n in fieldsets">' +
					'<span class="vuebox-fieldwrap-handle"><i class="fa fa-arrows-v"></i></span>' +
					'<slot>No fields added.</slot>' +
				'</div>' +
			'</div>' +
			'<div class="vuebox-repeater-actions">' +
				'<a href="#" @click.prevent="addFieldset">Add Fieldset</a>' +
			'</div>' +
			'<p v-if="caption" class="vuebox-caption">{{ caption }}</p>' +
		'</div>',

		methods: {
			addFieldset: function() {
				this.fieldsets++;
			}
		},

		props: ['title', 'name', 'value', 'children', 'caption', 'fieldsets']
	} );

})();