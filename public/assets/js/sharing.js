'use strict';

var sharing = {
	document_container: $("#document_container"),
	// document_template: null,
	sharingData: $('#sharingData'),
	m_property_price: $('#m_property_price'),
	m_property_location: $('#m_property_location'),
	m_property_attribute: $('#m_property_attribute'),
	m_property_title: $('#m_property_title'),
	m_property_picture: $('#m_property_picture'),
	affDatum:null,
	init: function() {
		// $('#share').on('show.bs.modal', sharing.other_fill_modal);
		// sharing.fill_modal();
		$('#share').on('show.bs.modal', sharing.fill_modal);
		sharing.init_datum();
		sharing.initTagInput();
		sharing.toggleCheckBox();
		sharing.toggleBorder();
	},

	init_datum: function() {
		sharing.affDatum = new Bloodhound({
		    datumTokenizer: function(e) {
		        return Bloodhound.tokenizers.whitespace(e);
		    },
		    queryTokenizer: Bloodhound.tokenizers.whitespace,

		    remote: {
		        url: '/users/search_aff?query=%QUERY',
		        filter: function(response) {
		            return $.map(response.data, function(object) {
		                return {
		                    value: object.user_fname + " " + object.user_lname,
		                    data: object
		                };
		            });
		        }
		    }
		});
	},

	fill_modal: function(e) {
		console.log()
		var modal = $(this),
			template = $(e.relatedTarget).parents('.list_view').clone(),
			sharables = $.parseJSON(template.find('.property-sharables').val()),
			checkbox = modal.find('.sharing-checkbox-container').find('.sharing-viewability-wrapper'),
			documents = template.find('.property-documents input.documents'),
			images = template.find('.property-images input.images'),
			property_id = $('input[name=property_id]');
		// $(this).find('.sharing-checkbox-container').find('.cb-imgs-container').empty();
		modal.find('.sharing-checkbox-container').find('.cb-imgs-container,.cb-docs-container').empty();

		sharing.clearAdvancedOption();

		property_id.val($(e.relatedTarget).data('id'));
		template.find('.dropup').parent().remove();
		template.find('.the9').css('height','auto');

		$.each(sharables.details, function(i,v) {
			checkbox.find('label[for=scb_'+i+']').parent().show();
			checkbox.find('input#scb_'+i).addClass('meron');
			if (typeof v === 'string')
				v = v == 'true';
			if (!v)
				checkbox.find('input#scb_'+i).trigger('click');
		});
		$.each(sharables.locations, function(i,v) {
			checkbox.find('label[for=scb_'+i+']').parent().show();
			checkbox.find('input#scb_'+i).addClass('meron');
			if (typeof v === 'string')
				v = v == 'true';
			if (!v)
				checkbox.find('input#scb_'+i).trigger('click');

			if (i == 'province')
                checkbox.find('input#scb_'+i).bind('change',affiliate.toggle_city);
		});

		$('.documents-wrapper').hide();
		$('.images-wrapper').hide();
		$('.tab-attachments').hide();
		if (documents.length) {
			$('.documents-wrapper').show();
			$('.tab-attachments:hidden').show();
			$.each(documents, function(i,v) {
				var val = $.parseJSON($(v).val()),
					template = modal.find('.template-docs').find('.col-md-12').clone();
				template.find('.doc-name').text(val.orig_name);
				template.find('label').attr({
					'for': 'doc'+val.id
				});
				template.find('input').attr({
					'id': 'doc'+val.id,
					'data-id': val.id,
					'data-title': val.orig_name,
					'data-src': val.file_path
				}).addClass('opt_docs');
				checkbox.find('.cb-docs-container').append(template);
			});
		}
		if (images.length) {
			$('.images-wrapper').show();
			$('.tab-attachments:hidden').show();
			$.each(images, function(i,v) {
				var val = $.parseJSON($(v).val()),
					template = modal.find('.template-imgs').find('.col-md-4').clone();
				template.find('img').attr({
					'src':'/uploads/'+val.file_path,
					'title':val.orig_name,
					'data-id':val.id
				}).bind('click', sharing.initToggleImageCheckbox);

				template.find('input').attr({
					'id': 'img'+val.id,
					'data-id': val.id,
					'data-title': val.orig_name,
					'data-src': val.file_path
				}).bind('change',sharing.toggleBorder).addClass('opt_imgs');

				template.find('label').attr({
					'for': 'img'+val.id
				});
				checkbox.find('.cb-imgs-container').append(template);
			});
		}

		$('.sharing-property-container').empty().append(template);
	},
	getFileExtension: function(filename) {
		var ext = /^.+\.([^.]+)$/.exec(filename);
		return ext == null ? "" : ext[1];
	},
	initTagInput: function(elem,obj) {
		sharing.affDatum.initialize();
		$('#affi_ids').tagsinput({
			itemValue:'value',
			itemText:'value',
			typeaheadjs: {
				minLength:3,
				source:sharing.affDatum.ttAdapter(),
				templates: {
				    suggestion: function(data) { // data is an object as returned by suggestion engine
				    	var d = data;
				        return '<div class="sugg-list">'+
				        		'<img src="/avatars/' + d.data.profile_image+'" width="20" height="20" /><span style="margin-left:10px;">'+ d.value+'</span>'+
				        		'<br><span style="font-size:12px;color:#909090;margin-left:30px;">'+d.data.email+'</span>'+
				        		'</div>';
				    },
				    empty: ['<p class="empty-message">',
		                  'Result not found',
		                '</p>'
		              ].join('\n')

				}
			}
		});
	},
	validate: function(elem){
		var val = elem.val();
		// console.log(elem);
		if (val !== '') {
			$("#submitShare").attr('disabled',false);
		}
		else {
			$("#submitShare").attr('disabled',true);
		}
	},
	clearAdvancedOption: function() {
		$('#show_advanced')
			.data('status','hidden')
			.html('<i class="fa fa-cog"></i> Advanced Settings');

		$('#advance_settings').hide();
	},
	// show advanced options
	toggleAdvanceOption: function(elem) {
		var e = $(elem),
		start = function() {
			var advance_settings = $('#advance_settings');
	        var status = e.data('status');

	        if(status == 'hidden') {
	        	advance_settings.slideDown();
	            e.html('<i class="fa fa-cog"></i> Hide Advanced Settings');
	            e.data('status','visible');
	        }
	        else if(status == 'visible') {
	        	advance_settings.slideUp();
	            e.html('<i class="fa fa-cog"></i> Advanced Settings');
	            e.data('status','hidden');
	        }
		}
		start();
	},
	// shareMessage: function(success) {
	// 	console.log(success);
	// 	alertify.error('Please Input atleast one affilates you want to share with');
	// },
	initToggleImageCheckbox: function() {
		$(this).parent().find('input').trigger('click');
	},
	toggleCheckBox: function() {
		$('#check_all').on('change', function(e) {
			$('.options:visible,.template_input:visible').prop('checked',$(e.target).prop('checked'));
			sharing.togglecheckAllBorder();
		});
	},
	togglecheckAllBorder: function() {
		$('.template_input:not(:last)').each(function(i,v) {
			if($(v).is(':checked')){
				$(v).parent().parent().find('img').removeClass('cb_uncheck').addClass('cb_checked');
			}
			else{
				$(v).parent().parent().find('img').removeClass('cb_checked').addClass('cb_uncheck');
			}
		});
	},
	toggleBorder: function(e) {
		// console.log(e);
		var $this = $(this);
		var img = $this.parent().parent().find('img');
		if ($this.is(':checked')) {
			img.removeClass('cb_uncheck').addClass('cb_checked');
		}
		else {
			img.removeClass('cb_checked').addClass('cb_uncheck');
		}
	},
	submitShare: function(elem) {

		var limit = $('input.doc_cb').length;
		$("input.doc_cb").each(function(i,v) {
			if ($(v).is(':checked') && i < limit-1) {
				sharing.sharingData.append('<input type="hidden" name="_documents_id[]" value="'+$(v).data('id')+'">');
			}
		});
		$("input[type=checkbox].options").each(function(i,v) {
			var val = false;
			if ($(v).is(':checked'))
				val = true;
			var input = $('<input>').attr({
				type: 'hidden',
				name: '_sharing_options[]',
				value: $(v).attr('id')+':'+val
			});
			sharing.sharingData.append(input);
		});
		var affisDatum = $('#affi_ids').tagsinput('items');
		$.each(affisDatum,function(i,v) {
			var input = $('<input>').attr({
				type:'hidden',
				name:'_affiliate_ids[]',
				value: v.data.id
			});
			sharing.sharingData.append(input);
		});

		$("#formShare").submit();
	},

	other_submit_sharings: function(elem) {
		$(elem).prop('disabled',true);
		sharing.set_sharables();
	},
	set_sharables: function() {
		var sharables = {
			attachments : {
				documents : [],
				images : []
			},
			details: {},
			locations: {}
		};

		$('#share').find('.opt_imgs').each(function(i,v) {
			sharables.attachments.images.push({
				checked : $(v).is(':checked'),
				id : $(v).data('id'),
				file_path : $(v).data('src'),
				orig_name: $(v).data('title')
			});
		});
		$('#share').find('.opt_docs').each(function(i,v) {
			sharables.attachments.documents.push({
				checked : $(v).is(':checked'),
				id : $(v).data('id'),
				file_path : $(v).data('src'),
				orig_name: $(v).data('title')
			});
			// console.log(sharables.attachments.documents);
		});
		$('#share').find('.opt_details.meron').each(function(i,v) {
			var det = {},
				name = $(v).attr('id');
			name = name.substring(4,name.length);
			sharables.details[name] = $(v).is(':checked');
		});

		$('#share').find('.opt_locations.meron').each(function(i,v) {
			var det = {},
				name = $(v).attr('id');
			name = name.substring(4,name.length);
			sharables.locations[name] = $(v).is(':checked');
		});

		var affisDatum = $('#affi_ids').tagsinput('items');
		$.each(affisDatum,function(i,v) {
			var input = $('<input>').attr({
				type:'hidden',
				name:'affiliate_ids[]',
				value: v.data.id
			});
			sharing.sharingData.append(input);
		});

		var sharables_input = $('<input>').attr({
			type:'hidden',
			name:'sharables',
			value: JSON.stringify(sharables)
		});
		// window.sessionStorage.setItem('sharables', JSON.stringify(sharables));
		sharing.sharingData.append(sharables_input);
		$("#formShare").submit();
	},
	detachListing: function(elem) {

		var e = $(elem),
			property_id = e.data('property-id'),
			user_id = e.data('user-id'),
			start = function() {
				$.ajax({
                    url: '/dashboard/removeShare',
                    data: {
                        property_id: property_id,
                        user_id: user_id,
                        _token: csrf_token
                    },
                    type: 'POST',
                    success: next
                });
			},
			next = function(data) {
				if (data.success) {
					alertify.success("Property was removed from list");
					location.reload();
				}
			};

		alertify.confirm("RealtyMLP","Are you sure you want to unshare this property ?",
            function(){
                start();
            },
            function(){

            }
        );

	},

	fill_checkables: function() {

	}
}
