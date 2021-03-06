'use strict';

var edit = {
	province_set: false,
	property_classification_set: false,
	marker_options: $('input[name=map_options]').val() ? $.parseJSON($('input[name=map_options]').val()) : null,
	
	init : function() {
		// var files_metadata = $.parseJSON($('[name=files_metadata]').val());
		$('#property_title').trigger('input');
		$('#description').trigger('input');

		$('#property_classification')
			.on('change', edit.property_type($('#_property_type').val()))
			.trigger('change');
			

		$('#province')
			.trigger('change')
			.on('change', edit.city($('#_city').val()));

		$('[name=property_status][value='+$('#_property_status').val()+']').trigger('click');
        edit.set_attachments();
        edit.property_status();
        $('#listing_type')
        	.on('change', edit.stat($('#_stat').val()))
        	.trigger('change');
        // edit.listing_type();
        edit.prices();
        edit.set_map_attributes();
	},
	
	property_status: function(val) {
		$('[name=property_status][value='+val+']').trigger('click');
	},

	listing_type: function() {

	},

	stat: function(val) {
		setTimeout(function() {
			$('.stat option[value='+val+']').attr('selected','selected')
		},1500)
	},

	property_type: function(val) {
		setTimeout(function() {
			// console.log('saya')
			// $('#property_type').val(val);
			$('.stepwizard').find('.stepwizard-step a').removeAttr('disabled');
		},1500)
	},

	city: function(val) {
		if (!edit.province_set) {
			edit.province_set = true;
			$('#city option[value='+val+']').attr('selected','selected');
			$('#city').trigger('change');
			// console.log(val);

		}
	},

	prices: function() {
		var rental_stat = $('#_rental_stat').val(),
			selling_stat = $('#_selling_stat').val();
		$('input[name=selling_stat]').attr('checked',false);
		$("input[name=selling_stat][value='"+selling_stat+"']").trigger('click');
		$('input[name=rental_stat]').attr('checked',false);
		$("input[name=rental_stat][value='"+rental_stat+"']").trigger('click');
	},

	set_map_attributes: function() {
		var marker_type = edit.marker_options.marker_type;
		// setTimeout(function() {
		// 	mapa.map.setCenter(edit.marker_options.lat,edit.marker_options.lng); // too much recursion ?
		// 	mapa.map.setZoom(edit.marker_options.zoom);
		// 	// $('label[for='+marker_type+']').trigger('click');
		// 	setTimeout(function() {
		// 		if (marker_type != '') {
		// 			if (marker_type == 'area' && mapa.circle) {
		// 				mapa.circle.setRadius(edit.marker_options.marker_scale);
		// 			}
		// 		}
		// 	},500);
		// },500);
		if (edit.marker_options) {
			console.log(edit.ma);
			mapa.lat = edit.marker_options.lat;
            mapa.lng = edit.marker_options.lng;
			mapa.curRadius = edit.marker_options.marker_scale || 100;		
			mapa.map.setZoom(edit.marker_options.zoom);
			
			if (marker_type){
				$('label[for='+marker_type+']').trigger('click');
				mapa.draw_markers(marker_type); 
			}
		}
	},
	setCenter: function() {
		// var circle = mapa.circle.getCenter();	
		// mapa.map.setCenter(circle.G,circle.K);
	},

	set_attachments: function() {
		var imgs = $('.att-img'),
			docs = $('.att-doc');
		imgs.each(function(i,v) {
			var f = $(v);
			var mock = {
				name: f.data('name'),
				size: f.data('size'),
				id : f.data('id'),
			};
			dz.dzImg.emit('addedfile',mock);
			dz.dzImg.emit("thumbnail", mock, '/uploads/'+f.data('path'));
			dz.dzImg.emit('complete', mock);
			dz.dzImg.files.push(mock)
		});

		docs.each(function(i,v) {
			var f = $(v);
			var ext = dz.getFileExtension(f.data('name'))
			var icon='';
			if (dz.checkExt(ext,'doc'))
				icon = '/img/icons/'+ext+'.png';
			if (dz.checkExt(ext,'img'))
				icon = '/uploads/'+f.data('path');
			var mock = {
				name: f.data('name'),
				size: f.data('size'),
				id : f.data('id'),
			}
			dz.dzDoc.emit('addedfile',mock);
			dz.dzDoc.emit("thumbnail", mock, icon);			
			dz.dzDoc.emit('complete', mock);
			dz.dzDoc.files.push(mock)
		});

	}, 

};