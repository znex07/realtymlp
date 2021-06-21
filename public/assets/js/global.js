
'use strict';

var realtymlp = {

	init: function() {
		realtymlp.initUserTitle();
		realtymlp.initAlert();
		realtymlp.initCommands();
		realtymlp.initTemplateView();
		realtymlp.initSorting();
	},

	formatNumbers: function() {
		var val = $(this).val(),
			finalPrice = val;
		if (val.match(/[a-z]/i)) {
			var end = val.charAt(val.length - 1).toUpperCase();
			var price = val.slice(0, -1);
			if (end == 'M') {
				price += '000000';
			}
			else if (end == 'K'){
				price += '000';
			}
			finalPrice = price;
		}
		if(isNaN(val) || val == '')
		{
			//finalPrice = '1000';
		}
		finalPrice = finalPrice * 1;
		$(this).val(finalPrice.toLocaleString());
	},

	revertNumbers: function() {
		var val = $(this).val();
		$(this).val(val.replace(/,/g,""));
	},

	initTemplateView: function() {
		var start = function() {
			$('[data-button-type=template]').on('click', tmpClick);
		},
		tmpClick = function(e) {
			console.log('wow',this);
			var $this = $(this),
				current = $(this).data('button-current');
			if (current === 'list_view') {
				$this
					.data('button-current', 'grid_view')
					.find('i')
						.removeClass('fui-list-numbered')
						.addClass('fui-list-small-thumbnails');
			}
			else {
				$this
					.data('button-current', 'list_view')
					.find('i')
						.removeClass('fui-list-small-thumbnails')
						.addClass('fui-list-numbered');
			}
		};
		start();
	},

	initSorting: function() {
		var start = function() {
			$('[data-toggle=sorting]').on('click', tmpClick);
		},
		tmpClick = function() {
			var $this = $(this),
				current = $this.data('current');
			if (current === 'sort_asc') {
				$this
					.data('button-current', 'sort_desc')
					.find('i')
						.removeClass('fa-chevron-up')
						.addClass('fa-chevron-down');
			}
			else {
				$this
					.data('button-current', 'sort_asc')
					.find('i')
						.removeClass('fa-chevron-down')
						.addClass('fa-chevron-up');
			}
		};
		start();
	},

	// initTemplateView: function() {
	// 	var start = function() {
	// 		$('[data-toggle=template]').on('click', tmpClick);
	// 	},
	// 	tmpClick = function(e) {
	// 		var $this = $(this),
	// 			current = $(this).data('current');
	// 		if (current === 'list_view') {
	// 			$this
	// 				.data('button-current', 'grid_view')
	// 				.find('i')
	// 					.removeClass('fui-list-numbered')
	// 					.addClass('fui-list-small-thumbnails');
	// 		}
	// 		else {
	// 			$this
	// 				.data('button-current', 'list_view')
	// 				.find('i')
	// 					.removeClass('fui-list-small-thumbnails')
	// 					.addClass('fui-list-numbered');
	// 		}
	// 	};
    //
	// 	start();
	// },

	specialNumeric: function() {
		var $this = $(this);
		var pattern = new RegExp(/^\d+(?:\.\d+)?[KM]?$/i);
		var last = $this.val();
		if (!pattern.test(last))
			$this.val(last.slice(0, -1));
	},

	initUserTitle: function() {
		var start = function() {
				$('.profile-usertitle-name')
					.on('mouseover', mouseover)
					.on('mouseout', mouseout);
			},
			mouseover = function() {
				$('#user-edit').removeClass('hidden');
			},
			mouseout = function() {
				$('#user-edit').addClass('hidden');
			};
		start();
	},

	initAlert: function() {
		var start = function() {
				$('.alert-dismissable').fadeTo(4000, 500, fade);
			},
			fade = function() {
				$(this).alert('close');
			};

		start();
	},

	initCommands: function() {

		var start = function() {
				// $('.cmd_move_to').on('click', cmd_move_to);
				// $('.list_public').on('click', cmd_listview);
				// $('.grid_public').on('click', cmd_gridview);
			// },
			// cmd_move_to = function() {
			// 	var $this = $(this),
			// 		to = $this.data('to'),
			// 		id = $this.data('id'),
			// 		$parent = $this.parents('div.panel').last().parent();
            //
			// 	alertify.confirm("RealtyMLP","Are you sure you want to move this to "+to+" ?",
			// 		function(){
			// 			$.ajax({
			// 				url:"/dashboard/listings/action",
			// 				type:"post",
			// 				data:{"_token":_token,"to":to,"id":id},
			// 				success: function(data) {
			// 					if(data.response){
			// 						alertify.success('Property Moved!',3);
			// 						$parent.fadeOut(700);
			// 						location.reload();
			// 					}
			// 				},
			// 				error: function(err) {
            //
			// 				}
			// 			});
			// 		},
			// 		function(){
            //
			// 		}
			// 	);
			},
			cmd_delete = function() {
				
			},
			cmd_gridview = function() {
				// $('.list_view').show();
    			// $('.grid_view').hide();
			},
			cmd_listview = function() {
				// $('.list_view').hide();
			    // $('.grid_view').show();
			};
		start();
	},

};

$(function() {
	realtymlp.init();	
	
})
