(function() {

	var VueBoxContainers = document.getElementsByClassName('vuebox-container');

	for ( var i = 0; i < VueBoxContainers.length; i++ ) {

		var VueBoxContainerSelector = '#' + VueBoxContainers[i].id;

		new Vue({

			el: VueBoxContainerSelector

		});
	}

})();