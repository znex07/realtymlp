'use strict';

var cities = {
	storSup : typeof(Storage) !== "undefined" ? true : false,
	init: function(elem) {
		elem.on('change',cities.change_cities);
	},
	change_cities: function(elem) {
		console.log()
	},
}
cities.init();