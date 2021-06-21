'use strict';

var share = {
	property_data:null,
	
	init: function() {
		$('#share').on('show.bs.modal', share.get_data);
	},

	get_data: function(elem) {
		var e = $(elem.relatedTarget),
			data = e.parent().find('.property-data').val();
		share.data = JSON.parse(data);
		console.log(share.data);
	},

	fill_modal: function() {
		var data = share.property_data;
		$('#m_property_title').text(data.property_title);
		// $('#m_property_attribute').find('span').text()

	},

	// inits
	init_datum: function() {

	},

	init_tagsinput: function() {

	},
	
	toggle_checkbox: function() {

	},

	toggle_border: function() {

	}


};