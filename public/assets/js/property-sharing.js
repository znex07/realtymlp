'use strict'

var submitVal="";
var sharing = {
	propertyId : 0,
	id: 0,
	_sharables : {
		attachments: {
			documents: [],
			images: [],
		},
		details: {},
		locations: {},
	},
	init: function() {
		$('#share')
			.on('show.bs.modal', sharing.fillModal)
			.on('hidden.bs.modal', sharing.clearModal);
		$('#sh_group').on('click',sharing.sayabes)
		$('#sh_affiliate').on('click',sharing.sayabes)

	},
	getSharingOptions: function() {
		var id = [];
		$(".source:checked").each(function () {
			id.push($(this).val());
		});
			var

					loader = $('.share-loader'),
					container = $('.share-sharables-container'),
					btnShare = $('#submit_share'),
					share_type = $('input[name=sharetype_cb]:checked').val(),
					start = function () {
						sharing.id = id;
						container.fadeOut("fast");
						loader.fadeIn("slow");
						btnShare.attr('disabled', true);
						var ajx = $.get('/dashboard/getSharable', {
							id: id,
							share_type:  share_type,
							type_share: $('#sharing_type').val(),
							property_id: sharing.propertyId,
						});

						ajx.done(ajxDone)
								.fail(ajxFail);
					},
					ajxDone = function (data) {
						console.log(data);
						if (data)
							fillCheckbox(data);
					},
					ajxFail = function (data, statusText, xhr) {
						// if (xhr === 'Unauthorized') {}
						alertify.error('Something went wrong!');
						// }
					},
					fillCheckbox = function (data) {
						$('.btn-blowup').attr('disabled', false);
						loader.hide();
						container.fadeIn("fast");
						btnShare.attr({
							'data-url': "/dashboard/postSharings",
							'disabled': false
						}).find('span').text('Share');

						$('#last-updated').parent().hide();
						$('#last-shared').parent().hide();
						if (data.hit) {
						var dates = {
						   shared: moment(data.property.pivot.created_at),
						   updated: moment(data.property.pivot.updated_at),
						};
						$('#last-shared').text(dates.shared.format('MMMM DD,YYYY HH:m')).parent().show();
						if (dates.updated.isAfter(dates.shared)) {
						   $('#last-updated').text(dates.updated.format('MMMM DD,YYYY HH:m')).parent().show();
						}

						btnShare.attr({
						   'data-url': "/dashboard/updateSharings"
						}).find('span').text('Update');
						}
						var sharables = data.hit ? data.property.pivot.sharables : data.property.sharables,
								_sharables = $.parseJSON(sharables),
								checkboxes = $('.share-sharables-container'),
								uid = function () {
									return 'xxxxxxxx-xxxx-4xxx'.replace(/[xy]/g, function (c) {
										var r = Math.random() * 16 | 0,
												v = c == 'x' ? r : (r & 0x3 | 0x8);
										return v.toString(16);
									});
								},
								cbDetLoc = function (i, v) {
									var input = checkboxes.find('input.scb_' + i),
											_id = 'scb_' + i + '-' + uid();
									input
											.addClass('meron')
											.attr({
												'id': _id,
												'data-name': i,
											});

									input
											.closest('label')
											.attr('for', _id)
											.parent()
											.show();
									if (!v)
										input.attr('checked', false);
								},
								cbImages = function (i, v) {
									var template = checkboxes.find('.template-imgs .img-container').clone(),
											_id = 'img_' + v.id + '-' + uid();

									template.find('img').attr({
										'src': '/uploads/' + v.file_path,
										'title': v.orig_name,
										'data-id': v.id,
									}).bind('click', sharing.initToggleImageCheckbox);

									template.find('input').attr({
										'id': _id,
										'data-id': v.id,
										'data-title': v.orig_name,
										'data-src': v.file_path,
									}).bind('click', sharing.toggleBorder).addClass('opt_imgs');

									template.find('label').attr({
										'for': _id,
									});
									if (!v.checked) {
										template.find('input').trigger('click');
									}

									checkboxes.find('.cb-imgs-container').append(template);

								},
								cbDocuments = function (i, v) {
									var template1 = checkboxes.find('.template-docs .doc-container').clone(),
											_id = 'img_' + v.id + '-' + uid();

									template1.find('doc').attr({
										'src': '/uploads/' + v.file_path,
										'title': v.orig_name,
										'data-id': v.id,
									}).bind('click', sharing.initToggleDocuCheckbox);

									template1.find('input').attr({
										'id': _id,
										'data-id': v.id,
										'data-title': v.orig_name,
										'data-src': v.file_path,
									}).bind('click', sharing.toggleBorder).addClass('opt_docs');

									template1.find('label').attr({
										'for': _id,
									});
									if (!v.checked) {
										template1.find('input').trigger('click');
									}

									checkboxes.find('.cb-docs-container').append(template1);
								},
								remap = function (i, v) {
									var _object = _sharables.attachments.images[i];
									var _object1 = _sharables.attachments.documents[i];
									console.log(_object1);
									v.id = _object.id;
									v.file_path = _object.file_path;
									v.orig_name = _object.orig_name;
									v.id = _object1.id;
									v.file_path = _object1.file_path;
									v.orig_name = _object1.orig_name;
								};
						if (_sharables) {
							checkboxes.find('.tab-location').hide();
							checkboxes.find('.tab-details').hide();
							checkboxes.find('.tab-attachments').hide();
							checkboxes.find('.images-wrapper').hide();
							checkboxes.find('.documents-wrapper').hide();

							if (Object.keys(_sharables.locations).length) {
								checkboxes.find('.tab-location').show();
								$.each(_sharables.locations, cbDetLoc);
							}
							if (Object.keys(_sharables.details).length) {
								checkboxes.find('.tab-details').show();
								$.each(_sharables.details, cbDetLoc);
							}
							if (_sharables.attachments.documents.length) {
								checkboxes.find('.tab-attachments').show();
								checkboxes.find('.documents-wrapper').show();
								checkboxes.find('.cb-docs-container').empty();

								if (!data.hit) {
									$.each(_sharables.attachments.documents, remap);
								}

								$.each(_sharables.attachments.documents, cbDocuments);
							}
							if (_sharables.attachments.images.length) {
								checkboxes.find('.tab-attachments').show();
								checkboxes.find('.images-wrapper').show();
								checkboxes.find('.cb-imgs-container').empty();

								if (!data.hit) {
									$.each(_sharables.attachments.images, remap);
								}

								$.each(_sharables.attachments.images, cbImages)
							}
						}
					};
			start();
	},
	getSharingOptionsupdate: function() {

		var id  = $(this).val(),
				loader = $('.share-loader'),
				container = $('.share-sharables-container'),
				btnShare = $('#submit_share'),
				share_type = $('input[name=sharetype_cb]:checked').val(),
				start = function () {
					sharing.id = id;
					container.fadeOut("fast");
					loader.fadeIn("slow");
					btnShare.attr('disabled', true);
					var ajx = $.get('/dashboard/getSharable', {
						id: id,
						share_type:  share_type,
						type_share: $('#sharing_type').val(),
						property_id: sharing.propertyId,
					});

					ajx.done(ajxDone)
							.fail(ajxFail);
				},
				ajxDone = function (data) {
					console.log(data);
					if (data)
						fillCheckbox(data);
				},
				ajxFail = function (data, statusText, xhr) {
					// if (xhr === 'Unauthorized') {}
					alertify.error('Something went wrong!');
					// }
				},
				fillCheckbox = function (data) {
					$('.btn-blowup').attr('disabled', false);
					loader.hide();
					container.fadeIn("fast");
					btnShare.attr({
						'data-url': "/dashboard/postSharings",
						'disabled': false
					}).find('span').text('Share');

					$('#last-updated').parent().hide();
					$('#last-shared').parent().hide();
					if (data.hit) {
						var dates = {
							shared: moment(data.property.pivot.created_at),
							updated: moment(data.property.pivot.updated_at),
						};
						$('#last-shared').text(dates.shared.format('MMMM DD,YYYY HH:m')).parent().show();
						if (dates.updated.isAfter(dates.shared)) {
							$('#last-updated').text(dates.updated.format('MMMM DD,YYYY HH:m')).parent().show();
						}

						btnShare.attr({
							'data-url': "/dashboard/updateSharings"
						}).find('span').text('Update');
					}
					var sharables = data.hit ? data.property.pivot.sharables : data.property.sharables,
							_sharables = $.parseJSON(sharables),
							checkboxes = $('.share-sharables-container'),
							uid = function () {
								return 'xxxxxxxx-xxxx-4xxx'.replace(/[xy]/g, function (c) {
									var r = Math.random() * 16 | 0,
											v = c == 'x' ? r : (r & 0x3 | 0x8);
									return v.toString(16);
								});
							},
							cbDetLoc = function (i, v) {
								var input = checkboxes.find('input.scb_' + i),
										_id = 'scb_' + i + '-' + uid();
								input
										.addClass('meron')
										.attr({
											'id': _id,
											'data-name': i,
										});

								input
										.closest('label')
										.attr('for', _id)
										.parent()
										.show();
								if (!v)
									input.attr('checked', false);
							},
							cbImages = function (i, v) {
								var template = checkboxes.find('.template-imgs .img-container').clone(),
										_id = 'img_' + v.id + '-' + uid();

								template.find('img').attr({
									'src': '/uploads/' + v.file_path,
									'title': v.orig_name,
									'data-id': v.id,
								}).bind('click', sharing.initToggleImageCheckbox);

								template.find('input').attr({
									'id': _id,
									'data-id': v.id,
									'data-title': v.orig_name,
									'data-src': v.file_path,
								}).bind('click', sharing.toggleBorder).addClass('opt_imgs');

								template.find('label').attr({
									'for': _id,
								});
								if (!v.checked) {
									template.find('input').trigger('click');
								}

								checkboxes.find('.cb-imgs-container').append(template);

							},
							cbDocuments = function (i, v) {
								var template1 = checkboxes.find('.template-docs .doc-container').clone(),
										_id = 'img_' + v.id + '-' + uid();

								template1.find('doc').attr({
									'src': '/uploads/' + v.file_path,
									'title': v.orig_name,
									'data-id': v.id,
								}).bind('click', sharing.initToggleDocuCheckbox);

								template1.find('input').attr({
									'id': _id,
									'data-id': v.id,
									'data-title': v.orig_name,
									'data-src': v.file_path,
								}).bind('click', sharing.toggleBorder).addClass('opt_docs');

								template1.find('label').attr({
									'for': _id,
								});
								if (!v.checked) {
									template1.find('input').trigger('click');
								}

								checkboxes.find('.cb-docs-container').append(template1);
							},
							remap = function (i, v) {
								var _object = _sharables.attachments.images[i];
								var _object1 = _sharables.attachments.documents[i];
								v.id = _object.id;
								v.file_path = _object.file_path;
								v.orig_name = _object.orig_name;
								v.id = _object1.id;
								v.file_path = _object1.file_path;
								v.orig_name = _object1.orig_name;
							};
					if (_sharables) {
						checkboxes.find('.tab-location').hide();
						checkboxes.find('.tab-details').hide();
						checkboxes.find('.tab-attachments').hide();
						checkboxes.find('.images-wrapper').hide();
						checkboxes.find('.documents-wrapper').hide();

						if (Object.keys(_sharables.locations).length) {
							checkboxes.find('.tab-location').show();
							$.each(_sharables.locations, cbDetLoc);
						}
						if (Object.keys(_sharables.details).length) {
							checkboxes.find('.tab-details').show();
							$.each(_sharables.details, cbDetLoc);
						}
						if (_sharables.attachments.documents.length) {
							checkboxes.find('.tab-attachments').show();
							checkboxes.find('.documents-wrapper').show();
							checkboxes.find('.cb-docs-container').empty();

							if (!data.hit) {
								$.each(_sharables.attachments.documents, remap);
							}

							$.each(_sharables.attachments.documents, cbDocuments);
						}
						if (_sharables.attachments.images.length) {
							checkboxes.find('.tab-attachments').show();
							checkboxes.find('.images-wrapper').show();
							checkboxes.find('.cb-imgs-container').empty();

							if (!data.hit) {
								$.each(_sharables.attachments.images, remap);
							}

							$.each(_sharables.attachments.images, cbImages);
						}
					}
				};
		start();
	},

	createSharables : function() {
		var checkboxes = $('.share-sharables-container'),
			start = function() {
				sharing._sharables.attachments.images = [];
				sharing._sharables.attachments.documents = [];
				checkboxes.find('.opt_locations.meron').each(locations);
				checkboxes.find('.opt_details.meron').each(details);
				checkboxes.find('.opt_imgs').each(attcImgs);
				checkboxes.find('.opt_docs').each(attcDocs);
			},
			details = function(i,v) {
				var name = $(v).data('name');
				sharing._sharables.details[name] = $(v).is(':checked');
			},
			locations = function(i,v) {
				var name = $(v).data('name');
				sharing._sharables.locations[name] = $(v).is(':checked');
			},
			attcImgs = function(i,v) {
				sharing._sharables.attachments.images.push(attcData(i,v));
			},
			attcDocs = function(i,v) {
				sharing._sharables.attachments.documents.push(attcData(i,v));
			},
			attcData = function(i,v) {
				return {
					checked: $(v).is(':checked'),
					id : $(v).data('id'),
					file_path : $(v).data('src'),
					orig_name : $(v).data('title'),
				};
			};

		start();
	},
	submit: function() {

            if(submitVal=="share")
			{	$.each(sharing.id, function(index, sharing_id) {
				var sharables = null,
						start = function() {
							sharing.createSharables();
							sharables = sharing._sharables
							$('#submit_share').attr('disabled', true);
							console.log(sharing.id);
							var url = $('#submit_share').data('url');
							var ajx = $.post(url, {
								_token : csrf_token,
								id: sharing_id,
								share_type : $('input[name=sharetype_cb]:checked').val(),
								property_id : sharing.propertyId,
								sharables : JSON.stringify(sharables),
							});
							ajx.done(ajxDone);
						},
						ajxDone = function(data) {
							window.location.reload();
						},
						ajxFail = function(e) {

						};
				start();
			});
			}
		    else if(submitVal=="update")

				{
					var sharables = null,
							start = function() {
								sharing.createSharables();
								sharables = sharing._sharables
								$('#submit_share').attr('disabled', true);
								console.log(sharing.id);
								var url = $('#submit_share').data('url');
								var ajx = $.post(url, {
									_token : csrf_token,
									id: sharing.id,
									share_type : $('input[name=sharetype_cb]:checked').val(),
									property_id : sharing.propertyId,
									sharables : JSON.stringify(sharables),
								});
								ajx.done(ajxDone);
							},
							ajxDone = function(data) {
								window.location.reload();
							},
							ajxFail = function(e) {

							};
					start();
			}




	},
	sayabes: function()
	{
		var btnShare = $('#submit_share');
		btnShare.attr({
			'data-url': "/dashboard/updateSharings",
		}).find('span').text('Update');
	},

	fillModal: function(e) {
		var btnUnshare = $('#submit_unshare'),
				btnShare = $('#submit_share');
		submitVal="share";

		btnShare.attr("style", "display: inline");
		btnUnshare.attr("style", "display: none");


		var modal = $(this),
			button = $(e.relatedTarget),
			parent = button.parents('.thumbnail-container').clone(),
			property_id = button.data('id'),
			thumbnails = $('a[data-command=share][data-id='+property_id+']').parents('.thumbnail-container.foshare').clone(),
			share_container = $('.share-thumbnail-container').empty(),


			start = function() {

				sharing.propertyId = property_id;
				createThumbnail();
				$('.share-thumbnail-btn').removeClass('active').on('click', thumbnailButton);
				$('.share_grid_public').addClass('active');
				$('.share_to').on('change',sharing.toggleInputs);
				$('#affiliate_id').on('change', sharing.getSharingOptions);
				$('#group_id').on('change', sharing.getSharingOptionsupdate);
				$('#submit_share').on('click', sharing.submit);
				$('#sh_affiliate').on('click',function() {
					btnShare.attr("style", "display: inline");
					btnUnshare.attr("style", "display: none");
					submitVal = "share";
					//alertify.alert(submitVal);
				});
				$('#sh_group').on('click',function() {
					btnShare.attr("style", "display: inline");
					btnUnshare.attr("style", "display: none");
					submitVal = "update";
					//alertify.alert(submitVal);
				});
				$('#sharetype_cb1').on('click',function() {
					$('#aff_div').show(1000);
					$('#group_div').hide(1000);
					$('#group1').show(1000);
					$('#group2').hide(1000);
				});
				$('#sharetype_cb2').on('click',function() {
					$('#group_div').show(1000);
					$('#aff_div').hide(1000);
					$('#group2').show(1000);
					$('#group1').hide(1000);
				});




			},
			createBlowup = function() {
				var href = share_container.find('.listing-thumbnail-anchor').attr('href');
				sharing.createSharables();
				var _data = null,
					start = function() {
						$('#preview')
							.on('shown.bs.modal', modalShown)
							.on('hidden.bs.modal', modalHidden)
							.find('.modal-body')
							.load(href + ' .blowup-property-parent', loadComplete);
						$('#preview').modal('toggle');
					},
					modalHidden = function() {
						$(this).find('.modal-body').empty();
						$('body').addClass('modal-open');
					},
					modalShown = function() {
						 //mapa.init(true);
						 //var map_options = $.parseJSON($('#map_options').val()) || null;
						 //   mapa.init_blowup(map_options);
						 //$(this).find('.modal-body').append($(this).find('.share-loader').show());
					},
					checkSharable = function() {
						var modal = $('#preview').find('.modal-body'),
							sharable = sharing._sharables;
						$.each(sharable.details, function(i,v) {
							if (!v)
								modal.find('.blowup-'+i).hide();
						});
						$.each(sharable.locations, function(i,v) {
							if (!v)
								modal.find('.blowup-'+i).hide();
						});
						$.each(sharable.attachments.images, function(i,v) {
							console.log(v.id);
							if (!v.checked)
								modal.find('.fotorama').find('img.blowup-img'+v.id).remove();
						});
						$.each(sharable.attachments.documents, function(i,v) {
							console.log(v.id);
							if (!v.checked)
								modal.find('.fotorama').find('doc.blowup-img'+v.id).remove();
						});
						modal.find('.fotorama').fotorama();
					},
					loadComplete = function(data) {
						var modal = $('#preview');
						modal.find('.panel-heading span.clickable').off().on('click', panelClick);

						mapa.init(true);
						var map_options = $.parseJSON($('#map_options').val()) || null;
						mapa.init_blowup(map_options);
						checkSharable();
						// $('#preview').modal('toggle');
					},
					panelClick = function(e) {
						var $this = $(this);
						console.log('wow');
						if(!$this.hasClass('panel-collapsed')) {
							$this.parents('.collapsible').find('.panel-body').slideUp();
							$this.addClass('panel-collapsed');
							$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
						} else {
							$this.parents('.collapsible').find('.panel-body').slideDown();
							$this.removeClass('panel-collapsed');
							$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
						}
					};
				start();
			},
			thumbnailButton = function(e) {
				e.preventDefault();
				var _this = $(this),
					target = $(_this.data('target'));
				$('.share-thumbnail').hide();
				target.fadeIn("fast");
			},
			thumbnailFill = function(elem) {

				share_container.append(elem);
			},
			thumbnailColumn = function(viewtype, panel) {
				var newelem = null,
					wrapper = $('<div/>'),
					btn = $('<button/>', {
						text: 'View More',
						click: createBlowup,
						class: 'btn btn-xs btn-info btn-blowup',
						type: 'button',
						disabled: true,
					});

				if (viewtype == 'gridview')
					wrapper.addClass('col-md-6 col-md-offset-3 share-thumbnail share_grid_view');
				else
					wrapper.addClass('col-md-12 share_list_view share-thumbnail').css('display','none');

				panel.find('.action-button').append(btn);
				panel.find('.listing-thumbnail-anchor').click(function(e) {
					e.preventDefault();
				});
				panel.find('.the9').css({
					'padding': '0',
				});
				newelem = panel.wrap(wrapper).parent();
				thumbnailFill(newelem);
			},
			createThumbnail = function() {

				thumbnails.each(function(i,v) {
					$(v).find('.action-button').css({
						'margin-bottom': '10px'
					}).empty();
					thumbnailColumn($(v).data('view-type'), $(v).find('.panel'));
				});
			};
		start();
	},

	toggleInputs: function() {
		var e = $(this),
			data = e.data('target-select'),
			target = $(data),
			type = e.data('sharing-type');
		$('#submit_share').attr('disabled', true);
		$('.share-sharables-container').hide();
		$('#sharing_type').val(type);
		$(".slc2 option[selected]").removeAttr('selected');
		$(".slc2 option[hidden]").attr('selected', true);
		$(".slc2").prop("selectedIndex",0)
		$('.slc2').hide();
		target.fadeIn();
	},

	toggleBorder: function() {
		var $this = $(this);
		var img = $this.parent().parent().find('img');
		if ($this.is(':checked')) {
			img.removeClass('cb_uncheck').addClass('cb_checked');
		}
		else {
			img.removeClass('cb_checked').addClass('cb_uncheck');
		}
	},

	initToggleImageCheckbox: function() {
		$(this).parent().find('input').trigger('click');
	},
	initToggleDocuCheckbox: function() {
		$(this).parent().find('input').trigger('click');
	},

clearModal: function () {

}

};