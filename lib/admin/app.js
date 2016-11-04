;(function() {

	var vuetiful = new Vue({

		el: '#vuetiful-admin',

		data: {
			themeColor: vuetifulData.themeColor,
			colors: vuetifulData.themeColors
		},

		methods: {
			setThemeColor: function(color) {
				this.themeColor = color;
			}
		}

	});

})();