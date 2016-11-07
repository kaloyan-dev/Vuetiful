;(function() {

	var vuetiful = new Vue({

		el: '#vuetiful-admin',

		data: {
			themeColor   : vuetifulData.themeColor,
			themeColors  : vuetifulData.themeColors,
			faviconID    : vuetifulData.faviconID,
			faviconURL   : vuetifulData.faviconURL,
			faviconTitle : vuetifulData.faviconTitle,
			faviconButton: vuetifulData.faviconButton,
			faviconFrame : false,
		},

		methods: {
			setThemeColor: function(color) {
				this.themeColor = color;
			},

			pickFavicon: function() {
				var _this = this;

				if ( this.faviconFrame ) {
					this.faviconFrame.open();
					return;
				}

				this.faviconFrame = wp.media({
					title: this.faviconTitle,
					button: {
						text: this.faviconButton
					},
					multiple: false
				});

				this.faviconFrame.on( 'select', function() {
					var attachment = _this.faviconFrame.state().get('selection').first().toJSON();

					_this.faviconID  = attachment.id;
					_this.faviconURL = attachment.url;
				});

				this.faviconFrame.open();
			},

			removeFavicon: function() {
				this.faviconID  = '';
				this.faviconURL = '';
			}
		}

	});

})();