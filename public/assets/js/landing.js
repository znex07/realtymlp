'use strict';

var landing = {

	init: function() {
		landing.init_scroll();
		landing.init_typeahead();
		$('#search-property').on('input', landing.init_searching);
	},

	init_scroll: function() {
		var scroll_start = 0,
			startchange = $('#startchange'),
			offset = startchange.offset(),
			start = function() {
				if (startchange.length){
					$(document).scroll(scroll);
				}
			},
			scroll = function() {
				scroll_start = $(this).scrollTop();
				if(scroll_start > offset.top) {
					$(".navbar-inverse").css('background-color', '#363636');
				} else {
					$('.navbar-inverse').css('background-color', 'transparent');
				}
			}
		start();
	},

	init_typeahead: function() {
		propDatum.initialize();
		$('.search-prop #search-property').typeahead({
			highlight: true,
			// onselect: function(obj) { console.log(obj) }
		},{
			minLength: 6,
			displayKey: 'value',
			source: propDatum.ttAdapter(),
			templates: {
				suggestion: function(data) {
					return '<p class="data-sugg">'+
										'<span class="sugg-value">'+
											data.value+
										'</span>'+
										'<span class="pull-right sugg-type">'+
											data.column
										'</span>'+
									'</p>';
				},
				empty: [
					'<p class="no-result">',
						'no property found in that location. try other entry.',
					'</p>'	
				].join('\n')
			},
			onselect: function (obj) {
		      alert('Selected '+obj)
		    }
		});
	},

	init_searching: function() {
		var value = $(this).val(),
				start = function() {

				},
				next = function() {

				};

		start();
	},
};
