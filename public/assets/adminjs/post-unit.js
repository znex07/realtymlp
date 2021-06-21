'use strict';

var unit = {

  init: function() {
    Dropzone.autoDiscover = false;
    $('#project_code').select2({
      placeholder: 'Select Project'
    });
    $('#property_type').select2({
      placeholder: 'Select Property Type'
    })
    $('#developer_code').select2({
      placeholder: 'Select Developer'
    }).on('select2:select', unit.getProject)
      .on('select2:unselect', unit.getProject)
      .on('change', function() {
        $('#project_code').attr('disabled',true).empty().append('<option></option>');
      });

    $('#project_code').select2({
      placeholder:'Select Project',
    }).on('select2:select', unit.getPropertyType)
      .on('select2:unselect', unit.getPropertyType)
      .on('change', function() {
        $('#property_type').attr('disabled', true).empty().append('<option></option>');
      });

    $('#myDate').datepicker();
    $('.numeric').numeric(",");

    $('#submit').bind('click', unit.submit);
    unit.initDropzone();
    window.onbeforeunload = function() {
			return "If you leave this page, you will lose any unsaved changes.";
		}
  },

  initDropzone: function() {
    var indexes = [5,7];
    $.each(indexes, function(i,v) {
      var opts = {
        index: v,
        type: 'unit',
        paramName: 'dropzones',
        elem: '#dropzone-'+v,
        previewsContainer: '.dropzone-previews-'+v
      };
      post.make_dropzone(opts);
    });
  },

  getProject: function() {
    var value = $(this).val(),
        data = null,
        ajax = null,
        start = function() {
          ajax = $.post('/admin/post/unit/postProject', {
            _token : $('#_token').val(),
            developer_code : value
          });
          next();
        },
        next = function() {
          ajax.done(function(_data) {
            data = $.map(_data, function(item) {
              return {
                id: item.project_code,
                text: item.project_name
              };
            });
            populate();
          });
        },
        populate = function() {
          $('#project_code').select2({
            placeholder: 'Select Project',
            data: data
          }).trigger('change').attr('disabled',false);
        };
    start();
  },

  getPropertyType: function() {
    var value = $(this).val(),
        data = null,
        ajax = null,
        start = function() {
          ajax = $.post('/admin/post/unit/postPropertyType', {
            _token: $('#_token').val(),
            project_code: value
          });
          next();
        },
        next = function() {
          ajax.done(function(d) {
            var _ajx = post.getPropertyType(d);
            _ajx.done(function(_data) {
              data = $.map(_data, function(item) {
        				return {
        					id: item.id,
        					parent_id: item.parent_id,
        					text: item.department_name
        				}
        			});
              console.log(data);
              populate();
            });
          });
        },
        populate = function() {
          $('#property_type').select2({
            placeholder: 'Select Property Type',
            data: data
          }).trigger('change').attr('disabled',false);
        };

    start();
  },

  submit: function() {
    var btn = $(this);
    btn.attr('disabled',true);
    var fd = new FormData(),
        start = function() {
          btn.find('i.fa').removeClass('fa-check').addClass('fa-ban');
          fd.append('unit_name', $('#unit_name').val());
          fd.append('unit_codename', $('#unit_codename').val());
          fd.append('property_type', $('#property_type').val());
          fd.append('quantity', $('#quantity_available').val() +'/'+$('#quantity_total').val());
          fd.append('min_price', $('#min_price').val());
          fd.append('max_price', $('#max_price').val());
          fd.append('project_updated', $('#myDate').val());
          fd.append('unit_area',$('#unit_area').val());
          fd.append('rooms',$('#rooms').val());
          fd.append('bathrooms',$('#bathrooms').val());
          fd.append('parkings',$('#parkings').val());
          fd.append('project_code', $('#project_code').val());
          fd.append('developer_code', $('#developer_code').val());
          fd.append('unit_code', $('#_unit_code').val());
          fd.append('_token', $('#_token').val());
          submitImage();
        },
        submitImage =  function() {
          $.each(post.dropzones.units, function(i,v) {
            if (v.getQueuedFiles().length > 0) {
              $('.dropzone-status').addClass('label-warning').text('uploading...');
              v.processQueue();
            }
          });
          next();
        },
        next = function() {
          $.ajax({
  					url: '/admin/post/unit/postUnit',
  					type: 'POST',
  					contentType: false,
  					processData: false,
  					data : fd,
  					success: function(data) {
  						btn.find('i.fa').removeClass('fa-ban').addClass('fa-check');
  						btn.find('span').text('Done!');
  						// btn.attr('disabled', false);
  						window.onbeforeunload = null;
  						// location.reload();
  					}
  				});
        };
    start();
  }
};
