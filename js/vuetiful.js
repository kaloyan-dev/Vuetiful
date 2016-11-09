;(function() {

	var vuetiful = new Vue({

		el: '#vuetiful',

		data: {
			posts      : vuetifulData.posts,
			pages      : parseInt( vuetifulData.pages ),
			currentPage: 1,
		},

		computed: {
			showPagination: function() {
				return this.pages > 1;
			}
		},

		methods: {
			setPage: function(page) {
				var nextPage = page;

				if ( nextPage === 0 ) {
					nextPage = this.pages;
				}

				if ( nextPage > this.pages ) {
					nextPage = 1;
				}

				this.currentPage = nextPage;
			}
		}

	});

})();