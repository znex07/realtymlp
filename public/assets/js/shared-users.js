'use strict';

var shared = {
	property_id:0,
	user_id:0,

	init: function() {
		$('#shared-users').on('show.bs.modal', shared.fill_modal);
		$('#shared-users-edit-dataset').on('show.bs.modal', shared.fill_dataset);
	},

	fill_modal: function(e) {
		var e = $(e.relatedTarget),
			inputs = e.parent().find('.shares'),
			container = $(this).find('.shared-user-container');
			container.empty();
		shared.property_id = e.data('id');
		if (inputs.length) {			
			inputs.each(function(i,v) {
				var input = $(v),
					pivot = input.data('pivot'),
					tmp = $('.shared-user-template').find('.wrapper').clone();
				tmp.find('img').attr({
					'src': '/avatars/'+input.data('profile_image')
				});
				tmp.find('.shared-user-fullname').text(input.data('fullname'));
				// tmp.find('.shared-user-date').text(input.data(''))
				tmp.find('button.btn').attr({
					'data-user-id':input.data('id'),
					// 'data-pivot': JSON.stringify(pivot),
					'data-fullname': input.data('fullname')
				});
				tmp.find('input[type=hidden].pivots').val(JSON.stringify(pivot));
				container.append(tmp);
			});
		}
	},

	toggle_city: function() {
        // $(this).on('change', function(e) {
            if($(this).is(':checked'))
                $('#scb_city-1').prop('checked',false).parents('.col-md-3').fadeIn('fast')
            else
                $('#scb_city-1').prop('checked',false).parents('.col-md-3').fadeOut('fast')
        // });
    },

	fill_dataset: function(e) {
		var e = $(e.relatedTarget),
			modal = $(this),
			pivot = $.parseJSON(e.parent().find('input.pivots').val()),
			sharables = $.parseJSON(pivot.sharables),
			checkbox = modal.find('.sharing-viewability-wrapper');
		modal.find('#share-fullname').text(e.data('fullname'));
		// modal.find('button#save_dataset').data('user', e.data('user-id')).data();
		shared.user_id = e.data('user-id');
		modal.find('.cb-imgs-container,.cb-docs-container').empty();
		$.each(sharables.locations, function(i,v) {
			checkbox.find('label[for=scb_'+i+']').parent().show();
			checkbox.find('label[for=scb_'+i+']').attr({
				'for': 'scb_'+i+'-1'
			});
			checkbox.find('input#scb_'+i).attr({
				'id': 'scb_'+i+'-1'
			});
			if (i == 'province') 
				checkbox.find('input#scb_'+i+'-1').bind('change',shared.toggle_city);

			if (typeof v === 'string') 
				v = v == 'true';
			if (!v) {
				checkbox.find('input#scb_'+i+'-1').triggerAll('click change');
			}

			
		});
		$.each(sharables.details, function(i,v) {
			checkbox.find('label[for=scb_'+i+']').parent().show();
			checkbox.find('label[for=scb_'+i+']').attr({
				'for': 'scb_'+i+'-1'
			});
			checkbox.find('input#scb_'+i).attr({
				'id': 'scb_'+i+'-1'
			});
			if (typeof v === 'string') 
				v = v == 'true';
			if (!v) {
				checkbox.find('input#scb_'+i+'-1').trigger('click');
			}
		});
		modal.find('.documents-wrapper').hide();
		modal.find('.images-wrapper').hide();
		modal.find('.tab-attachments').hide();

		if (sharables.attachments.documents.length) {
			modal.find('.documents-wrapper').show();
			modal.find('.tab-attachments:hidden').show();
			$.each(sharables.attachments.documents, function(i,v) {
				var template = modal.find('.template-docs').find('.col-md-12').clone();
				template.find('.doc-name').text(v.orig_name);
				template.find('label').attr({
					'for': 'doc'+i
				});
				template.find('input').attr({
					'id': 'doc'+i,
					'data-id':v.id,
					'data-title':v.orig_name,
					'data-src':v.file_path
				});
				template.find('input').addClass('opt_docs');
				if (typeof v.checked === 'string') 
					v.checked = v.checked == 'true';
				if (!v.checked) {
					template.find('input').trigger('click');
				}
				checkbox.find('.cb-docs-container').append(template);
			});
		}

		if (sharables.attachments.images.length) {
			modal.find('.images-wrapper').show();
			modal.find('.tab-attachments:hidden').show();
			$.each(sharables.attachments.images, function(i,v) {    
				var template = modal.find('.template-imgs').find('.col-md-4').clone();

				template.find('input').addClass('opt_imgs');
				if (typeof v.checked === 'string') 
					v.checked = v.checked == 'true';
				if (!v.checked) {
					template.find('input').triggerAll('click change');
				}
				template.find('input').attr({
					'id': 'img'+i,
					'data-id':v.id,
					'data-title':v.orig_name,
					'data-src':v.file_path
				}).bind('change click',sharing.toggleBorder);
				template.find('img').attr({
					'src':'/uploads/'+v.file_path,
					'title':v.orig_name,
					'data-id':v.id
				}).bind('click', sharing.initToggleImageCheckbox);
				template.find('label').attr({
					'for': 'img'+i
				});
				checkbox.find('.cb-imgs-container').append(template);
			});
		}
	},	

	set_sharables: function() {
        var sharables = {
	            attachments : {
	                documents : [],
	                images : []
	            },
	            details: {},
	            locations: {}
	        },
	        modal = $('#shared-users-edit-dataset'),
	        btn = $(this);

        modal.find('.opt_details:visible').each(function(i,v) {
            var det = {},
                name = $(v).attr('id');
            name = name.substring(4,name.length);
            name = name.slice(0,-2);
            sharables.details[name] = $(v).is(':checked');
        });

        modal.find('.opt_locations:visible').each(function(i,v) {
            var det = {},
                name = $(v).attr('id');
            name = name.substring(4,name.length);
            name = name.slice(0,-2);
            sharables.locations[name] = $(v).is(':checked');
        });
        modal.find('.opt_docs').each(function(i,v) {
            sharables.attachments.documents.push({
                checked : $(v).is(':checked'),
                id : parseInt($(v).data('id')),
                orig_name : $(v).data('title'),
                file_path : $(v).data('src')
            });
        });
        modal.find('.opt_imgs').each(function(i,v) {
            sharables.attachments.images.push({
                checked : $(v).is(':checked'),
                id : parseInt($(v).data('id')),
                orig_name : $(v).data('title'),
                file_path : $(v).data('src')
            });
        });
        // console.log(sharables);
        btn.attr('disabled',true);
        $.ajax({
            url: '/dashboard/update',
            data: {
                user_id: parseInt(shared.user_id),
                property_id: parseInt(shared.property_id),
                sharables: sharables,
                _token: csrf_token
            },
            type: 'POST',
            success: function(data) {
            	btn.attr('disabled',false);
                $('#shared-users-edit-dataset').modal('hide');
                location.reload();
            }
        });
    }

}; 