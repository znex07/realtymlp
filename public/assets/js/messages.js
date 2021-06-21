'use strict';
/*jslint camelcase:false*/
/*global $*/
/*global affDatum*/

var messages = {
    init: function() {
        messages.initTypeAhead();
        messages.initEvents();
    },

    initEvents: function() {

    },

    initTypeAhead: function() {
        affDatum.initialize();
        $('.user-input').typeahead(null, {
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
            }
        }).bind('typeahead:selected', messages.change_to_id);
    },

    change_to_id: function(elem, obj) {
        $('#to_id').val(obj.data.id);
    },
};



 