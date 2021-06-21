$('document').ready(function () {
    $('#brgy').on('cut copy paste',wiz.preventDefault);
    $('#street_address').on('cut copy paste',wiz.preventDefault);
    // $('#description').on('cut copy',wiz.preventDefault);
    // $('#personal_notes').on('cut copy',wiz.preventDefault);
    $('#property_title').on('cut copy',wiz.preventDefault);
    $('#lot_area').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#floor_area').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#selling_price').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#rental_price').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#bedroom').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#bathroom').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#parking').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('#balcony').keydown(wiz.inputNumOnly).on('cut copy paste',wiz.preventDefault);
    $('.prices').on('input', realtymlp.specialNumeric)
        .on('blur', realtymlp.formatNumbers)
        .on('focus', realtymlp.revertNumbers);

});
$('#property_type').on('change', function (e) {

    var property_type = $('#property_type option:selected').text();
    var property_class = $('#property_classification option:selected').text();

    $('#f_lot_area').show();
    $('#f_floor_area').show();

    if (property_type === 'Apartment' || property_type=='Condo Unit'|| property_type === 'Dorm / Pension House Unit' || property_type === 'Columbary Niche Unit' || property_type === 'Leisure & Entertainment Unit' || property_type === 'Office Unit'  || property_type === 'Retail Unit / Service Unit') {
        $('#f_lot_area').hide();
    }
    else if (property_type === 'Vacant Lot / Raw Land') {
        $('#f_floor_area').hide();
    }
    else if(property_type === 'Beach Lot' || property_type === 'Island Property' || property_type === 'Grazing / Cattle Land')
    {
        $('#f_floor_area').hide();
    }
    else if (property_class === 'Residential' && property_type === 'Parking Unit')
    {
        $('#f_lot_area').hide();
    }
    else if (property_class === 'Commercial' && property_type === 'Retail Complex / Mall')
    {
        $('#f_lot_area').hide();

    }
    else if (property_class === 'Commercial' && property_type === 'Parking Unit ')
    {
        $('#f_lot_area').hide();
    }
    else if (property_class === 'Commercial' || property_class === 'Industrial' || property_class === 'Agricultural' || property_class === 'Institutional' )
    {
    }


});
$('#listing_type').on('change', function (e) {
    $('.price_form').show();
    var availability = $('#availability_type').val();

    var type = $(this).find('option:selected').val();
    if (type == '1') {
        $('#f_rental_price').show();
        $('#f_selling_price').hide();
    }
    else if (type == '2') {
        $('#f_selling_price').show();
        $('#f_rental_price').hide();

    }
    else if (type == '3') {
        $('#f_rental_price').hide();
        $('#f_selling_price').hide();
    }

    if (type == '1') {
        $("#availability_type option[value=1]").hide();
        $("#availability_type option[value=4]").hide();

        $("#availability_type option[value=2]").show();
        $("#availability_type option[value=5]").show();
    }
    else if (type == '2') {
        $("#availability_type option[value=2]").hide();
        $("#availability_type option[value=5]").hide();
        $("#availability_type option[value=1]").show();
        $("#availability_type option[value=4]").show();

    }
    else if (type == '3') {
        $("#availability_type option[value=1]").hide();
        $("#availability_type option[value=2]").hide();
        $("#availability_type option[value=4]").hide();
        $("#availability_type option[value=5]").hide();

    }

});
var sell_price = $('#selling_price').val();
//$('#selling_price').onkeydown(function () {
//    if(sell_price.substr(sell_price.length - 1).toUpperCase() == 'M' || sell_price.substr(sell_price.length - 1).toUpperCase() == 'K')
//    {
//        console.log('invalid input!');
//    }
//});

$('#property_classification').on('change', wiz.loadPropertyType);

$('.nav-dashboard').addClass('accented-btn');
$('#btnPost').click(function (e) {
    e.preventDefault();
    var title = $('#property_title').val();
    var listing = $('#listing_type').val();
    var condition = $('#condition_type').val();
    var availability = $('#availability_type').val();
    var classification = $('#property_classification').val();
    var type = $('#property_type').val();
    var province = $('#province').val();
    var city = $('#city').val();
    var title = $('#property_title').val();

    var rental_price = $('#rental_price').val();
    var selling_price = $('#selling_price').val();

    var e = [];
    var i;
    if (title == '') {
        $('#PTitle').show();
        $('#property_title:visible').parent().addClass("has-error");
        e[8] = 1
    }
    else {
        $('#PTitle').hide();
        $('#property_title:visible').parent().removeClass("has-error");
        e[8] = 0;
    }

    if (listing == 'default') {
        $('#PListing').show();
        $('#listing_type:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[0] = 1;
    }
    else {
        $('#PListing').hide();
        $('#listing_type:visible').parent().removeClass("has-error");
        e[0] = 0;
    }

    if (condition == 'default') {
        $('#PCondition').show();
        $('#condition_type:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[1] = 1;
    }
    else {
        $('#PCondition').hide();
        $('#condition_type:visible').parent().removeClass("has-error");
        e[1] = 0;
    }

    if (availability == 'default') {
        $('#PAVail').show();
        $('#availability_type:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[2] = 1;
    }
    else {
        $('#PAVail').hide();
        $('#availability_type:visible').parent().removeClass("has-error");
        e[2] = 0;
    }


    if (classification == 'default') {
        $('#PClass').show();
        $('#property_classification:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[3] = 1;
    }
    else {
        $('#PClass').hide();
        $('#property_classification:visible').parent().removeClass("has-error");
        e[3] = 0;
    }

    if (type == 'default') {
        $('#PType').show();
        $('#property_type:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[4] = 1;
    }
    else {
        $('#PType').hide();
        $('#property_type:visible').parent().removeClass("has-error");
        e[4] = 0;
    }

    if (province == 'default') {
        $('#PProvince').show();
        $('#province:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[5] = 1;
    }
    else {
        $('#PProvince').hide();
        $('#province:visible').parent().removeClass("has-error");
        e[5] = 0;
    }

    if (city == 'default') {
        $('#PCity').show();
        $('#city:visible').parent().addClass("has-error");
        $("html, body").animate({ scrollTop: 0 }, "slow");
        e[6] = 1;
    }
    else {
        $('#PCity').hide();
        $('#city:visible').parent().removeClass("has-error");
        e[6] = 0;
    }

    console.log(e);
    if (e[0] == 0 && e[1] == 0 && e[2] == 0 && e[3] == 0 && e[4] == 0 && e[5] == 0 && e[6] == 0 && e[8] == 0) {
        console.log('success');
        $('#form_submit').submit();
    }

});


$(function () {
    $("#property_title").limitText($("#counter_title"), 100);
    $("#description").limitText($("#counter_desc"), 2000);
    $("#personal_notes").limitText($("#counter_notes"), 2000);
    $("#address").limitText($("#counter_location"), 250);
    $('#property_title').on('cut copy paste', wiz .preventDefault);
    $('#description').on('cut copy paste', wiz.preventDefault);
    $('#brgy').on('cut copy paste', wiz.preventDefault);
    $('#street_address').on('cut copy paste', wiz.preventDefault);
    $('#personal_notes').on('cut copy paste', wiz.preventDefault);
})


$.fn.limitText = function (counter, limit) {
    this.on('input', function (e) {
        var tval = $(this).val(),
            tlength = tval.length,
            set = limit,
            remain = parseInt(set - tlength);
        counter.text(remain + "/" + limit + " Characters left");
        if (remain <= 0) {
            counter.text(0 + "/" + limit + "Characters left");
            $(this).val((tval).substring(0, limit - 1));
        }

    });

};

