'use strict';

var post = {
	dropzones : {
		units : {},
		projects : {},
		success_projects : {},
		// success_units : {},
		// _units : {},
	},
	highestDZCount : 0,
	highestDZ : null,

	unitCounter : 0,
	classifications: [],
	cities: [],

	units : {},

	init: function() {
		Dropzone.autoDiscover = false;
		post.init_projectDropzone();
		$('#modal_units').on('show.bs.modal', post.init_units);
		// $('#property_classification').on('select2:select', post.loadPropertyType);
		// $('#property_classification').on('select2:unselect', post.loadPropertyType);
		$('#province').on('select2:select', post.loadCities);
		$('#province').on('select2:unselect', post.loadCities);
		$('#submitFeatured').bind('click', post.submitFeatured);
		window.onbeforeunload = function() {
			return "If you leave this page, you will lose any unsaved changes.";
		}
		// $('#modal_units').find('.modal-footer button').on('click', post.destroy_units);
	},

	init_projectDropzone: function() {
		var indexes = [1,2,3,4,6,8];
		$.each(indexes, function(i,v) {
			var opts = {
					index: v,
					type: 'project',
					paramName: 'dropzones',
					elem: '#dropzone-'+v,
					previewsContainer: '.dropzone-previews-'+v
				};
			post.make_dropzone(opts);
		});
	},
	// destroy_units: function(e) {
	// 	delete post.dropzones.units[''+post.unitCounter];
	// },

	loadPropertyType: function(e) {
		var values = $(this).val(),
			ajx = null,
			data = null;
		ajx = post.getPropertyType(values);
		ajx.done(function(data) {
			data = $.map(data, function(item) {
				return {
					id: item.id,
					parent_id: item.parent_id,
					text: item.department_name
				}
			});
			post.classifications = data;
			localStorage.setItem('classifications', JSON.stringify(data));
		});
	},

	getPropertyType : function(data) {
		var ajx = $.post('/admin/post/postClassification', {
					'_token' : $('#_token').val(),
					'classifications' : data
				});
		return ajx;
	},

	loadCities: function(e) {
		var selVal = $(this).val(),
			data = null;
		var getData = function() {
				$.get('/dashboard/property/wizard/requests',{
					'_token' : $('#_token').val(),
					'reqtype' : 'province',
					'value':selVal,
				}).done(saveData);
				localStorage.setItem('ap_'+selVal,true);
			},
			saveData = function(data) {
				localStorage.setItem('ap_'+selVal+'_data', JSON.stringify(data));
				next();
			},
			next = function() {
				data = $.map($.parseJSON(localStorage.getItem('ap_'+selVal+'_data')), function(item) {
					return {
						id: item.id,
						parent_id: item.parent_id,
						text: item.name
					};
				});
				load(data);
			},
			load = function(data) {
				$('#city').select2({
					placeholder: 'Select City',
					data: data
				}).trigger('change').attr('disabled', false);
			};

		if(!JSON.parse(localStorage.getItem('ap_'+selVal)))
			getData();
		else
			next();
	},

	getcity: function() {

	},

	make_dropzone: function(options) {
		var _captionInput = null,
			drop = new Dropzone(options.elem, {
				url: '/admin/post/postImage',
				paramName: options.paramName,
				previewsContainer: options.previewsContainer,
				uploadMultiple: true,
				parallelUploads: 200,
				autoProcessQueue: false,
				acceptedFiles: '.png, .jpg, .gif, .bmp',
				init: function() {
					var counter = 0;
					this.on('addedfile', function(file) {

						var removeButton = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px; position'>Remove File</button>"),
							name = options.paramName+'-'+ ++counter,
							captionInput = Dropzone.createElement("<input type='text' class='text-center' name='"+name+"' style='margin-top:7px; width:100%; cursor:text;' placeholder='Caption'  />"),
							thumbnail = Dropzone.createElement(''),
							_this = this;

						removeButton.addEventListener('click', function(e) {
							e.preventDefault();
							e.stopPropagation();
							_this.removeFile(file);
						});
						var _capt = file.previewElement.appendChild(captionInput);
						_captionInput = _capt;
						file.previewElement.appendChild(removeButton);
						// drop['captionInputs'] = [];
						file['captionInput'] = _captionInput;
						// file['unit_code'] = ''+post.unitCounter
					});
					this.on('removedfile', function(file) {

					});
					this.on('sending', function(file,xhr,formData) {
						formData.append("_token", $('#_token').val());
						formData.append('image_type', options.index);


						if (options.type === 'unit') {
							formData.append('_unit_code' ,$('#_unit_code').val());
							formData.append('project_code', $('#project_code').val());
							formData.append('dropzoneInputs[]',file.captionInput.value);
							formData.append('type', 2);
						}
						else if (options.type === 'project') {
							formData.append('dropzoneInputs[]',file.captionInput.value);
							formData.append('type', 1);
							formData.append('project_code', $('#_project_code').val());
							// var len = post.dropzones.projects[options.index].getQueuedFiles().length;
							// console.log(len);
							// if (len >= post.highestDZCount) {
								// post.highestDZCount = len;
								// post.highestDZ = _this;
							// }
						}
					});
					this.on('queuecomplete', function() {
						$('.dropzone-status-'+options.index).removeClass('label-warning').addClass('label-success').text('done!');
						// if (options.type === 'unit') {
						// 	// post.dropzones.success_units[options.index+''][options.index] = true;
						// 	// console.log("uploading of "+ options.type +': '+ options.index + '-'+options.counter+' done.');
						// 	$('.dropzone-status-'+options.index).removeClass('label-warning').addClass('label-success').text('done!');
						// }
						// else if (options.type === 'project') {
						// 	// post.dropzones.success_projects[options.index] = true;
						//
						// 	// console.log("uploading of "+ options.type +': '+ options.index + ' done.');
						// }
					});
					this.on('totaluploadprogress', function(totalBytes, totalBytesSent) {

					});
				}
			});

		if (options.type === 'project') {
			if (post.dropzones.projects[''+options.index] == null)
				post.dropzones.projects[''+options.index] = drop;
		}
		else if (options.type === 'unit') {
			if (post.dropzones.units[''+post.index] == null)
				post.dropzones.units[''+options.index] = drop;
		}
	},

	submitFeatured: function() {
		var btn = $(this);
		btn.attr('disabled', true);
		var fd = new FormData(),
			start = function() {

				$('#submitFeatured i.fa').removeClass('fa-check').addClass('fa-ban');
				var project_availability = {
					year: $('#availability_year').val(),
					quarter: $('#availability_quarter').val(),
					month: $('#availability_month').val()
				};
				fd.append('project_name',$('#project_name').val());
				fd.append('developer_code',$('#developer_code').val());
				fd.append('project_code',$('#_project_code').val());
				fd.append('property_classification', $('#property_classification').val());
				fd.append('project_description', $('#project_description').val());
				fd.append('whats', $('#whats').val());
				fd.append('building_amenities', $('#building_amenities').val());
				fd.append('facilities_services', $('#facilities_services').val());
				fd.append('commercial_area', $('#commercial_area').val());
				fd.append('project_availability', JSON.stringify(project_availability));
				fd.append('province', $('#province').val());
				fd.append('city', $('#city').val());
				fd.append('street_address', $('#street_address').val());
				fd.append('brgy', $('#brgy').val());
				fd.append('geopolitical_location', $('#geopolitical_location').val());
				fd.append('google_lat', mapa.curLocation.lat);
				fd.append('google_lng', mapa.curLocation.lng);
				fd.append('marker_type', $('#marker_type').val());
				fd.append('_token', $('#_token').val());
				// if (post.units) {
				// 	$.each(post.units, function(i,v) {
				// 		fd.append('units[]', JSON.stringify(v));
				// 	});
				// }
				submitImage();
			},
			submitImage = function() {
				$.each(post.dropzones.projects, function(i,v) {
					if (v.getQueuedFiles().length > 0) {
						$('.dropzone-status').addClass('label-warning').text('uploading...');
						v.processQueue();
					}
				});
				next();
				// $.each(post.dropzones.units, function(i,v) {
				// 	$.each(v, function(_i,_v) {
				// 		if (_v.getQueuedFiles().length > 0) {
				// 			console.log(_v);
				// 			_v.processQueue();
				// 		}
				// 	})
				// });
			},
			next = function() {
				$.ajax({
					url: '/admin/post/postFeatured',
					type: 'POST',
					contentType: false,
					processData: false,
					data : fd,
					success: function(data) {
						$('#submitFeatured i.fa').removeClass('fa-ban').addClass('fa-check');
						$('#submitFeatured span').text('Done!');
						// btn.attr('disabled', false);
						window.onbeforeunload = null;
						// location.reload();
					}
				});
			};
		start();
	},


	add_developer: function() {
		if ($('#dev_name').val().length) {
			var submit = $.post('/admin/post/addDeveloper', {
				_token : $('#_token').val(),
				developer_name : $('#dev_name').val()
			});
			submit.done(function(data) {
				location.reload();
			});
		}
	},

	add_unit: function() {
		var modal = $('#modal_units').find('.modal-body');
		var ctr = post.unitCounter;
		var unit_code = "U"+Date.now();
		var unit = {
			unit_name: modal.find('#unit_name-'+ctr).val(),
			unit_codename: modal.find('#unit_codename-'+ctr).val(),
			property_type: modal.find('#property_type-'+ctr).val(),
			quantity : modal.find('#quantity_available-'+ctr).val() +'/'+modal.find('#quantity_total-'+ctr).val(),
			min_price: modal.find('#min-price-'+ctr).val(),
			max_price: modal.find('#max-price-'+ctr).val(),
			updatedAt: modal.find('#myDate-'+ctr).val(),
			quantityTotal: modal.find('#quantity_total-'+ctr).val(),
			quantityAvailable: modal.find('#quantity_available-'+ctr).val(),
			unit_area: modal.find('#unit_area-'+ctr).val(),
			rooms: modal.find('#rooms-'+ctr).val(),
			bathrooms: modal.find('#bathroom-'+ctr).val(),
			parkings: modal.find('#parking-'+ctr).val(),
			unit_code: unit_code,
			project_updated: modal.find('#myDate-'+ctr).val(),

		};
		var input_code = $('<input>').attr({
			id:'_unit_code-'+ctr,
			type:'hidden',
			name:'_unit_code-'+ctr,
			value:unit_code
		});

		$('#unit-codes-container').append(input_code);
		post.units[ctr] = unit;
		post.unitPreview();
	},

	unitPreview: function() {
		var start = function() {
				var prev = $('.units-preview').find('div.col-md-6').clone(),
					modal = $('#modal_units');

				var src = '/img/img_placeholder.png',
				title = modal.find('.modal-body').find('#unit_name-'+post.unitCounter).val();
				if (post.dropzones.units[''+post.unitCounter][0].files.length)
					src = $(post.dropzones.units[''+post.unitCounter][0].files[0].previewElement).find('.dz-image img').attr('src');
				prev.find('img').attr({
					'src':src
				}).css({
					'width':'100%',
					'height':'100%'
				});
				prev.find('.unitprev-title').text(title);
				$('.units-preview-container').append(prev);
				next();
			},
			next = function() {
				$('#modal_units').modal('hide');
			};
		start();
	}
};
