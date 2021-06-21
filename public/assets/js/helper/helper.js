'use strict'

var helper = {
	storage: function() {
		supported = typeof(Storage) !== "undefined" ? true : false,
		localSave = function(key,value) {
			localStorage.setItem(key,value);
		},
		localRead = function(key) {
			return localStorage.getItem(key);
		}
	}
}