$(function(){
    var _token = $("#_token").val();
    $("#description").limitText($("#counterD"),2000);
    $("#property_title").limitText($("#counter"),60);
    $("#village").limitText($("#counterV"),50);
    $("#street_address").limitText($("#counterS"),160);
    $("#personal_notes").limitText($("#counterP"),2000);
    var province = $('#province');
    $('document').ready(function () {
        $('#property_type').on('change', function(){
            $('#hidden_property_type').val($('#property_type option:selected').text());
        });
        $('#bldg_name').keyup(function () {
           var bldg = $('#bldg_name').val(),
                city = $('#city option:selected').val();
            // console.log(city);
           if(bldg.length > 0)
           {
               $.ajax({
                   url:'/dashboard/property/wizard/bldgname',
                   method: 'GET',
                   data: {
                       search: 1,
                       city: city,
                       bldg_name: bldg,
                   },

                   success: function (data) {
                       $( "#bldg_name" ).autocomplete({
                           source: JSON.parse(data),
                           select: function (event, ui) {
                               var label = ui.item.label;
                               $.ajax({
                                   url:'/dashboard/property/wizard/getData',
                                   method: 'GET',
                                   data: {
                                       bldg_name: label,
                                   },
                                   success: function (data) {
                                       $.each(JSON.parse(data), function (index, bldg_info) {
                                           $('#brgy').val(bldg_info.brgy);
                                           $('#street_address').val(bldg_info.street_address);
                                       });

                                   },
                                   dataType: 'text'
                               });
                               console.log(label);
                               return false;
                           },

                       });

                   },
                   dataType: 'text'
               });
           }
           else
           {
               $('#autoCompleteData').html('');
           }

        });
    });
    $("body").on("change","#province",function(e){
        var $this = $(this);
        loadMunicipality($this);
        $('#PProvince').hide();
        $('#province:visible').parent().removeClass("has-error");
        $('#c_bldg_name').show();
        $('#c_brgy').show();
        $('#c_street_address').show();
    });
    // $("input.numeric").on('paste',function(){
    //     return false;
    // }).numeric(",");
    $('input.negative').on('keypress',function(event){
        if ( event.which == 45 || event.which == 189 ) {
            event.preventDefault();
        }
    });
});
$("body").on("change","#city",function() {
    $('#lp_city').attr('value',$('#city option:selected').text());
});
function storageSave(key,value){
    localStorage.setItem(key,value);
}
function storageLoad(key){
    return localStorage.getItem(key);
}
function loadMunicipality(prov)
{
    var storageSupported = typeof(Storage) !== "undefined" ? true : false;
    $('#street_address').val('');
    $('#brgy').val('');
    var ret = '<select name="city"  onchange="mapa.geocode();wiz.handleCheckpoint(this)" id="city" class="form-control" required><option value="default" default selected hidden>Which city/municipality does it belong to ?</option>';
    //</select>'
    var selVal = prov.find("option:selected").val();
    var prov = prov.find("option:selected").text();
    var con = $("#f_city");

    $("#city").prop('disabled',true);
    $('#l_city').fadeIn();
    $('#lp_province').attr('value',$('#province option:selected').text());

    if($(this).find('option:selected').val() == 'default') {
        $('label[for="city"]').hide();
        $('#l_city').hide();
        $('#f_city').hide();
    }
    if(selVal == 'default')
    {
        $('#l_city').fadeOut();
        ret += '<option disabled>Please Choose Province to load municipality</option></select>';
        con.html(ret).fadeIn(500);
    }else {
        if(storageSupported){
            if(!JSON.parse(storageLoad('province_'+selVal))) {
                $.get('/dashboard/property/wizard/requests',{reqtype:"province",value:selVal}).done(function(data){
                    storageSave('province_'+selVal+'_data',JSON.stringify(data));
                    $.each(data,function(i,v){
                        ret+='<option value="'+ v.id+'">'+ v.name +'</option>';
                        // console.log(v.name);
                    });
                    ret += '</select>';
                    $('#l_city').fadeOut();
                    con.html(ret).fadeIn(500);
                });
                storageSave('province_'+selVal,true);
            } else {
                var data = JSON.parse(storageLoad('province_'+selVal+'_data'));
                for (var x=0;x<data.length;x++) {
                        ret+='<option value="'+ data[x].id+'">'+ data[x].name +'</option>';
                }
                ret += '</select>';
                $('#l_city').fadeOut();
                con.html(ret).show().fadeIn();
            }
        }
        else {
            $.get('/dashboard/property/wizard/requests',{reqtype:"province",value:selVal}).done(function(data){
                storageSave('province_'+selVal+'_data',JSON.stringify(data));
                $.each(data,function(i,v){
                    ret+='<option value="'+ v.id+'">'+ v.name +'</option>';
                });
                ret += '</select>';
                $('#l_city').fadeOut();
                con.html(ret).fadeIn(500);
            });
        }
    }
    $('label[for="city"]').show();

    // if (selVal == 'default') {
    //     con.hide();
    //     $('label[for="city"]').hide();
    //     $('#l_city').hide();
    // }
}
function getFirstImageSource(){
    return $("#dropzone-image .dropzone-previews-img div .dz-image img").attr('src');
}
$.fn.limitText = function(counter,limit) {
    this.on('input', function(e) {
        var tval = $(this).val(),
            tlength = tval.length,
            set = limit,
            remain = parseInt(set - tlength);
        counter.text(remain + " Characters left");
        if (remain <= 0) {
            counter.text(0 + " Character left");
            $(this).val((tval).substring(0, limit -1));
        }
    });
};
