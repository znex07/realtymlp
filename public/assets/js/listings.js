'use strict';

var listings = {
	selected_user_id: 0,
	init: function() {

		var self = listings;
		self.initViewFrom();
		self.initCommands();
		self.initListingCommands();
		$('#share').on('shown.bs.modal', self.modalShown)
		$('.listings-container').mixItUp({
			controls: {
				enable: false,
			},
			animation: {
				enable: false		
			},
		  load: {
			  filter: '.list_view',
			},
			callbacks: {
				onMixEnd: function() {
					$('.list_view.mix').css('display','block');
				}
			}
		});
	},
	initViewFrom: function() {
		var start = function() {
			$('[name="listing_view"]').change(changed);
		},
		changed = function() {
			$('#form_view_form').submit();
		};
		start();
	},

	modalShown: function(e) {
		var triggerButton = $(e.relatedTarget),
			shares = triggerButton.find('.prop_share'),
				unshares = triggerButton.find('.prop_sharess'),
				unshared_group = triggerButton.find('.unshares_group'),
				share_group = triggerButton.find('.prop_shares'),
				modal = $(this),
			selectDropdown = modal.find('.modal-body').find('#unshare_id').empty(),
				selectDropdownupdate = modal.find('.modal-body').find('#group_id').empty(),
				selectshare = modal.find('.modal-body').find('#aff_div').empty(),
				selectshare_group = modal.find('.modal-body').find('#group_div').empty(),
			propertyId = triggerButton.parents('.cmd-parent').data('id'),
			property_code = triggerButton.parents('.cmd-parent').find('.property_code').val(),
				btnShare = $('#submit_share'),
			btnUnshare = $('#submit_unshare');
		console.log(shares);




		var start= function() {
					$('#aff_div').empty();
					$('#group_div').empty();
					fillshare();
					fillshare_group();

					$('#sh_affiliate').on('click',function(){
						$('#aff_div').empty();
						$('#group_div').empty();
						//console.log()
						fillshare();
						fillshare_group();
					});
					$('#sh_unshare').on('click',function(){
						$('#sharetype_cb1').on('click',function() {
							$('#unshare_id').empty();
							fill();
						});
						$('#sharetype_cb2').on('click',function() {
							$('#unshare_id').empty();
							group_fill();
						});
						btnShare.attr("style", "display: none");
						btnUnshare.attr("style", "display: inline");
						$('#submit_unshare').on('click',onSubmit)
					});
					$('#sh_group').on('click',function(){

						$('#group_id').empty();
						$('#sharetype_cb2').on('click',function() {
							$('#group_id').empty();
							fill3();
						});
						$('#sharetype_cb1').on('click',function() {
							$('#group_id').empty();
							fill2();
						});
					});

		},
		fill = function() {
			shares.each(function(i,v) {
				var value = $.parseJSON($(v).val());
				var option = '<option value="'+value.id+'">'+value.full_name+'</option>';
				selectDropdown.append(option);
			});
		},
				group_fill = function() {
					share_group.each(function(i,v) {
						var value = $.parseJSON($(v).val());
						var option2 = '<option value="'+value.id+'">'+value.group_title+'</option>';
						selectDropdown.append(option2);
					});
				},
				fill2 = function() {
					selectDropdownupdate.prepend("<option value='' selected='selected'>Update Property To Affiliates</option>");
					shares.each(function(i,v) {
						var value = $.parseJSON($(v).val());
						var option1 = '<option value="'+value.id+'">'+value.full_name+'</option>';
						selectDropdownupdate.append(option1);

					});
				},
				fill3 = function() {
					selectDropdownupdate.prepend("<option value='' selected='selected'>Update Property To Group</option>");
					share_group.each(function(i,v) {
						var value = $.parseJSON($(v).val());
						var option2 = '<option value="'+value.id+'">'+value.group_title+'</option>';
						selectDropdownupdate.append(option2);
					});
				},
				fillshare = function() {
					unshares.each(function(i,v) {
						var value = $.parseJSON($(v).val());
						var option3 = '<input type="checkbox" class="custom-checkbox source" value="'+value.id+'">'+value.full_name+'';
						selectshare.append(option3+'<br>');
					});
				},
				fillshare_group = function() {
					unshared_group.each(function(i,v) {
						var value = $.parseJSON($(v).val());
						var option4 = '<input type="checkbox" class="custom-checkbox source" value="'+value.id+'">'+value.group_title+'';
						selectshare_group.append(option4+'<br>');
					});
				},
			onSubmit = function() {
			var selectedUser = selectDropdown.val();

			alertify.confirm(
					'RealtyMLP',
					"Are you sure you want to unshare this property ?",
					function(closeEvent) {
						$.post('/dashboard/listings/unshare', {
							_token: csrf_token,
							id: propertyId,
							answer: selectedUser,
							type: $('input[name=sharetype_cb]:checked').val(),
							property_code: property_code,
						}).done(function(data) {
							location.reload();
						});
						return false;
					},
					function(){}
			);
		};
		start();
	},

	initCommands: function() {
		var template = '.list_view',
		start = function() {
			$('[data-command=template]').on('change', cmdTemplate);
			$('[data-command=sorting]').on('change', cmdSorting);
		},
		cmdTemplate = function(e) {
			var $this = $(this);
			if ($this.is(':checked')) {
				$this.parent().find('i').toggleClass('fui-list-numbered fui-list-large-thumbnails');
				
			}
			else {
				$this.parent().find('i').toggleClass('fui-list-large-thumbnails fui-list-numbered');
			}
		},
		cmdSorting = function(e) {
			var $this = $(this),
			sorted = null;
			if ($this.is(':checked')) {
				$this.parent().find('i').toggleClass('fa-chevron-down fa-chevron-up');
			}
			else {
				$this.parent().find('i').toggleClass('fa-chevron-up fa-chevron-down');
			}
		},
		cmdFiltering = function(e) {

		};

		start();
	},

	initListingCommands: function() {
		var start = function() {
			$('[data-command=delete]').on('click', cmdDelete);
			$('[data-command=move_to]').on('click', cmd_move_to);
		},

		cmdDelete = function(e) {
			var $this = $(this),
				$parent = $this.parents('.cmd-parent'),
				id = $parent.data('id');

			alertify.confirm(
				'RealtyMLP',
				"Are you sure you want to delete this property ?", 
				function(closeEvent) {
					$.post('/dashboard/listings/delete', {
						_token: csrf_token,
						id: id,
					}).done(function(data) {
						location.reload();
					});
					return false;
				},
				function(){}
			);
		},
		cmd_move_to = function() {
			var $this = $(this),
				to = $this.data('to'),
				id = $this.data('id')

			alertify.confirm("RealtyMLP","Are you sure you want to move this to "+to+" ?",
				function(){
					$.ajax({
						url:"/dashboard/listings/action",
						type:"post",
						data:{"_token":csrf_token,"to":to,"id":id},
						success: function(data) {
							// alertify.success('Property Moved!',3);
							location.reload();
						},
						error: function(err) {
							console.log(err);
						}
					});
				},
				function(){

				}
			);
		}
		start();
	},
};