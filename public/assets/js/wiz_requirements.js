/**
 * Created by mark on 8/5/2016.
 */
var wiz_requirements = {
    property_type: $('#property_type'),
    province: $('#province1'),
    hash: 1,
    new_location: {},
    condition_type: {},
    availability_type: {},
    hash_con: 0,
    $template: $(".template"),
    storageSupported: typeof(Storage) !== "undefined" ? true : false,
init: function () {
        $(document).ready(wiz_requirements.hideFloorOrLotArea);
        $('#province1').ready(wiz_requirements.loadMunicipality(1));
        $("#l_city1").attr("id", "l_city" + wiz_requirements.hash);
        $("#f_city1").attr("id", "f_city" + wiz_requirements.hash);
        $("#province").attr("id", "province" + wiz_requirements.hash);
        $(".btn-add-panel").on("click", wiz_requirements.addLocationPanel);
        $(document).on('click', '.btn-remove', function () {
            $(this).parents('.panel').get(0).remove();
            --wiz_requirements.hash;
            $('#btn-remove' + wiz_requirements.hash).attr('style', '');
        });
    },
    checkInputCompleted: function (e) {
        var $this = $(e);
        if($this.val() != 'default' || !$this.val())
        {
            $this.closest('div.form-group').removeClass('has-error').tooltip('destroy');
        }else{
            $('[data-toggle="tooltip"]').tooltip(show);
        }
    },
    hideFloorOrLotArea: function (e) {
        $('#property_type').on('click',function () {
                $('#hidden_property_type').attr('value', $('#property_type option:selected').text());
                $('#PpropType').hide();
                $('#property_type:visible').parent().removeClass("has-error");
                var property_class_selected = $('#property_classification option:selected').text().trim();
                var property_type_selected = $('#property_type option:selected').text().trim();
                // console.log(property_type_selected);
                //hiding/showing lot area or floor area
                if(property_class_selected == 'RESIDENTIAL')
                {
                    if(property_type_selected == 'Vacant Lot / Raw Land')
                    {
                        //hide floor area
                        $('#floor_area_div').hide();
                    }else{
                        $('#floor_area_div').fadeIn();
                    }
                    if(property_type_selected == 'Parking Unit' || property_type_selected == 'Dorm / Pension House Unit' || property_type_selected == 'Apartment / Condo Unit')
                    {
                        $('#lot_area_div').hide();
                    }else{
                        $('#lot_area_div').fadeIn();
                    }
                }
        });
    },
    citySelected: function () {
        wiz_requirements.new_location["location" + wiz_requirements.hash] = $('#city'+wiz_requirements.hash+' option:selected').text().trim() + ', ' + $('#province'+wiz_requirements.hash+' option:selected').text().trim();
        $('#PCity').hide();
        $('#city:visible').parent().removeClass("has-error");
        // $('#location_hidden').attr('value', JSON.stringify(wiz_requirements.new_location));
        $('#location_header' + wiz_requirements.hash).text("Location " + wiz_requirements.hash + ": " + wiz_requirements.new_location["location" + wiz_requirements.hash]);
        if ($('#province' + wiz_requirements.hash).val() == 'default' || $('#city1' + wiz_requirements.hash).val() == 'default' || wiz_requirements.hash >= 10) {
            $('#btnAddLocation').addClass('disabled');
        } else {
            $('#btnAddLocation').removeClass('disabled');
            $('#property_area').fadeIn();
            $('#budget').fadeIn();
            $('#description').fadeIn();
            $('#btnPost').text('Post Requirement').button("refresh");
        }
    },
    loadMunicipality: function (hash) {
        // console.log('load municipality' + hash);
        var ret = '<select name="city" id="city' + hash + '" class="form-control" required><option value="default" default selected hidden>Which city/municipality does it belong to?</option>';
        var selVal = $('#province' + hash + ' option:selected').val();
        var con = $("#f_city" + hash);
        $("#city").prop('disabled', true);
        $('#l_city' + hash).fadeIn();
        // console.log(selVal);
        if (selVal == 'default') {
            $('#l_city' + hash).fadeOut();
            ret += '<option disabled>Please Choose Province to load municipality</option></select>';
            con.html(ret).fadeIn(500);
        } else {
            if (wiz_requirements.storageSupported) {
                if (!JSON.parse(wiz_requirements.storageLoad('province_' + selVal))) {
                    $.get('/dashboard/property/wizard/requests', {
                        reqtype: "province",
                        value: selVal
                    }).done(function (data) {
                        wiz_requirements.storageSave('province_' + selVal + '_data', JSON.stringify(data));
                        $.each(data, function (i, v) {
                            ret += '<option value="' + v.id + '">' + v.name + '</option>';
                        });
                        ret += '</select>';
                        $('#l_city' + hash).fadeOut();
                        con.html(ret).fadeIn(500);
                    });
                    wiz_requirements.storageSave('province_' + selVal, true);
                } else {
                    var data = JSON.parse(wiz_requirements.storageLoad('province_' + selVal + '_data'));
                    for (var x = 0; x < data.length; x++) {
                        if (wiz_requirements.city_def === data[x].name.trim()) {
                            ret += '<option value="' + data[x].id + '" selected="selected">' + data[x].name + '</option>';
                        } else {
                            ret += '<option value="' + data[x].id + '">' + data[x].name + '</option>';
                        }
                    }
                    ret += '</select>';
                    $('#l_city' + hash).fadeOut();
                    con.html(ret).show().fadeIn();
                }
            } else {
                $.get('/dashboard/property/wizard/requests', {
                    reqtype: "province",
                    value: selVal
                }).done(function (data) {
                    wiz_requirements.storageSave('province_' + selVal + '_data', JSON.stringify(data));
                    $.each(data, function (i, v) {
                        ret += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    ret += '</select>';
                    $('#l_city' + hash).fadeOut();
                    con.html(ret).fadeIn(500);
                });
            }

            $('label[for="city"]').show();
        }
    },
    storageSave: function(key,value){
    localStorage.setItem(key,value);
    },
    storageLoad: function(key){
    return localStorage.getItem(key);
    },
    addLocationPanel: function () {
        var $newPanel = wiz_requirements.$template.clone();
        $newPanel.find(".collapse").addClass("in");
        $newPanel.find(".accordion-toggle").attr("href", "#" + (++wiz_requirements.hash)).text("Location " + wiz_requirements.hash + ":");
        $newPanel.find("#lblcity").attr("style", "display:none");
        $newPanel.find("#province1").attr("id", "province" + wiz_requirements.hash);
        $newPanel.find("#city1").attr("id", "city" + wiz_requirements.hash);
        $newPanel.find("#location_hidden").attr("id", "location_hidden" + wiz_requirements.hash);
        $newPanel.find("#location_hidden" + wiz_requirements.hash).attr("name", "location" + wiz_requirements.hash);
        $newPanel.find("#l_city1").attr("id", "l_city" + wiz_requirements.hash);
        $newPanel.find("#f_city1").attr("id", "f_city" + wiz_requirements.hash);
        $newPanel.find("#location_header1").attr("id", "location_header" + wiz_requirements.hash);
        $newPanel.find("#collapseHead").attr("id", "collapseHead" + wiz_requirements.hash);
        $newPanel.find("#btn-remove").attr("id", "btn-remove" + wiz_requirements.hash);
        $newPanel.find("#btn-remove" + wiz_requirements.hash).attr("style", "");
        $("#btn-remove" + (wiz_requirements.hash - 1)).attr("style", "display:none");
        $newPanel.find("#location_header" + wiz_requirements.hash).attr("href", "#collapseHead" + wiz_requirements.hash);
        $("#accordion").append($newPanel.fadeIn());
        $('#collapseHead').removeClass('in');
        $('#collapseHead' + (wiz_requirements.hash - 1)).removeClass('in');
        $('#btnAddLocation').addClass('disabled');
    },
    shareReq: function(requirement_id){
        var user_id = $('#aff_id').val();
        console.log(user_id);
        console.log(requirement_id);

        $.post('/dashboard/requirement/share/',{
            _token : csrf_token,
            user_id : user_id,
            requirement_id : requirement_id
        }).done(function(){
            location.reload();
        }).fail(function(xhr){
            console.log(xhr.status);
        });
    }
};