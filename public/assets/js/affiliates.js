'use strict';
/*jslint camelcase:false*/
/*global $*/

var affiliate = {
    sharable_id: null,
    property_id: null,
    affiliate_id: null,


    init: function() {
        $('#search-aff-modal').on('click', affiliate.open_modal);
        affiliate.initTypeAhead();
        $('#search-aff-modal-btn').on('click', affiliate.open_modal);
    },

    open_modal: function() {
        $('#aff-modal').modal('show')
            .on('hidden.bs.modal',affiliate.clear_modal)
            .on('click', '#send_invite', affiliate.send_invite);
    },

    clear_modal: function() {
        var modal = $(this);
        modal.find('#search-user').val('');
    },

    send_invite: function(e) {
        var email = $('#search-user').val();
        var start = function() {
                if (!is_valid(email))
                    alertify.message('Invalid Email address');
                else {
                    send_mail(email);
                }

            },
            is_valid = function(mail) {
                var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                return pattern.test(mail);
            },
            send_mail = function(mail) {
                console.log(mail);
                $.ajax({
                    url: '/users/affiliates/sendemail',
                    data: {
                        email: mail,
                        _token: csrf_token,
                    },
                    type: 'POST',
                    success: next
                });
            },
            next = function(data) {
                alertify.success('Email Sent!');
            };
        start();
    },

    is_valid: function(val) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(val);
    },

    add_affiliate: function(elem) {
        var e = $(elem),
            start = function() {
                e.attr({
                        disabled: 'disabled'
                    }).addClass('disabled')
                    .html('<span class="fa fa-spin fa-circle-o-notch"></span>');

                $.ajax({
                    url: '/users/affiliates/add',
                    data: {
                        affiliate_id: e.data('affiliate-id'),
                        _token: csrf_token
                    },
                    type: 'POST',
                    success: next
                });

            },
            next = function() {
                e.removeAttr('disabled').removeClass('disabled').html('Add Affiliate');
                $('.aff-card-container').hide();
                $('#aff-modal').modal('hide');
            }

        start();
    },
    initTypeAhead: function() {
        affDatum.initialize();
        $('#search-user').typeahead(null, {
            minLength: 3,
            displayKey: 'value',
            source: affDatum.ttAdapter(),
            templates: {
                suggestion: function(data) { // data is an object as returned by suggestion engine
                        var d = data;
                        console.log(d);
                        return '<div class="sugg-list">'+
                                '<img src="/avatars/' + d.data.profile_image+'" width="50" height="50" /><span style="margin-left:10px;">'+ d.value+'</span>'+
                                '<span style="font-size:12px;color:#909090;margin-left:30px;">'+d.data.email+'</span>'+
                                '</div>';
                    },
                empty: [
                  '<p style="padding:10px;">',
                    'no matches found. Send an <a href="#" id="send_invite">Invite</a> ?.',
                  '</p>'
                ].join('\n')
            }
        }).bind('typeahead:selected', affiliate.aff_selected);
    },

    aff_selected: function(elem, obj) {
        var start = function() {
                $('.aff-loader').show(300, next);
                $('.aff-card-container').hide();
            },
            next = function() {
                var container = $('.aff-card-container');
                container
                    .find('.aff-image')
                    .attr({
                        src: '/avatars/' + obj.data.profile_image
                    });
                container
                    .find('.aff-name')
                    .html(obj.data.user_fname + ' ' + obj.data.user_lname);

                container
                    .find('#add_as_affiliate')
                    .data('affiliate-id', obj.data.id);

                container.show();
                $('.aff-loader').hide();
            };

        start();
    },

    init_shared: function() {
        $('.the9').height($('.the3').innerHeight());
        // $('.grid-details:hidden').each(function() {
        //   $(this).height(200);
        // });
        $('.cmd_unshare').attr({
            'data-property-id': 0,
            'data-user-id': 0
        });
        $('.cmd_unshare').click(affiliate.unshare);
        $('.cmd_edit_dataset').click(affiliate.dataset);

    },

    toggle_city: function() {
        // $(this).on('change', function(e) {
            if($(this).is(':checked'))
                $('#scb_city').prop('checked',false).parents('.col-md-3').fadeIn('fast')
            else
                $('#scb_city').prop('checked',false).parents('.col-md-3').fadeOut('fast')
        // });
    },

    dataset: function(e) {
        e.preventDefault();
        var $parent = $(this).parents('.aff-properties-container'),
            // $parent = $parent.find('.aff-checkbox-container .sharing-viewability-wrapper').val(),
            checkboxes = null,
            sharables = null,
            pivot_id = $parent.find('.pivot_id').val(),
            start = function() {
                $('#modal-dataset')
                    .on('show.bs.modal', show)
                    .on('shown.bs.modal', shown)
                    .on('hidden.bs.modal', hidden)
                    .modal('show');
            },
            show = function() {
                // $(this).find('#save_changes').attr('disabled',false);
                var modal = $(this);
                checkboxes = $('.aff-checkbox-container .sharing-viewability-wrapper').clone();
                // checkboxes.append($('.aff-attachment-container').find('[data-tab=attachments]').clone());
                sharables = $.parseJSON($parent.find('.sharables').val());

                affiliate.sharable_id = $parent.find('.pivot_id').val();
                affiliate.property_id = $parent.find('.property_id').val();
                affiliate.affiliate_id = $parent.find('.user_id').val();

                // checkboxes.find('.custom-checkbox').attr('checked',false);
                // checkboxes.find('.custom-checkbox').parent().parent().hide();
                $.each(sharables.locations, function(i,v) {
                    checkboxes
                        .find('label[for=scb_'+i+']').parent().show();
                    if (typeof v === 'string')
                        v = v == 'true';
                    if (!v) {
                        checkboxes.find('input#scb_'+i).trigger('click');
                    }

                    if (i == 'province')
                        checkboxes.find('input#scb_'+i).bind('change',affiliate.toggle_city);
                });

                $.each(sharables.details, function(i,v) {
                    checkboxes
                        .find('label[for=scb_'+i+']').parent().show();
                    if (typeof v === 'string')
                        v = v == 'true';
                    if (!v) {
                        checkboxes.find('input#scb_'+i).trigger('click');
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
                        checkboxes.find('.cb-docs-container').append(template);
                    });
                }
                if (sharables.attachments.images.length) {
                    $('.images-wrapper').show();
                    $('.tab-attachments:hidden').show();
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
                        checkboxes.find('.cb-imgs-container').append(template);
                    });
                }

                checkboxes.show();

            },
            shown = function() {
                console.log(sharables);
                sharables = null;
                $(this).find('.modal-body').empty();
                $(this).find('.modal-body').append(checkboxes);

            },
            hidden = function() {
                checkboxes = null;
                sharables = null;
                show = null;
                shown = null;
                $(this).find('.modal-body').empty();
            };

        start();
    },

    arrange_listing: function(elem) {
        var e = $(elem);
        if (e.hasClass('list_public') && !e.hasClass('grid_public')) {
            $('.list_view').show();
            $('.grid_view').hide();
        }
        else if (!e.hasClass('list_public') && e.hasClass('grid_public')){
            $('.list_view').hide();
            $('.grid_view').show();
        }
    },

    unshare: function() {
        var $parent = $(this).parents('.aff-properties-container');
        var property_id = $parent.find('.property_id').val(),
            affiliate_id = $parent.find('.user_id').val(),

            name = $('#aff-name').val(),
            start = function() {
                alertify.confirm()
                .setting({
                    'title': 'Heads Up!',
                    'message': 'Are you sure you want to remove this Listing from ' + name +'?' ,
                    'onok': ajax
                }).show();
            },
            ajax = function() {
                $.ajax({
                    url: '/dashboard/removeShare',
                    data: {
                        property_id: property_id,
                        user_id: affiliate_id,
                        _token: csrf_token
                    },
                    type: 'POST',
                    success: success
                });
            },
            success = function(data) {
                if (data.success) {
                    alertify.success("Listing removed from this " + name);
                    $parent.fadeOut(200).remove();
                    affiliate.update();
                }
            }

        start();
    },

    update : function() {
        var length = $('.aff-properties-container').length;
        if (!length) {
            location.reload();
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
        };

        $('.opt_details:visible').each(function(i,v) {
            var det = {},
                name = $(v).attr('id');
            name = name.substring(4,name.length);
            sharables.details[name] = $(v).is(':checked');
        });

        $('.opt_locations:visible').each(function(i,v) {
            var det = {},
                name = $(v).attr('id');
            name = name.substring(4,name.length);
            sharables.locations[name] = $(v).is(':checked');
        });
        $('.opt_docs').each(function(i,v) {
            sharables.attachments.documents.push({
                checked : $(v).is(':checked'),
                id : parseInt($(v).data('id')),
                orig_name : $(v).data('title'),
                file_path : $(v).data('src')
            });
        });
        $('.opt_imgs').each(function(i,v) {
            sharables.attachments.images.push({
                checked : $(v).is(':checked'),
                id : parseInt($(v).data('id')),
                orig_name : $(v).data('title'),
                file_path : $(v).data('src')
            });
        });

        $(this).attr('disabled',true);
        console.log(sharables);
        $.ajax({
            url: '/dashboard/update',
            data: {
                user_id: affiliate.affiliate_id,
                property_id: affiliate.property_id,
                sharables: sharables,
                _token: csrf_token
            },
            type: 'POST',
            success: function(data) {
                location.reload();
            }
        });
    }
};
