'use strict';
var selectors = {
	classes: {
		layout: '.list_view',
		from: "",
	},
	dataAttributes: {},
};
var dashboard = {
	// _outputStringObj: {
	// 	classes: [{layout:'.list_view'}],
	// 	dataAttributes: [],
	// 	minMax: [],
	// },
	activeFilter: "",

	concatOutputString: function(outputString, type) {
		var tmp = "";

		$.each(outputString, function(i,v) {
			if (i != "minMax") {
				$.each(v, function(i,v) {
					tmp+=v;
				});
			}
		});
		
		console.log("concatening.. :"+ tmp);
		return tmp;
	},

	mergeOutputString: function(outputString) {
		var tmp = '';
		$.each(outputString, function(i,v) {

		});
		return tmp;
	},

	flattenOutputString: function(outputString) {
		var tmp = [];
		$.each(outputString, function(i,v) {
			tmp.push(v);
		});
		return tmp;
	},

	clearFilter: function() {
		var $btn = $(this),
			filterers = $btn.parents('.panel-body').find('.advanced-filter');
	},

	createAdvancedFilter: function(elem) {
		var self = this;

		var $elem = $(elem),
			$advancedFilters = $elem.find('.advanced-filter'),
			$container = $elem.find('.listings-container'),
			outputStringObj = selectors;
		$advancedFilters.each(function(i,v) {
			if (!$(v).hasClass('dont'))
				$(v).on('change', view);
			else
				$(v).on('change', max);
		});

		function view(e) {
			var filterValue = $(this).val(),
				filterName = $(this).data('filter-name');
			outputStringObj.dataAttributes[filterName] = filterValue ? "[data-filter-"+filterName.replace("_","-")+"="+filterValue+"]" : "";
			var outputString = self.concatOutputString(outputStringObj, 'dataAttributes');
			filter(outputString);
			selectors = outputStringObj;
		}
		function max() {
			var $e = $(this),
				filterValue = $e.val(),
				filterName = $e.data('filter-name');
			if ($e.hasClass('greater')) {
				if (filterValue == '3+') {
					outputStringObj.dataAttributes[filterName] = "";
					var outputString = self.concatOutputString(outputStringObj, "dataAttributes");
					var show = $container.find('.mix'+ outputString +'').filter(function() {
						var value = $(this).data('filter-'+filterName) * 1;
						return value >= 3;
					});
					$container.mixItUp('filter', show);
					selectors = outputStringObj;
				}
				else if (filter != '3+') {
					outputStringObj.dataAttributes[filterName] = filterValue ? "[data-filter-"+filterName.replace("_","-")+"="+filterValue+"]" : "";
					var outputString = self.concatOutputString(outputStringObj, "dataAttributes");
					filter(outputString);
					selectors = outputStringObj;
				}
			}
			else {
				if (filterValue) {
					outputStringObj.dataAttributes[filterName] = "";
					// console.log(filterName);
					var outputString = self.concatOutputString(outputStringObj, "dataAttributes");
					var show = $container.find('.mix'+ outputString +'').filter(function() {
						var value = '';
						if (filterName != 'price') 
							value = parseInt( $(this).data('filter-'+filterName.replace('_','-')) );
						else 
							value = parseInt( $(this).data('filter-'+filterName).replace(",","") );
						return value <= filterValue;
					});
					$container.mixItUp('filter', show);
					selectors = outputStringObj;
				}
				else {
					outputStringObj.dataAttributes[filterName] = filterValue ? "[data-filter-"+filterName.replace("_","-")+"="+filterValue+"]" : "";
					var outputString = self.concatOutputString(outputStringObj, "dataAttributes");
					filter(outputString);
					selectors = outputStringObj;
				}
			}
		}

		function filter(outputString) {
			self.startFilter({
				'_container' : $container,
				'_outputString': outputString,
			});
		}
	},

	createBasicFilter: function(elem) {
		var self = this;

		var $elem = $(elem),
			$basicFilters = $elem.find('.basic-filters'),
			$container = $elem.find('.listings-container'),
			outputStringObj = selectors;

		$basicFilters.each(function(i,v) {
			var filterName = $(v).data('filter-name'),
				type = v.type;
			if (filterName == 'layout') 
				$(v).on('click', filterView);
			else if (filterName == 'from') 
				$(v).on('change', filterFrom);
		});

		function filterView(e) {
			e.preventDefault();
			var filterValue = $(this).data('filter-value'),
				filterName = $(this).data('filter-name');
			outputStringObj.classes[filterName] = filterValue;
			var outputString = self.concatOutputString(outputStringObj, 'classes');
			filter2(outputString);
			selectors = outputStringObj;
			
		}
		function filterFrom(e) {
			var filterValue = $(this).find('option:selected').data('filter-value'),
				filterName = $(this).data('filter-name');
			outputStringObj.classes[filterName] = filterValue;
			var outputString = self.concatOutputString(outputStringObj, 'classes');
			filter(outputString);
			selectors = outputStringObj;
		}
		function filter(outputString) {
			self.startFilter({
				'_container' : $container,
				'_outputString': outputString,
			});
		}
		function filter2(outputString) {
			self.startFilter({
				'_container' : $container,
				'_outputString': outputString,
			});	
		}
	},

	startFilter: function(data) {
		var self = this;
		if (data._container.mixItUp('isLoaded')) {
			// var show = $container.find('.mix').filter(function() {
			// 	var value = $(this).data('filter-'+dataName) * 1;
			// 	return (value >= minMax[0]) && (value <= minMax[1]);
			// });
			// $container.mixItUp('filter', show);
			data._container.on('mixEnd', function(e, state) {
				// console.log('qwe');
				$('.list_view:visible').css({
					'display': 'block'
				});
				self.activeFilter = state.activeFilter;
			});
			data._container.mixItUp('filter', data._outputString);
		}
	},

	initPropertyClassification: function() {
		var self = this;

		var start = function() {
				$('[data-filter-name="property_classifications"]').on('change', load);
			},
			load = function() {
				$('[data-filter-name="property_types"]').attr('disabled', true);
				var val = $(this).val();
				if (val) {
					$.get('/apicall/filteredPropertyTypes', {
						classification : val,
						inner: true,
					}).done(ajxDone);
				}
			},
			ajxDone = function(data) {
				$('[data-filter-name="property_types"]').empty().append('<option value="">Property Type</option>');
				$.each(data, function(i,v) {
					var opt = $('<option />');
					opt.text(v.department_name);
					opt.val(v.id);
					$('[data-filter-name="property_types"]').append(opt);
				});
				$('[data-filter-name="property_types"]').attr('disabled', false)
			};
		start();
	},

	initProvince: function() {
		var start = function() {
				$('[data-filter-name="province"]').on('change', load);
			},
			load = function() {
				$('[data-filter-name="city"]').attr('disabled', true);
				var val = $(this).val();
				if (val) {
					$.get('/apicall/filteredCities', {
						province : val,
						inner: true,
					}).done(ajxDone);
				}
			},
			ajxDone = function(data) {
				$('[data-filter-name="city"]').empty().append('<option value="">City</option>');
				$.each(data, function(i,v) {
					var opt = $('<option />');
					opt.text(v.name);
					opt.val(v.id);
					$('[data-filter-name="city"]').append(opt);
				});
				$('[data-filter-name="city"]').attr('disabled', false)
			};
		start();
	},
	
	init: function() {
		var self = this; 

		$('.btn-clear-filter').on('click', self.clearFilter);
		$('.nav-dashboard').addClass('accented-btn');

		$('.panel-advanced-search.collapse').on('show.bs.collapse', function () {
		  	$(this).parent().find('.btn-clear-filter').fadeIn('fast');
		}).on('hide.bs.collapse', function() {
			$(this).parent().find('.btn-clear-filter').hide();
		});

		$('#see-more').on('shown.bs.collapse', function() {
			var parent = $('.see-more-link').hide();
			$(this).find('.see-more-container').html(parent.fadeIn('fast'));
		}).on('hidden.bs.collapse', function() {
			var parent = $('.see-more-link').hide();
			$('.see-more-orig').html(parent.fadeIn('fast'));
		});
		var outputString = self.concatOutputString(selectors, 'classes');
		$('.listings-container').mixItUp({
			controls: {
				enable: false,
			},
			animation: {
				enable: false		
			},
		    load: {
			   	filter: outputString,
			},
			callbacks: {
				onMixEnd: function() {
					$('.list_view.mix:visible').css('display','block');
				}
			}
		});
		$('.withfilter').each(function(i,v) {
			self.createBasicFilter(v);
			self.createAdvancedFilter(v);
		});

		self.initPropertyClassification();
		self.initProvince();

		$('.profile-usertitle-name').on('mouseover', function(e) {
		  $('#user-edit').removeClass('hidden');
		}).on('mouseout', function(e) {
		  $('#user-edit').addClass('hidden');
		});
	},

}