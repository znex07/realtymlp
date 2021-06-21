'use strict';
$.fn.tago = function () {
    this.css('visibility', 'hidden');
}
$.fn.kita = function () {
    this.css('visibility', 'visible');
}
var wiz = {
    navListItems: $('div.setup-panel div a'),
    allWells: $('.setup-content'),
    allNextBtn: $('.nextBtn'),
    allPrevBtn: $('.prevBtn'),
    curSteps: 0,
    dzImg: null,
    dzDocs: null,
    selectedPriceStat: 'default',
    propertytype: $('#hidden_property_type').val(),
    init: function () {
        wiz.allWells.hide();
        $('#listing_type').on('change', wiz.initPrice);
        $('#listing_type').on('change', wiz.initAvailability);
        $('#property_classification').on('change', wiz.loadPropertyType);
        $('#availability_type').on('change',function () {
            $('#c_condition_type').show();
        });
        $('#condition_type').on('change',function () {
            $('#c_property_classification').show();
        });
        $('#property_classification').on('change',function () {
            $('#c_property_type').show();
        });
        var property_classification = $('#property_classification');
        $(property_classification).ready(wiz.loadPropertyType);
        $('.stat').on('change', wiz.initStat);
        $('.stat').on('change', wiz.initStat);
        wiz.gotoStep(1, true);
        $('.prices').on('input', realtymlp.specialNumeric)
            .on('blur', realtymlp.formatNumbers)
            .on('focus', realtymlp.revertNumbers);
    },

    initStat: function () {
        var e = $(this),
            val = e.find('option:selected').val();
    },
    inputNumOnly: function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 75, 77]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    },
    preventDefault: function (e) {
        e.preventDefault();
    },
    initPrice: function () {
        var e = $(this);
        var val = e.find('option:selected').text();
        $('#c_availability_type').show();
        $('#f_selling_price').hide();
        $('#f_rental_price').hide();
        wiz.selectedPriceStat = 'default';
        if (val == 'For Sale') {
            $('#f_selling_price').show();
            wiz.selectedPriceStat = 'selling_stat';
        }
        else if (val == 'For Rent') {
            $('#f_rental_price').show();
            wiz.selectedPriceStat = 'rental_stat';
        }
    },

    initAvailability: function () {
        var e = $(this),
            name = e.find('option:selected').val();
        var elem = $('#availability_type option.meron[data-hidden-id=av' + name + ']');
        if (elem.data('hidden-id')) {
            $('#availability_type option.meron:not([data-hidden-id=av' + name + '])').addClass('hidden');
            elem.removeClass('hidden');
        }
        else {
            $('#availability_type option.meron').removeClass('hidden').addClass('hidden');
        }
    },

    gotoWizard: function (current, hasRequired) {
        hasRequired = (typeof hasRequired === 'undefined') ? true : hasRequired;
        if (current <= wiz.curSteps) {
            wiz.gotoStep(current, true);
        }
        else {
            wiz.gotoStep(current, false, true);
        }
    },

    gotoStep: function (step, bypass, isWizard) {
        isWizard = (typeof isWizard === 'undefined') ? false : isWizard;
        bypass = (typeof bypass === 'undefined') ? false : bypass;
        $('body').scrollTop(0);
        var nextStepWizard = $('div.setup-panel div a[href="#step-' + step + '"]'),
            isValue = true,
            target = $('div#step-' + step),
            tooltipOptions = {
                title: 'this is a required field',
                placement: 'top',
                trigger: 'hover focus'
            };

        if (!bypass) {
            if (!isWizard) {
                if (step === 2) {
                    var elems = [
                        // $('.listing_type'),
                        $('#property_title'),
                        $('#listing_type'),
                        $('#condition_type'),
                        // $('.availability_type'),
                        $('#availability_type'),
                        $('#property_classification'),
                        $('#property_type'),
                        // $('#ownership_type'),
                        // $('#property_title'),

                    ];

                    $('#property_type:visible').length ? elems.push($('#property_type')) : '';
                    bypass = wiz.checkpoint(elems);
                }
                else if (step === 3) {
                    var elems = [
                        $('#province'),
                    ];
                    $('#city:visible').length > 0 ? elems.push($('#city')) : '';
                    bypass = wiz.checkpoint(elems);
                }
                else if (step === 4) {
                    var elems = [];
                    //$('#selling_price:visible').length > 0 ? elems.push($('#selling_price')) : '';
                    //$('#rental_price:visible').length > 0 ? elems.push($('#rental_price')) : '';
                    //$('#floor_area:visible').length > 0 ? elems.push($('#floor_area')) : '';
                    //$('#lot_area:visible').length > 0 ? elems.push($('#lot_area')) : '';
                    bypass = true;
                }
            }
            else {
                if (wiz.curSteps === 1) {
                    if (step > wiz.curSteps) {
                        var elems = [
                            // $('.listing_type'),
                            $('#property_title'),
                            $('#listing_type'),
                            $('#condition_type'),
                            // $('.availability_type'),
                            $('#availability_type'),
                            // $('#ownership_type'),
                            // $('#property_title'),
                            $('#property_classification'),
                        ];
                        $('#property_type:visible').length ? elems.push($('#property_type')) : '';
                        bypass = wiz.checkpoint(elems);
                    }
                }
                else if (wiz.curSteps === 2) {
                    if (step > wiz.curSteps) {
                        var elems = [
                            $('#province'),
                        ];
                        $('#city:visible').length > 0 ? elems.push($('#city')) : '';
                        bypass = wiz.checkpoint(elems);
                    }
                }
                else if (wiz.curSteps === 3) {
                    if (step > wiz.curSteps) {
                        var elems = [];
                        //$('#selling_price:visible').length > 0 ? elems.push($('#selling_price')) : '';
                        //$('#rental_price:visible').length > 0 ? elems.push($('#rental_price')) : '';
                        //$('#floor_area:visible').length > 0 ? elems.push($('#floor_area')) : '';
                        //$('#lot_area:visible').length > 0 ? elems.push($('#lot_area')) : '';
                        bypass = true;
                    }
                }
                else if (wiz.curSteps === 4) {
                    bypass = true;
                }
            }

        }

        if (bypass) {
            wiz.allWells.hide();
            target.fadeIn(250);
            wiz.navListItems.removeClass('btn-primary').removeClass('active').addClass('btn-default');
            if (!nextStepWizard.hasClass('stepped'))
                nextStepWizard.addClass('stepped');
            nextStepWizard.addClass('active').addClass('btn-primary')

            var editing = $('[name=property_id]');
            if (!editing.length)
                wiz.hide_left_step();

            wiz.curSteps = step;
        }
    },

    step_5: function () {
        var start = function () {
                var x = '<div class="thumbnail-selector" style="display:none;"><div class="bg"></div><span id="left"><i class="fa fa-chevron-left"></i> </span><span id="right" class="pull-right"><i class="fa fa-chevron-right"></i> </span></div>';
                $('.listing-thumbnail').append(x);
                $('.listing-thumbnail-anchor').click(function (e) {
                    e.preventDefault();
                });
                setThumbnail();
                setPriceStat();
                setAddress();
                setDepartment();
                checkpoint();
                wiz.sharing_viewability();
            },
            setThumbnail = function () {
                var img = $('#dropzone-image .dropzone-previews-img div .dz-image img'),
                    img_url = 'url(/img/img_placeholder.png)';
                $('#choose-notif').tago();
                $('.thumbnail-selector').hide();
                if (img.length) {
                    $('#choose-notif').kita();
                    $('.thumbnail-selector').show();
                    img_url = 'url(' + img.attr('src') + ')';
                    wiz.init_thumbnail_selector();
                }
                $('.listing-thumbnail').css({
                    'background-image': img_url,
                });
            },
            setPriceStat = function () {
                var price = $('#selling_price').val() || $('#rental_price').val() ? parseFloat($('#rental_price').val()) || parseFloat($('#selling_price').val()) : 0;
                var stat = '';
                // $('input[name='+wiz.selectedPriceStat+']').each(function(i,v) {
                // 	if ($(v).is(':checked')) {
                // 		stat = $('label[for='+$(v).attr('id')+']').text();
                // 	}
                // });
                price = price.toFixed(2).replace(/./g, function (c, i, a) {
                    if (price)
                        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                    return '';
                });
                $('.listing-price-stat').text('PHP ' + price);
            },
            setAddress = function () {
                var address = {
                        province: $('#province option:selected').text(),
                        city: $('#city option:selected').text(),
                        brgy: $('#brgy').val(),
                        street_address: $('#street_address').val(),
                        village: $('#village').val(),
                    },
                    full = address.province + ', ' + address.city + ' ' + address.brgy + ' ' + address.street_address + ' ' + address.village;
                $('.listing-address').text(full);
            },
            setDepartment = function () {
                var depts = {
                    classification: $('#property_classification option:selected').text(),
                    type: $('#property_type option:selected').text(),
                };
                $('.listing-departments').text(depts.classification + ', ' + depts.type);
            },
            checkpoint = function () {
                var checkpoint,
                    elems = [
                        $('#listing_type'),
                        $('#condition_type'),
                        $('#availability_type'),
                        // $('#ownership_type'),
                        // $('#property_title'),
                        $('#property_classification'),
                        $('#property_type'),
                        $('#province'),
                        $('#city'),
                    ];
                $('#btnSubmit').attr('disabled', false);
                if (!wiz.checkpoint(elems)) {
                    alertify.error('make sure you fill all required fields.');
                    $('#btnSubmit').attr('disabled', true);
                }
            };

        start();
    },

    init_thumbnail_selector: function () {
        var images = $('#dropzone-image .dropzone-previews-img div .dz-image img'),
            counter = 0,
            src = '',
            start = function () {
                src = images[counter];
                dz.thumbnail_title = $(src).attr('alt');
                dz.thumbnail_index = counter;
                $('.thumbnail-selector span').on('click', clicked);
            },
            clicked = function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                if (id == 'right')
                    counter++;
                else if (id == 'left')
                    counter--;

                if (counter >= images.length)
                    counter = 0;
                else if (counter < 0)
                    counter = images.length - 1;

                src = images[counter];
                images.attr('data-thumbnail', false);
                dz.thumbnail_title = $(src).attr('alt');

                $(src).attr('data-thumbnail', true);
                $('.listing-thumbnail').css({
                    'background-image': 'url(' + $(src).attr('src') + ')'
                });
                dz.thumbnail_index = counter;

            }
        start();
    },

    step_3: function () {
        // var property_type = $('#property_type').select2('data');
        var property_type = $('#property_type option:selected').text();
        var property_class = $('#property_classification option:selected').text();
        var listing_type = $('#listing_type option:selected').text();
        $('#f_lot_area').show();
        $('#f_floor_area').show();
        $('#f_bedroom').show();
        $('#f_bathroom').show();
        $('#f_maid_room').show();
        $('#f_balcony').show();
        $('#f_parking').show();
        //$('.sqm_floor_area').attr({hidden: false});
        //$('.sqm_lot_area').attr({hidden: false});



        if (property_type === 'Apartment Unit' || property_type=='Condo Unit'|| property_type === 'Dorm / Pension House Unit' || property_type === 'Columbary Niche Unit' || property_type === 'Leisure & Entertainment Unit' || property_type === 'Office Unit'  || property_type === 'Retail Unit / Service Unit') {
            $('#f_lot_area').hide();
            //$('.sqm_lot_area').attr({hidden: true});
        }
        else if (property_type === 'Vacant Lot / Raw Land') {
            $('#f_floor_area').hide();
            //$('.sqm_floor_area').attr({hidden: true});
            $('#f_bedroom').hide();
            $('#f_bathroom').hide();
            $('#f_maid_room').hide();
            $('#f_balcony').hide();
        }
        else if(property_type === 'Beach Lot' || property_type === 'Island Property' || property_type === 'Grazing / Cattle Land')
        {
            $('#f_floor_area').hide();
            //$('.sqm_floor_area').attr({hidden: true});
            $('#f_bedroom').hide();
            $('#f_bathroom').hide();
            $('#f_maid_room').hide();
            $('#f_balcony').hide();
            $('#f_parking').hide();
        }
        else if (property_class === 'Residential' && property_type === 'Parking Unit')
        {
            $('#f_lot_area').hide();
            //$('.sqm_lot_area').attr({hidden: true});
            $('#f_bedroom').hide();
            $('#f_bathroom').hide();
            $('#f_maid_room').hide();
            $('#f_balcony').hide();
            $('#f_parking').hide();
        }
        else if (property_class === 'Commercial' && property_type === 'Retail Complex / Mall')
        {
            $('#f_lot_area').hide();
            //$('.sqm_lot_area').attr({hidden: true});
            $('#f_bedroom').hide();
            $('#f_maid_room').hide();

        }
        else if (property_class === 'Commercial' && property_type === 'Parking Unit ')
        {
            $('#f_lot_area').hide();
            //$('.sqm_lot_area').attr({hidden: true});
            $('#f_maid_room').hide();

        }
       else if (property_class === 'Commercial' || property_class === 'Industrial' || property_class === 'Agricultural' || property_class === 'Institutional' )
        {
            $('#f_maid_room').hide();
        }

    },

    hide_left_step: function () {
        $('div.setup-panel div.stepwizard-step a:not(.stepped)').parent().tago();
        $('div.setup-panel div.stepwizard-step a.stepped').parent().kita();
    },

    getStep: function (elem) {
        var e = $(elem),
            step = e.attr('href');
        return parseInt(step.substring(step.length - 1, step.length));
    },
    sharing_viewability: function () {

        $('#brgy').val() != '' ? $('[for=scb_brgy]').addClass('meron').parent().show() : $('[for=scb_brgy]').parent().hide();
        $('#street_address').val() != '' ? $('[for=scb_street_address]').addClass('meron').parent().show() : $('[for=scb_street_address]').parent().hide();
        $('#village').val() != '' ? $('[for=scb_village]').addClass('meron').parent().show() : $('[for=scb_village]').parent().hide();
        $('#map_options').val() != '' ? $('[for=scb_maps]').addClass('meron').parent().show() : $('[for=scb_maps]').parent().hide();
        // details
        $('#lot_area').val() != '' ? $('[for=scb_lot_area]').addClass('meron').parent().show() : $('[for=scb_lot_area]').parent().hide();
        $('#floor_area').val() != '' ? $('[for=scb_floor_area]').addClass('meron').parent().show() : $('[for=scb_floor_area]').parent().hide();
        $('#bedroom').val() != '' ? $('[for=scb_rooms]').addClass('meron').parent().show() : $('[for=scb_rooms]').parent().hide();
        $('#bathroom').val() != '' ? $('[for=scb_bathrooms]').addClass('meron').parent().show() : $('[for=scb_bathrooms]').parent().hide();
        $('#maid_room').val() != '' ? $('[for=scb_maid_room]').addClass('meron').parent().show() : $('[for=scb_maid_room]').parent().hide();
        $('#parking').val() != '' ? $('[for=scb_parking]').addClass('meron').parent().show() : $('[for=scb_parking]').parent().hide();
        $('#balcony').val() != '' ? $('[for=scb_balcony]').addClass('meron').parent().show() : $('[for=scb_balcony]').parent().hide();
        $('#description').val() != '' ? $('[for=scb_description]').addClass('meron').parent().show() : $('[for=scb_description]').parent().hide();

        // attachments
        $('[data-tab=location]').hide();
        $('[data-tab=details]').hide();
        if ($('#brgy').val() || $('#street_address').val() || $('#village').val() || $('#map_options').val()) {
            $('[data-tab=location]').show();
        }
        if ($('#lot_area').val() || $('#floor_area').val() || $('#bedroom').val() || $('#bathroom').val() ||$('#maid_room').val()  ||$('#parking').val() || $('#balcony').val()) {
            $('[data-tab=details]').show();
        }
        var _sharables = null;

        $('.images-wrapper').hide();
        $('.documents-wrapper').hide();
        $('.tab-attachments').hide();

        if (dz.dzImg.getQueuedFiles().length || dz.dzImg.getFilesWithStatus() || dz.dzDoc.getQueuedFiles().length || dz.dzDoc.getFilesWithStatus().length)
            $('.tab-attachments').show();


        if (typeof edit === 'undefined') {
            if (dz.dzImg.getQueuedFiles().length) {
                $('.images-wrapper').show();
                $('.cb-imgs-container').empty();
                $.each(dz.dzImg.getQueuedFiles(), function (i, v) {
                    var src = $(v.previewElement).find('.dz-image img').attr('src'),
                        template = $('.template-imgs').find('div.col-md-4').clone();
                    template.find('img.template_img').attr({
                        'src': src
                    }).bind('click', sharing.initToggleImageCheckbox);
                    template.find('label.template_label').attr({
                        'for': 'img' + i,
                        'data-title': v.name
                    });
                    template.find('input.template_input').attr({
                        'id': 'img' + i,
                        'data-id': 0,
                    }).bind('change', sharing.toggleBorder);
                    template.addClass('meron').show();
                    $('.cb-imgs-container').append(template);
                });

            }
            if (dz.dzDoc.getQueuedFiles().length) {
                $('.documents-wrapper').show();
                $('.cb-docs-container').empty();
                $.each(dz.dzDoc.getQueuedFiles(), function (i, v) {
                    var template = $('.template-docs').find('div.col-md-12').clone();
                    template.find('label .doc-name').text(v.name);
                    template.find('label').attr({
                        'for': 'doc' + i,
                        'data-title': v.name
                    });
                    template.find('input').attr({
                        'id': 'doc' + i,
                        'data-id': 0,
                    });
                    template.addClass('meron').show();
                    $('.cb-docs-container').append(template);
                });
            }
        }
        else {
            _sharables = $.parseJSON($('#_sharables').val());
            if (dz.dzImg.getFilesWithStatus().length) {
                $('.images-wrapper').show();
                $('.cb-imgs-container').empty();
                var images = _sharables.attachments.images;
                $.each(dz.dzImg.getFilesWithStatus(), function (i, v) {
                    var src = $(v.previewElement).find('.dz-image img').attr('src'),
                        template = $('.template-imgs').find('div.col-md-4').clone(),
                        image = images[i];

                    template.find('img.template_img').attr({
                        'src': src
                    }).bind('click', sharing.initToggleImageCheckbox);
                    template.find('label.template_label').attr({
                        'for': 'img' + v.id,
                        'data-title': v.name
                    });
                    template.find('input.template_input').attr({
                        'id': 'img' + v.id,
                        'data-id': v.id,
                    }).bind('change', sharing.toggleBorder);

                    template.addClass('meron').show();
                    $('.cb-imgs-container').append(template);
                });
            }

            if (dz.dzDoc.getFilesWithStatus().length) {
                $('.documents-wrapper').show();
                $('.cb-docs-container').empty();
                $.each(dz.dzDoc.getFilesWithStatus(), function (i, v) {
                    var template = $('.template-docs').find('div.col-md-12').clone();
                    template.find('label .doc-name').text(v.name);
                    template.find('label').attr({
                        'for': 'doc' + v.id,
                        'data-title': v.name
                    });
                    template.find('input').attr({
                        'id': 'doc' + v.id,
                        'data-id': v.id,
                    });
                    template.addClass('meron').show();
                    $('.cb-docs-container').append(template);
                });
            }

            $.each(_sharables.details, function (i, v) {
                $('#scb_' + i).attr('checked', v);
            });
            $.each(_sharables.locations, function (i, v) {
                $('#scb_' + i).attr('checked', v);
            });
            $.each(_sharables.attachments.images, function (i, v) {
                $('.template_input#img' + v.id).attr('checked', true);
                if (!v.checked)
                    $('.template_input#img' + v.id).trigger('click');
            });
            $.each(_sharables.attachments.documents, function (i, v) {
                $('.scb_documents#doc' + v.id).attr('checked', true);
                if (!v.checked) {
                    $('.scb_documents#doc' + v.id).trigger('click');
                }
            });
        }
    },

    sharing_set_options: function () {
        var sharables = {
            attachments: {
                documents: [],
                images: []
            },
            details: {},
            locations: {}
        };
        $('.label_details.meron').each(function (i, v) {
            var input = $(this).find('input'),
                name = input.attr('id');
            name = name.substring(4, name.length);
            sharables.details[name] = input.is(':checked');
        });

        $('.label_locations.meron').each(function (i, v) {
            var input = $(this).find('input'),
                name = input.attr('id');
            name = name.substring(4, name.length);
            sharables.locations[name] = input.is(':checked');
        });

        $('.cb-imgs-container .col-md-4.meron').each(function (i, v) {
            var opt = {
                checked: $(v).find('input').is(':checked'),
                file_path: $(v).find('label').data('title'),
                id: $(v).find('input').data('id') || 0,
            }
            sharables.attachments.images.push(opt);
        });

        $('.cb-docs-container .col-md-12.meron').each(function (i, v) {
            var opt = {
                checked: $(v).find('input').is(':checked'),
                file_path: $(v).find('label').data('title'),
                id: $(v).find('input').data('id') || 0,
            }
            sharables.attachments.documents.push(opt);
        });
        $('#sharables').val(JSON.stringify(sharables));
    },

    handleCheckpoint: function (e) {
        var $this = $(e);
        if ($this.val() != 'default' || !$this.val()) {
            $this.closest('div.form-group').removeClass('has-error').tooltip('destroy');
        }
    },

    checkpoint: function (elems) {
        var tmp = [];
        if (elems.length) {

            $.each(elems, function (i, v) {
                var type = v[0].type;
                if (type === 'checkbox') {
                    if (!v.is(':checked')) {
                        v.closest('div.form-group').find('.xtip').addClass('has-error').tooltip('show');
                        tmp.push(v);
                    }
                    else {
                        v.closest('div.form-group').find('.xtip').removeClass('has-error').tooltip('destroy');
                    }
                }

                else if (type === 'select-one' || type === 'select-multiple') {
                    if (v.val() === 'default' || v.val() === null) {
                        v.closest('div.form-group').addClass('has-error').tooltip('show');
                        tmp.push(v);
                    }
                    else {
                        v.closest('div.form-group').removeClass('has-error').tooltip('destroy');
                    }
                }

                else if (type === 'textarea' || type === 'text' || type === 'number') {
                    if (!v.val() || v.val() <= 0) {
                        v.closest('div.form-group').addClass('has-error').tooltip('show');
                        tmp.push(v);
                    }
                    else {
                        v.closest('div.form-group').removeClass('has-error').tooltip('destroy');
                    }
                }

            });

        }
        if (tmp.length)
            tmp[0].focus();

        if (!tmp.length)
            return true;
    },

    loadPropertyType: function (e) {
        var values =  $('#property_classification').val(),
            loader = $('#l_property_type'),
            c_property_type = $('#c_property_type'),
            property_type = $('#property_type');
        var start = function () {
                loader.fadeIn();
                var _ajx = $.post('/admin/post/postClassification', {
                    _token: csrf_token,
                    'classifications': values
                });
                _ajx.done(ajx);
            },
            ajx = function (_data) {
                var d = $.map(_data, function (item) {
                    return {
                        id: item.id,
                        parent_id: item.parent_id,
                        text: item.department_name,
                    };
                });

                load(d);
            },
            load = function (_data) {
                if(values == 'default')
                {
                    var def = "<option value='default' default hidden >What's the type of the property?</option>";
                    def += '<option default disabled>Please choose property Classification to load property type</option>';
                    property_type.html(def).fadeIn(500);
                    loader.fadeOut();
                }else
                    {
                    property_type.show();
                    property_type.empty();
                    var def = "<option value='default' default hidden>What's the type of the property?</option>";
                    property_type.prepend(def);
                    if (!_data.length)
                    console.log(wiz.propertytype);
                    $.each(_data, function (i, v) {
                        if(wiz.propertytype === v.text){
                           var item = '<option selected default value="' + v.id + '"  >' + v.text + '</option>';
                        }
                        else{
                           var item = '<option  value="' + v.id + '">' + v.text + '</option>';
                        }
                        property_type.append(item);
                    });
                    property_type.prepend(def).attr({

                        disabled: false
                    });
                    loader.fadeOut();
                }
            };
        start();
    }
}

